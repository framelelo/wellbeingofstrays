
<?php


function eventPage()
{
    global $base_url;
    if ($_POST) {
        $id_user = $_SESSION["user"]["id"];
        $title = $_POST['title'];
        $link = $_POST['event-link'];
        $description = $_POST['description'];
    
        $picture = time() . '_' . $_FILES['img-event']['name'];
        $temp_folder = $_FILES['img-event']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;
    
        $maxFileSize = 2097152; 
    
        if (!empty($_FILES['img-event']['name'])) {
            $fileSize = $_FILES['img-event']['size'];
    
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
            } else {
                $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
    
                if (!$picture_upload) {
                    echo '<div class="modal"><p>Merci de vérifier</p></div>';
                }
            }
        } else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
            
        }
    
        if ($id_user && $title && $picture && $link && $description && $fileSize <= $maxFileSize) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $update = updateEvents($id, $id_user, $title, $picture, $link, $description);
            } else {
                $update = newEvents($id_user, $title, $picture, $link, $description);
            }
    
            if ($update) {
                header("Location: $base_url/?page=evenements");
            } else {
                echo '<div class="modal"><p>Merci de vérifier.</p></div>';
            }
        } else {
            echo '<div class="modal"><p>Merci de vérifier.</p></div>';
        }
    }
    
    
    $selectedEvent = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectedEvent = showEvent($id);
    }

    $events = showEvents();
    showEventsPage($events, $selectedEvent);
    
}


function removeEvent() {
    global $base_url;

    if (isset($_GET["a"])) {

        $action = $_GET["a"];
        $id = $_GET["id"];
        
        if ($action == 'delete') {
            $event = showEvent($id);

            if ($event && isset($event['picture'])) {
                $picturePath = "uploads/" . $event['picture'];

                removeEvents($id);

                if (file_exists($picturePath)) {
                    unlink($picturePath);
                }
            }
        }
        header("location: $base_url/?page=evenements");
        
    } else {
        echo '<div class="modal"><p>Merci de vérifier !</p></div>';
    }
}
?>
