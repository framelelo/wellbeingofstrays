<?php

/**
 * ADD ADOPTIONS IN DATABASE IF CONDITIONS ARE MET
 *
 * @param array $adoptions
 *
 */
function AdoptionPage()
{

    global $base_url, $token;

    $singleAdoption = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $singleAdoption = showAdoption($id);
    }
    $adoptions_cats = showCatAdoptions();
    $adoptions_dogs = showDogAdoptions();
    $adoptions = showAdoptions();

    // Check if the form has been submitted and the token is valid
    if ($_POST && isset($_POST['token']) && hash_equals($token, $_POST['token'])) {

        $id = $_SESSION["user"]["id"];
        $name = htmlspecialchars($_POST['name']);
        $specie = $_POST['species'];
        $gender = $_POST['gender'];
        $description = htmlspecialchars($_POST['description']); 
        $contact = htmlspecialchars($_POST['contact']);


        // Retrieve the uploaded image
        $picture = time() . '_' . $_FILES['img-animal']['name'];
        $temp_folder = $_FILES['img-animal']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;

        // Set the maximum file size
        $maxFileSize = 2097152; // 2Mo

        // Check if the image has been uploaded
        if (!empty($_FILES['img-animal']['name'])) {

            //Retrieve the file size
            $fileSize = $_FILES['img-animal']['size'];

            // Check if the file size is greater than the maximum file size
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
                return showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);
            } else {
                //Move the uploaded file to uploads folder
                $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
            }
            //If the image not has been uploaded
            if (!$picture_upload) {
                echo '<div class="modal"><p>Merci de vérifier</p></div>';
                return showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);
            }
        } else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
            return showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);
        }
        // Create a new adoption

        if ($id && $name && $specie && $picture && $gender && $description && $contact) {
            $adoption = newAdoptions($id, $name, $specie, $picture, $gender, $description, $contact);
            if ($adoption) {
                header("location: $base_url/?page=adoptions");
            } else {
                echo '<div class="modal"><p>Merci de vérifier !</p></div>';
            }
        } else {
            echo '<div class="modal"><p>Merci de remplir tous les champs</p></div>';
        }
    }
    showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);
};

/**
 * UPDATE ADOPTION IN DATABASE IF CONDITIONS ARE MET
 * 
 * @param int $id
 * 
 * 
 */
function updateAdoption(int $id)
{

    global $base_url, $token;

    $adoption = showAdoption($id);

    if ($_POST && isset($_POST['token']) && hash_equals($token, $_POST['token'])) {

        $id = $_GET['id'];
        $id_user = $_SESSION["user"]["id"];
        $name = htmlspecialchars($_POST['name']);
        $gender = $_POST['gender'];
        $specie = $_POST['species'];
        $description = htmlspecialchars($_POST['description']);
        $contact = htmlspecialchars($_POST['contact']);

        $picture = time() . '_' . $_FILES['img-animal']['name'];
        $temp_folder = $_FILES['img-animal']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;
        

        // Set the maximum file size
        $maxFileSize = 2097152; // 2Mo
        //Retrieve the file size
        if (!empty($_FILES['img-animal']['name'])) {
            // Check if the file size is greater than the maximum file size
            $fileSize = $_FILES['img-animal']['size'];

            // Check if the file size is greater than the maximum file size

            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';


                return singleAdoptionPage($adoption);
            } else {
                move_uploaded_file($temp_folder, $upload_folder);

                $oldPicturePath = ROOT_PATH . "/uploads/" . $adoption['picture'];
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
        } elseif (empty($_FILES['img-event']['name']) && isset($_GET['id'])) {
            $picture = $adoption['picture'];
        } else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
            return
                ShowHomePage($adoption);
        }
        $update = updateAdoptions($id, $id_user, $name, $specie, $picture, $gender,  $description, $contact);
        if ($update) {
            header("location: $base_url/?page=adoptions");
        } else {
            echo '<div class="modal"><p>Merci de verifier !</p></div>';
        }
    }

    singleAdoptionPage($adoption);
};

/**
 * SHOW SINGLE ADOPTION IF ID IS SET
 * 
 * 
 */
function singleAdoption()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $adoption = showAdoption($id);
        singleAdoptionPage($adoption);
    } else {
        homePage();
    }
}

/**
 * DELETE ADOPTION IF ID IS SET IN DATABASE
 * 
 * @param int $id
 */
function removeAdoption()
{
    global $base_url;

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $adoption = showAdoption($id);

        if ($adoption && isset($adoption['picture'])) {
            $picturePath = "uploads/" . $adoption['picture'];

            removeAdoptions($id);

            if (file_exists($picturePath)) {
                unlink($picturePath);
            }
        }
        header("location: $base_url/?page=adoptions");
    } else {
        echo '<div class="modal"><p>Merci de vérifier !</p></div>';
    }
    AdoptionPage();
}
