<?php 
$title = 'Accueil';
global $isConnected;
global $base_url;

ob_start()?>
            <div class="jumbotron">
                <img src="uploads/jumbotron-accueil.jpg" alt="wellbeingofstrays" class="img-fluid">
                <div class="container">
                    <div class="content">
                        <h2>QUI EST WELL-BEING OF STRAYS ?</h2>
                        <p>
                            L'association Well-being of Strays est une organisation créée en 2017 à but non lucratif dédiée au bien-être des animaux errants. Nous nous efforçons de venir en aide aux animaux abandonnés, perdus ou maltraités en leur offrant un refuge, des soins médicaux, de la nourriture et de l'amour.
                        </p>
                        <p>
                            Notre mission quotidienne est d’améliorer la vie des animaux errants en mettant en place des solutions durables pour leur bien-être. 
                        </p>
                        <p>    
                            Well-being of Strays compte sur le soutien de bénévoles, de donateurs et de sympathisants pour continuer sa mission et faire une différence positive dans la vie de ces animaux vulnérables.
                        </p>
                        <a href="https://www.paypal.com/donate?hosted_button_id=3DS8RCCPB5EB6" class="button" target="_blank">Faire un don</a>
                    </div>
                </div>
            </div>
            <section class="adoptions">
                <h1>Découvrez les animaux à l’adoption</h1>
    
                <div class="filter" id="filter-species">
                    <button class="select-button">
                      <span class="selected-value">Filtrer par :</span>
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="select-dropdown species-filter">
                      <li>
                        <input class="options" type="radio" id="dogs" name="species" value="dogs"/>
                        <label for="dogs">Chiens</label>
                      </li>
                      <li>
                        <input class="options" type="radio" id="cats" name="species" value="cats"/>
                        <label for="cats">Chats</label>
                      </li>
                    </ul>
                </div>
                
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
            <section class="presentation">
                <h3>Agir Ensemble - Wellbeing of Strays</h3>
                <iframe width="100%" height="600px" src="https://www.youtube.com/embed/aRghlIDnL4k?si=a8Ehqre_GNxSDdS1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </section>
            <section class="missions">
                <div class="container">
                    <div class="column">
                        <a href class="img-container">
                            <div class="title">Sensibilisation</div>
                            <div class="content">Nous œuvrons pour trouver des foyers...</div>
                            <img src="uploads/Missions-1.jpg">
                        </a>
                      
                        <a href="" class="img-container">
                            <div class="title">Nourrissage</div>
                            <div class="content">Nos bénévoles à travers l’île nourrissent régulèrement les souvent que possibleanimaux errants de leur région...</div>
                            <img src="uploads/Missions-2.jpg"> 
                        </a>
                    </div>
                    <div class="column">
                        <a href="" class="img-container">
                            <div class="title">Sauvetage</div>
                            <div class="content">L'association recueille des animaux errants en détresse...
                            </div>
                            <img src="uploads/Missions-3.jpg">
                        </a>
                        <a href="" class="img-container">
                            <div class="title">Stérilisation</div>
                            <div class="content">Des programmes de stérilisation et de castration sont tous les mois organisées...</div>
                            <img src="uploads/Missions-4.jpg">
                        </a>
                    </div> 
                </div>
            </section>
            <section class="donation-part">
                <p><strong>Well-being of Strays</strong>  compte sur le soutien de bénévoles, de donateurs et de sympathisants pour continuer sa mission et faire une différence positive dans la vie de ces animaux vulnérables.</p>
                <a class="btn" href="https://www.paypal.com/donate?hosted_button_id=3DS8RCCPB5EB6" target="_blank">faire un don</a>
            </section>         
       
        
    <?php
        $content = ob_get_clean();
        require "layout.php";
    ?>