
<?php

/**
 * DISPLAY EVENTS IF CONDITIONS ARE CORRECT
 * 
 * CREATE NEW EVENTS IN DATABASE
 * 
 */
function eventPage()
{
    global $base_url, $token;

    $selectedEvent = null;


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectedEvent = showEvent($id);
    }

    $events = showEvents();


    // Check if the form has been submitted and the token is valid
    if ($_POST && isset($_POST['token']) && hash_equals($token, $_POST['token'])) {


        $id_user = $_SESSION["user"]["id"];

        $title = htmlspecialchars($_POST['title']);
        $link = htmlspecialchars($_POST['event-link']);
        $description = htmlspecialchars($_POST['description']);

        // Retrieve the uploaded image
        $picture = time() . '_' . $_FILES['img-event']['name'];
        $temp_folder = $_FILES['img-event']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;

        // Set the maximum file size
        $maxFileSize = 2097152; // 2Mo

        // Check if the image has been uploaded
        if (!empty($_FILES['img-event']['name'])) {

            //Move the uploaded file to uploads folder
            $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
            //Retrieve the file size
            $fileSize = $_FILES['img-event']['size'];

            // Check if the file size is greater than the maximum file size
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
                return
                    showEventsPage($events, $selectedEvent);
            } else {

                // Retrieve the old image path
                $oldPicturePath = ROOT_PATH . "/uploads/" . $selectedEvent['picture'];
                // Delete the old image if it exists
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
            // If image not uploaded
            if (!$picture_upload) {
                echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
                return
                    showEventsPage($events, $selectedEvent);
            }
        }
        // Check if the image has not been uploaded
        elseif (empty($_FILES['img-event']['name']) && isset($_GET['id'])) {
            $picture = $selectedEvent['picture'];
        } else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
            return
                showEventsPage($events, $selectedEvent);
        }
        // Update an event in the database if already exists else create a new one
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $update = updateEvents($id, $id_user, $title, $picture, $link, $description);
        } else {
            $update = newEvents($id_user, $title, $picture, $link, $description);
        }

        if ($update) {
            header("Location: $base_url/?page=actions-pour-les-animaux");
        } else {
            echo '<div class="modal"><p>Merci de vérifier les champs obligatoires.</p></div>';
        }
    }

    showEventsPage($events, $selectedEvent);
}

/**
 * DELETE EVENT IF ID IS SET IN DATABASE
 * 
 */
function removeEvent()
{
    global $base_url;

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $event = showEvent($id);

        $picturePath = "uploads/" . $event['picture'];

        removeEvents($id);

        if (file_exists($picturePath)) {
            unlink($picturePath);
        }


        header("location: $base_url/?page=evenements");
    } else {
        echo '<div class="modal"><p>Merci de vérifier !</p></div>';
    }
}

?>
