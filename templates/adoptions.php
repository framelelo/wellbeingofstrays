<?php 
function showAdoptions() {

$title = 'Adoptions Chiens ou Chats';
$page = 'adoptions';

global $isConnected;
global $base_url;

ob_start()?>

    <div class="jumbotron">
        <img src="uploads/jumbotron-adoptions.jpg" alt="wellbeingofstrays" class="img-fluid">
        <div class="container">
            <div class="content">
                <h2>Se poser les bonnes questions avant d’adopter !</h2>
                <p>
                    L'adoption d'un animal est bien plus qu'une simple décision, c'est un engagement envers une vie qui dépendra entièrement de vous. En choisissant d'adopter, vous offrez une seconde chance à un être vulnérable et, en retour, vous serez récompensé par une affection inconditionnelle. 
                </p>
                <p>
                    Cependant, cette responsabilité implique de fournir une alimentation adéquate, des soins médicaux, de l'exercice, de l'amour et de l'attention. Vous devrez prendre le temps de comprendre les besoins spécifiques de l'animal que vous choisissez, ainsi que son comportement. L'adoption signifie également prendre en compte les coûts à long terme, le temps nécessaire pour l'éducation, la socialisation et la patience requise pour résoudre les problèmes de comportement.</h2>
                </p>
                <p class="center-text">    
                    DES QUESTIONS SUR LES PROCÉDURES D’ADOPTION OU AUTRES ?
                </p>
                <a class="button"href="<?= $base_url ?>?page=contact">Contactez-nous</a>
            </div>
        </div>
    </div>
    <div class="container">

    <?php if ($isConnected) {?> 
        <div class="edit-form">
            <h4>Ajouter un animal</h4>
            <form>

                <div class="image-upload-btn"> 
                    <label class="title-image" for="image-upload">Ajouter une photo de l'animal</label>
                    <input type="file" name="img-animal" id="image-upload" accept=".jpeg,.png,.jpg">
                    
                </div>
                <input type="text" placeholder="Nom" name="name" id="name">
                <div class="selection select-style" id="select-animal-gender">
                    <button class="select-button">
                      <span class="selected-value">Mâle ou Femelle</span>
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="select-dropdown select-gender">
                      <li>
                        <input class="options" type="radio" id="male" name="species" value="male"/>
                        <label for="male">Mâle</label>
                      </li>
                      <li>
                        <input class="options" type="radio" id="female" name="species" value="female" />
                        <label for="female">Femelle</label>
                      </li>
                    </ul>
                </div>
                <div class="selection select-style" id="select-animal-specie">
                    <button class="select-button">
                      <span class="selected-value">Chien ou Chat</span>
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="select-dropdown select-specie">
                      <li>
                        <input class="options" type="radio" id="dogs" name="species" value="dogs" />
                        <label for="dogs">Chiens</label>
                      </li>
                      <li>
                        <input class="options" type="radio" id="cats" name="species" value="cats" />
                        <label for="cats">Chats</label>
                      </li>
                    </ul>
                </div>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Description"></textarea>
                <button class="button" type="submit">Valider</button>
        
            </form>
        </div>
        <?php }?>
        <section class="adoptions">
            <h1>Découvrez les animaux à l’adoption</h1>

            <div class="filter" id="filter-species">
                <button class="select-button">
                  <span class="selected-value">Filtrer par :</span>
                  <i class="fa fa-caret-down"></i>
                </button>
                <ul class="select-dropdown species-filter">
                  <li>
                    <input class="options" type="radio" id="dogs-filter" name="species" value="dogs"/>
                    <label for="dogs-filter">Chiens</label>
                  </li>
                  <li>
                    <input class="options" type="radio" id="cats-filter" name="species" value="cats" />
                    <label for="cats-filter">Chats</label>
                  </li>
                </ul>
            </div>
            
            <h2>Chiens à adopter</h2>
            <div class="container-card">
                <div class="card">

                    <?php if ($isConnected) {?> 
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <?php } ?>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <h2>Chats à adopter</h2>
            <div class="container-card">
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="edit-part">
                        <button class="edit-btn">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="delete-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <a href="">
                        <div class="img-container">
                            <img src="uploads/Boo.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="top-content">
                            <h3 class="name">Boo</h3>
                            <i class="fa fa-mars"></i>
                            
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>

       
<?php
    $content = ob_get_clean();
    require "layout.php";
};?>