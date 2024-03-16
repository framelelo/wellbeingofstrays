<?php
function ShowHomePage($adoptions)
{

    // Set title and page name
    $title = 'Bien-être animal errant île Maurice';
    $page = 'home';

    global $base_url;
    global $isConnected;

    // Start buffer
    ob_start() ?>
    <div class="jumbotron">
        <img src="uploads/jumbotron-accueil.jpg" alt="well-being of strays" class="img-fluid">
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


                <a href="https://www.paypal.com/donate?hosted_button_id=3DS8RCCPB5EB6" class="button" target="_blank">
                    Faire un don
                </a>
           
           
            </div>
        </div>
    </div>
    <section class="adoptions">
        <h1>Découvrez les animaux à l’adoption</h1>

        <?php if (($adoptions) && (sizeof($adoptions) > 1)) { ?>
            <div class="filter" id="filter-species">
                <button class="select-button">
                    <span class="selected-value">Filtrer par :</span>
                    <i class="fa fa-caret-down"></i>
                </button>
                <ul class="select-dropdown species-filter">
                    <li>
                        <input class="options" type="radio" id="dogs-filter" name="species" value="chien" />
                        <label for="dogs-filter">Chiens</label>
                    </li>
                    <li>
                        <input class="options" type="radio" id="cats-filter" name="species" value="chat" />
                        <label for="cats-filter">Chats</label>
                    </li>
                </ul>
            </div>
        <?php } ?>
        <div class="container-card">
            <?php if ($adoptions) {
                foreach ($adoptions as $adoption) { ?>
                    <div class="card <?= $adoption["specie"] ?>-content block animatable fadeInUp">

                        <?php if ($isConnected) { ?>
                            <div class="edit-part">
                                <a class="edit-btn" href="?page=single&id=<?= $adoption["id"] ?>">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a class="delete-btn" href="?page=supprimer-adoption&id=<?= $adoption["id"] ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        <?php } ?>
                        <a href="<?= $base_url ?>?page=single&id=<?= $adoption['id'] ?>">
                            <div class="img-container">
                                <img src="uploads/<?= $adoption['picture'] ?>" alt="Animaux à adopter Maurice" loading="lazy" class="img-fluid">
                            </div>
                            <div class="top-content">
                                <h3 class="name"><?= $adoption['name'] ?></h3>
                                <?php if ($adoption['gender'] == 'mâle') {
                                    echo '<i class="fa fa-mars"></i>';
                                } else echo '<i class="fa fa-venus"></i>'; ?>

                            </div>
                            <div class="description">
                                <p>
                                    <?= $adoption['description'] ?>
                                </p>
                            </div>
                        </a>
                    </div>
            <?php }
            } else echo '<p class="no-adoptions">Retrouvez nos propositions d\'adoption prochainement !</p>'; ?>
            <!-- DISPLAY MESSAGE IF ONE OF SPECIES IS EMPTY -->
            <p class="no-adoptions-message" style="display: none;">Pas d'adoptions pour le moment</p>

        </div>
    </section>
    <section class="presentation">
        <h3>Agir Ensemble - Well-Being of Strays</h3>
        <iframe loading="lazy" width="100%" height="600px" src="https://www.youtube.com/embed/aRghlIDnL4k?si=a8Ehqre_GNxSDdS1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </section>
    <section class="missions">
        <h2>Nos missions</h2>
        <div class="container">
            <div class="column">
                <a href="<?= $base_url ?>?page=missions#sensibilisation" class="img-container block animatable fadeInUp">
                    <div class="title">Sensibilisation</div>
                    <div class="content">Nous œuvrons pour trouver des foyers...</div>
                    <img src="uploads/Missions-1.jpg" loading="lazy" alt="Animaux île Maurice">
                </a>

                <a href="<?= $base_url ?>?page=missions#nourrissage" class="img-container block animatable fadeInDown">
                    <div class="title">Nourrissage</div>
                    <div class="content">Nos bénévoles à travers l’île nourrissent régulèrement les souvent que possibleanimaux errants de leur région...</div>
                    <img src="uploads/Missions-2.jpg" loading="lazy" alt="Aide aux animaux Maurice">
                </a>
            </div>
            <div class="column">
                <a href="<?= $base_url ?>?page=missions#sauvetage" class="img-container block animatable fadeInUp">
                    <div class="title">Sauvetage</div>
                    <div class="content">L'association recueille des animaux errants en détresse...
                    </div>
                    <img src="uploads/Missions-3.png" loading="lazy" alt="Sauvetage animaux Maurice">
                </a>
                <a href="<?= $base_url ?>?page=missions#sterilisation" class="img-container block animatable fadeInDown">
                    <div class="title">Stérilisation</div>
                    <div class="content">Des programmes de stérilisation et de castration sont tous les mois organisées...</div>
                    <img src="uploads/Missions-4.jpg" loading="lazy" alt="Sterilisation animaux Maurice">
                </a>
            </div>
        </div>
    </section>
    <section class="donation-part">
        <p><strong>Well-being of Strays</strong> compte sur le soutien de bénévoles, de donateurs et de sympathisants pour continuer sa mission et faire une différence positive dans la vie de ces animaux vulnérables.</p>
        <a class="btn" href="https://www.paypal.com/donate?hosted_button_id=3DS8RCCPB5EB6" target="_blank">faire un don</a>
    </section>


<?php

    // End buffer and display it through layout.php with the variable $content
    $content = ob_get_clean();
    require "layout.php";
}
?>