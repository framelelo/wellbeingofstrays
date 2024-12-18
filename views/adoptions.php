<?php
function showAdoptionsPage($adoptions_cats, $adoptions_dogs, $singleAdoption, $adoptions)
{

    // Set title and page name
    $title = 'Adoptions Chiens ou Chats';
    $page = 'adoptions';

    global $isConnected, $base_url, $token;

    // Start buffer
    ob_start() ?>

    <!-- Jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <div class="content">
                <h2>Se poser les bonnes questions avant d’adopter !</h2>
                <p>
                    L'adoption d'un animal est un engagement sérieux, bien au-delà d'une simple décision.
                    C'est offrir une seconde chance à une vie qui dépendra entièrement de vous, avec en retour une affection inconditionnelle.
                </p>
                <p>Cependant, cela signifie fournir une alimentation appropriée, des soins médicaux, de l'exercice, de l'amour et de l'attention. Comprenez les besoins spécifiques de l'animal, son comportement, et soyez prêt pour les coûts à long terme, le temps d'éducation, de socialisation, et la patience nécessaire pour résoudre les problèmes de comportement.
                </p>
                <p class="center-text">
                    DES QUESTIONS SUR LES PROCÉDURES D’ADOPTION OU AUTRES ?
                </p>
                <a class="button" href="<?= $base_url ?>?page=contact">Contactez-nous</a>
            </div>
        </div>
    </div>
    <div class="container">

        <!-- Form to add a new adoption -->
        <?php if ($isConnected) { ?>
            <div class="edit-form">
                <h4>Ajouter un animal</h4>
                <form method="post" enctype="multipart/form-data">

                    <!-- Image upload & preview -->
                    <div class="image-upload-btn">
                        <div class="img-container img-preview" style="display: none;">
                            <img src="uploads/<?= $singleAdoption['picture'] ?>" alt="Animaux en adoption île Maurice" class="img-fluid" id="previewImage">
                        </div>

                        <label class="title-image" for="image-upload">Ajouter une photo</label>

                        <!-- Input file : call previewfile() -->
                        <input type="file" name="img-animal" id="image-upload" accept=".jpeg,.png,.jpg" onchange="previewFile()">

                    </div>
                    <input type="text" placeholder="Nom" name="name" id="name" maxlength='20' required>

                    <div class="select-style">
                        <select name="gender" class="select-style">
                            <option value="gender" disabled selected required>Male/Femelle</option>
                            <option value="mâle">Mâle</option>
                            <option value="femelle">Femelle</option>
                        </select>
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <div class="select-style">
                        <select name="species">
                            <option value="specie" disabled selected required>Chien/Chat</option>
                            <option value="chien">Chien</option>
                            <option value="chat">Chat</option>
                        </select>

                        <i class="fa fa-caret-down"></i>
                    </div>
                    <input type="tel" name="contact" id="contact" placeholder="Contact">
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description" maxlength='200' required></textarea>

                    <!-- CSRF token -->
                    <input type="hidden" name="token" value="<?= $token ?? '' ?>">

                    <button class="button" type="submit">Ajouter <i class="fa fa-arrow-right"></i></button>

                </form>
            </div>
        <?php } ?>
        <section class="adoptions">
            <h1>Découvrez les animaux à l’adoption</h1>

            <!-- Filter options for dogs and cats -->
            <?php if ($adoptions) { ?>
                <div class="filter" id="filter-species">
                    <button class="select-button">
                        <span class="selected-value">Filtrer par :</span>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="select-dropdown species-filter">
                        <li>
                            <input class="options" type="radio" id="dogs-filter" name="species" value="dogs" />
                            <label for="dogs-filter">Chiens</label>
                        </li>
                        <li>
                            <input class="options" type="radio" id="cats-filter" name="species" value="cats" />
                            <label for="cats-filter">Chats</label>
                        </li>
                    </ul>
                </div>
                <!-- Display dogs -->
                <div class="chien-content">
                    <h2>Chiens à adopter</h2>
                    <div class="container-card">
                        <?php if ($adoptions_dogs) {
                            foreach ($adoptions_dogs as $dog) { ?>
                                <div class="card <?= $dog["specie"] ?>">
                                    <?php if ($isConnected) { ?>
                                        <div class="edit-part">
                                            <a class="edit-btn" href="?page=single&id=<?= $dog["id"] ?>">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <a class="delete-btn" href="?page=supprimer-adoption&id=<?= $dog["id"] ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <a href="<?= $base_url ?>?page=single&id=<?= $dog['id'] ?>">
                                        <div class="img-container">
                                            <img src="uploads/<?= $dog['picture'] ?>" alt="Chats en adoption à l'ile Maurice" loading="lazy" class="img-fluid">
                                        </div>
                                        <div class="top-content">
                                            <h3 class="name"><?= $dog['name'] ?></h3>
                                            <?php if ($dog['gender'] == 'mâle') {
                                                echo '<i class="fa fa-mars"></i>';
                                            } else echo '<i class="fa fa-venus"></i>'; ?>
                                        </div>
                                        <div class="description">
                                            <p>
                                                <?= $dog['description'] ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                        <?php }
                        } else echo '<p class="no-adoptions">Pas d\'adoptions pour le moment</p>'; ?>
                    </div>
                </div>

                <!-- Display cats -->
                <div class="chat-content">
                    <h2>Chats à adopter</h2>
                    <div class="container-card">
                        <!-- If has cats -->
                        <?php if ($adoptions_cats) {
                            foreach ($adoptions_cats as $cat) { ?>
                                <!-- For filter purpose, a class with the specie has been added to the card -->
                                <div class="card <?= $cat["specie"] ?>">
                                    <!-- If connected then edit part is displayed -->
                                    <?php if ($isConnected) { ?>
                                        <!-- To update or delete an adoption -->
                                        <div class="edit-part">
                                            <a class="edit-btn" href="?page=single&id=<?= $cat["id"] ?>">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <a class="delete-btn" href="?page=supprimer-adoption&id=<?= $cat["id"] ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <a href="<?= $base_url ?>?page=single&id=<?= $cat['id'] ?>">
                                        <div class="img-container">
                                            <img src="uploads/<?= $cat['picture'] ?>" alt="Chats en adoption à  l'ile Maurice" loading="lazy" class="img-fluid">
                                        </div>
                                        <div class="top-content">
                                            <h3 class="name"><?= $cat['name'] ?></h3>
                                            <?php if ($cat['gender'] == 'mâle') {
                                                echo '<i class="fa fa-mars"></i>';
                                            } else echo '<i class="fa fa-venus"></i>'; ?>
                                        </div>
                                        <div class="description">
                                            <p>
                                                <?= $cat['description'] ?>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                        <?php }
                        } // If no cats available
                        else echo '<p class="no-adoptions">Pas d\'adoptions pour le moment</p>'; ?>
                    </div>
                <?php } else echo '<p class="no-adoptions">Pas d\'adoptions pour le moment</p>'; ?>
                </div>
        </section>
    </div>
<?php

    // End buffer and display it through layout.php with the variable $content
    $content = ob_get_clean();
    require "layout.php";
}; ?>