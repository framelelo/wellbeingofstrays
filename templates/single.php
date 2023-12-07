<?php 
function singleAdoptionPage($adoption){
    $title = $adoption['name'];
    $page  = 'single';

    global $base_url;
    global $isConnected;

ob_start();
if($isConnected){?> 
        <div class="edit-form">
            <h4>Modifier la fiche</h4>
            <form method="post" action="<?php $base_url?>?page=update-adoption&id=<?= $adoption["id"] ?>" enctype="multipart/form-data">
                <div class="image-upload-btn"> 
                    <label class="title-image" for="image-upload">Ajouter une photo de l'animal</label>
                    <input type="file" name="img-animal" id="image-upload" accept=".jpeg,.png,.jpg">
                </div>
                <input type="text" placeholder="<?= $adoption['name'] ?>" name="name" id="name">
                
                <div class="select-style">
                    <select name="gender" class="select-style">
                        <option value="gender" disabled selected><?= $adoption['gender'] ?></option>
                        <option value="male">Male</option>
                        <option value="female">Femelle</option>
                    </select>
                    <i class="fa fa-caret-down"></i>
                </div>
               <div class="select-style">
                    <select name="species">
                        <option value="specie" disabled selected><?= $adoption['specie'] ?></option>
                        <option value="dog">Chien</option>
                        <option value="cat">Chat</option>
                    </select>

                    <i class="fa fa-caret-down"></i>
               </div>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="<?= $adoption['description'] ?>"></textarea>
                <button class="button" type="submit">Valider</button>
        
            </form>
        </div>
        <?php }; ?>
       <section class="card">
            <div class="img-container">
                <img src="uploads/<?= $adoption['picture'] ?>" alt="animaux en adoption" class="img-fluid">
            </div>
            <div class="left-content">
                <div class="content">
                    <div class="title">
                    <?php if($adoption['gender'] == 'male') {
                            echo '<i class="fa fa-mars"></i>';
                        }
                        else echo '<i class="fa fa-venus"></i>'; ?>
                        <h3 class="name"><?= $adoption['name'] ?></h3>
                    </div>
                    <?php if($isConnected){?> 
                    <div class="edit-part hr-buttons">
                        <a class="edit-btn" href="?page=single&id=<?= $adoption["id"] ?>">
                                <i class="fa fa-pen"></i>
                                Modifier
                            </a>

                            <a class="delete-btn" href="?page=remove-adoption&a=delete&id=<?= $adoption["id"] ?>">
                                <i class="fas fa-trash-alt"></i>
                                Supprimer
                            </a>
                    </div>
                    <?php };?>
                </div>
                <p><?= $adoption['description'] ?></p>
            </div>   
       </section>
       <section class="contact center-text">
            <h2>Se poser les bonnes questions avant d’adopter !</h2>
            <p>
            
                L'adoption d'un animal est bien plus qu'une simple décision, c'est un engagement envers une vie qui dépendra entièrement de vous. En choisissant d'adopter, vous offrez une seconde chance à un être vulnérable et, en retour, vous serez récompensé par une affection inconditionnelle. 
            </p>
            <p>
                Cependant, cette responsabilité implique de fournir une alimentation adéquate, des soins médicaux, de l'exercice, de l'amour et de l'attention. Vous devrez prendre le temps de comprendre les besoins spécifiques de l'animal que vous choisissez, ainsi que son comportement. L'adoption signifie également prendre en compte les coûts à long terme, le temps nécessaire pour l'éducation, la socialisation et la patience requise pour résoudre les problèmes de comportement.</h2>
            </p>
            <h4 class="center-text">    
                DES QUESTIONS SUR LES PROCÉDURES D’ADOPTION OU AUTRES ?
            </h4>
            <a class="button" href="<?= $base_url ?>?page=contact">Contactez-nous</a>
       </section>
   
       <?php 
       $content = ob_get_clean();
       require "layout.php";};
   ?>