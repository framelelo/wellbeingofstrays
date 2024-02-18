<?php

/**
 * ADD ADOPTIONS IN DATABASE IF CONDITIONS ARE MET
 *
 * @param array $adoptions
 *
 */
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
        $name = htmlspecialchars($_POST['name']);
        $specie = $_POST['species'];
        $gender = $_POST['gender'];
        $description = htmlspecialchars($_POST['description']);


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
                echo '<div class="modal"><p>Fiche adoption ajoutée !</p></div>';
                header("Refresh: .5; URL=$base_url/?page=adoptions");
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

    global $base_url;

    $adoption = showAdoption($id);

    if ($_POST) {

        $id = $_GET['id'];
        $id_user = $_SESSION["user"]["id"];
        $name = htmlspecialchars($_POST['name']);
        $gender = $_POST['gender'];
        $specie = $_POST['species'];
        $description = htmlspecialchars($_POST['description']);

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



        $update = updateAdoptions($id, $id_user, $name, $specie, $picture, $gender,  $description);
        if ($update) {
            echo '<div class="modal"><p>Fiche adoption modifiée !</p></div>';
            header("Refresh: .5; URL=$base_url/?page=single&id=$id");
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
        echo '<div class="modal"><p>Fiche adoption supprimée !</p></div>';
        header("Refresh: 0.5; URL=$base_url/?page=adoptions");
    } else {
        echo '<div class="modal"><p>Merci de vérifier !</p></div>';
    }
    AdoptionPage();
}
