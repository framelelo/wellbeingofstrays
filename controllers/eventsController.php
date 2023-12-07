
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

        if (!empty($_FILES['img-event']['name'])) {
            $picture_upload = move_uploaded_file($temp_folder, $upload_folder);

            if (!$picture_upload) {
                echo "Merci de vérifier la taille de l'image.";
            }
        }

        if ($id_user && $title && $picture && $link && $description) {
              if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $update = updateEvents($id, $id_user, $title, $picture, $link, $description);
            } else {
                $update = newEvents($id_user, $title, $picture, $link, $description);
            }

            if ($update) {
                header("Location: $base_url/?page=evenements");
            } else {
                echo 'Merci de vérifier !';
            }
        } else {
            echo 'Merci de remplir tous les champs';
        }
    }

    $events = showEvents();
    
    showEventsPage($events);
}


function removeEvent() {
    global $base_url;

    if (isset($_GET["a"])) {

        $action = $_GET["a"];
        $id = $_GET["id"];
        
        if ($action == 'delete'){
            removeEvents($id);
        }
       
        header("location: $base_url/?page=evenements");
        
        
    } else echo 'erreur';
}
?>
