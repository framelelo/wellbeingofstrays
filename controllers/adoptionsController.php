<?php

function AdoptionPage(){

    global $base_url;

    if($_POST) {

        $id = $_SESSION["user"]["id"];
        $name = $_POST['name']; 
        $specie = $_POST['species'];
        $gender = $_POST['gender'];
        $description = $_POST['description']; 

        $picture = time() . '_' . $_FILES['img-animal']['name'];
        $temp_folder = $_FILES['img-animal']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;
           
        if (!empty($_FILES['img-animal']['name'])) {
                
                
            $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
            
            if (!$picture_upload) {
                echo "Merci de vérifier la taille de l'image.";
            }
        } 
        
        
        if ($id && $name && $specie && $picture && $gender  && $description) {
           $adoption = newAdoptions($id, $name, $specie, $picture, $gender,  $description);
                if($adoption) {
                
                    header("Location: $base_url/?page=adoptions");
                }
                else {
                    echo '<div class="modal"><p>Merci de verifier !</p></div>';
     
                }

        }
        else {
            echo '<div class="modal"><p>Merci de remplir tous les champs</p></div>';
     
        };
    }
    $singleAdoption = null; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $singleAdoption = showAdoption($id);
    }
    $adoptions_cats = showCatAdoptions();
    $adoptions_dogs = showDogAdoptions();
    
    showAdoptionsPage($adoptions_cats,$adoptions_dogs, $singleAdoption);
};


function updateAdoption($id){

    global $base_url;

    if($_POST) {

        $id = $_GET['id'];
        $id_user = $_SESSION["user"]["id"];
        $name = $_POST['name']; 
        $specie = $_POST['species'];
        $gender = $_POST['gender'];
        $description = $_POST['description']; 

        $picture = time() . '_' . $_FILES['img-animal']['name'];
        $temp_folder = $_FILES['img-animal']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;
           
        if (!empty($_FILES['img-animal']['name'])) {
                
                
            $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
            
            if (!$picture_upload) {
                $picture = $_POST['picture'];
            }
        } 
        
        
        if ($id && $id_user && $name && $specie && $picture && $gender  && $description) {
            $update = updateAdoptions($id, $id_user, $name, $specie, $picture, $gender,  $description);
            if($update) {
            
                header("Location: $base_url/?page=adoptions");
            }
            else {    
                echo '<div class="modal"><p>Merci de verifier !</p></div>';
    
            }
        }
        else {
            echo '<div class="modal"><p>Merci de remplir tous les champs</p></div>';
        };
    }

    
    $adoption = showAdoption($id);
    singleAdoptionPage($adoption);
};

function singleAdoption($id){ 
    
    $adoption = showAdoption($id);
    singleAdoptionPage($adoption);

}

function removeAdoption() {
    global $base_url;

    if (isset($_GET["a"])) {

        $action = $_GET["a"];
        $id = $_GET["id"];
        
        if ($action == 'delete'){
            removeAdoptions($id);
        }
       
        header("location: $base_url/?page=adoptions");
        
        
    } else echo '<div class="modal">Merci de vérifier !</div>';
}
?>
