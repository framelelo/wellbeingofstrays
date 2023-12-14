<?php

function AdoptionPage()
{

    global $base_url;

    $singleAdoption = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $singleAdoption = showAdoption($id);
    }
    $adoptions_cats = showCatAdoptions();
    $adoptions_dogs = showDogAdoptions();
    $adoptions = showAdoptions();

    if ($_POST) {

        $id = $_SESSION["user"]["id"];
        $name = $_POST['name'];
        $specie = $_POST['species'];
        $gender = $_POST['gender'];
        $description = $_POST['description'];


        $picture = time() . '_' . $_FILES['img-animal']['name'];
        $temp_folder = $_FILES['img-animal']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;
        $maxFileSize = 2097152;

        if (!empty($_FILES['img-animal']['name'])) {
            $fileSize = $_FILES['img-animal']['size'];

            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
                return showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);
                } else {
                $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
            }
            if (!$picture_upload) {
                echo '<div class="modal"><p>Merci de vérifier</p></div>'; 
                return showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);
                   }
        } else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
            return showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);

                 
        }

        if ($id && $name && $specie && $picture && $gender && $description) {
            $adoption = newAdoptions($id, $name, $specie, $picture, $gender, $description);
            if ($adoption) {
                header("Location: $base_url/?page=adoptions");
            } else {
                echo '<div class="modal"><p>Merci de vérifier !</p></div>';
            }
        } else {
            echo '<div class="modal"><p>Merci de remplir tous les champs</p></div>';
        }
    }



    showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions);
};


function updateAdoption($id)
{

    global $base_url;

    $adoption = showAdoption($id);

    if ($_POST) {

        $id = $_GET['id'];
        $id_user = $_SESSION["user"]["id"];
        $name = $_POST['name'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $specie = isset($_POST['species']) ? $_POST['species'] : null;
        $description = $_POST['description'];

        $picture = time() . '_' . $_FILES['img-animal']['name'];
        $temp_folder = $_FILES['img-animal']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;


        $maxFileSize = 2097152;

        if (!empty($_FILES['img-animal']['name'])) {
            $fileSize = $_FILES['img-animal']['size'];

            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
                return singleAdoptionPage($adoption);
            } else {
                $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
                $oldPicturePath = ROOT_PATH . "/uploads/" . $adoption['picture'];
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
        } else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
        }

        if ($id && $id_user && $name && $specie && $picture && $gender  && $description) {
            $update = updateAdoptions($id, $id_user, $name, $specie, $picture, $gender,  $description);
            if ($update) {

                header("Location: $base_url/?page=adoptions");
            } else {
                echo '<div class="modal"><p>Merci de verifier !</p></div>';
            }
        } else {
            echo '<div class="modal"><p>Merci de remplir tous les champs</p></div>';
        };
    }


    singleAdoptionPage($adoption);
};

function singleAdoption($id)
{

    $adoption = showAdoption($id);
    singleAdoptionPage($adoption);
}

function removeAdoption()
{
    global $base_url;

    if (isset($_GET["a"])) {

        $action = $_GET["a"];
        $id = $_GET["id"];

        if ($action == 'delete') {
            $adoption = showAdoption($id);

            if ($adoption && isset($adoption['picture'])) {
                $picturePath = "uploads/" . $adoption['picture'];

                removeAdoptions($id);

                if (file_exists($picturePath)) {
                    unlink($picturePath);
                }
            }
        }
        header("location: $base_url/?page=adoptions");
    } else {
        echo '<div class="modal"><p>Merci de vérifier !</p></div>';
    }
}
