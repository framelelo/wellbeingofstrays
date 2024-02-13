
<?php

/**
 * Show events
 * 
 */
function eventPage()
{
    global $base_url;

    $selectedEvent = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectedEvent = showEvent($id);
    }

    $events = showEvents();

    if ($_POST) {
        $id_user = $_SESSION["user"]["id"];
        $title = htmlspecialchars($_POST['title']);
        $link = htmlspecialchars($_POST['event-link']);
        $description = htmlspecialchars($_POST['description']);

        $picture = time() . '_' . $_FILES['img-event']['name'];
        $temp_folder = $_FILES['img-event']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;

        $maxFileSize = 2097152;

        if (!empty($_FILES['img-event']['name'])) {

            $oldPicturePath = ROOT_PATH . "/uploads/" . $selectedEvent['picture'];
            $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
            $fileSize = $_FILES['img-event']['size'];

            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
                return
                    showEventsPage($events, $selectedEvent);
            } else {

                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }

            if (!$picture_upload) {
                echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
                return
                    showEventsPage($events, $selectedEvent);
            }
        } elseif (empty($_FILES['img-event']['name']) && isset($_GET['id'])) {
            $picture = $selectedEvent['picture'];
        } else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
            return
                showEventsPage($events, $selectedEvent);
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $update = updateEvents($id, $id_user, $title, $picture, $link, $description);
        } else {
            $update = newEvents($id_user, $title, $picture, $link, $description);
        }

        if ($update) {
            header("Location: $base_url/?page=evenements");
        } else {
            echo '<div class="modal"><p>Merci de vérifier les champs obligatoires.</p></div>';
        }
    }
    showEventsPage($events, $selectedEvent);
}


function removeEvent()
{
    global $base_url;

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $event = showEvent($id);

        if ($event && isset($event['picture'])) {
            $picturePath = "uploads/" . $event['picture'];

            removeEvents($id);

            if (file_exists($picturePath)) {
                unlink($picturePath);
            }
        }

        header("location: $base_url/?page=evenements");
    } else {
        echo '<div class="modal"><p>Merci de vérifier !</p></div>';
    }
}
?>
