<?php
function singleAdoptionPage($adoption)
{
    $title = 'Adoption animale -' . $adoption['name'];
    $page  = 'single';

    global $base_url;
    global $isConnected;

    ob_start();
    if ($isConnected) { ?>
        <div class="edit-form">
            <h4>Modifier la fiche</h4>
            <form method="post" action="<?php $base_url ?>?page=modifier-adoption&id=<?= $adoption["id"] ?>" enctype="multipart/form-data">
                <div class="image-upload-btn">
                    <div class="img-container img-preview">
                        <img src="uploads/<?= $adoption['picture'] ?>" alt="Animaux en adoption Maurice" class="img-fluid" id="previewImage">
                    </div>

                    <label class="title-image" for="image-upload">Changer la photo</label>
                    <input type="file" name="img-animal" id="image-upload" accept=".jpeg,.png,.jpg" onchange="previewFile()">
                    <div id="preview"></div>
                </div>
                <input type="text" placeholder="<?= $adoption['name'] ?>" value="<?= $adoption['name'] ?>" name="name" id="name" maxlength='20'>

                <div class="select-style">
                    <select name="gender">
                        <option value="<?= $adoption['gender'] ?>" disabled selected><?= $adoption['gender'] ?></option>


                        <option value="male" <?php echo ($adoption['gender'] == 'male') ? 'selected' : ''; ?>>Mâle</option>
                        <option value="femelle" <?php echo ($adoption['gender'] == 'femelle') ? 'selected' : ''; ?>>Femelle</option>
                    </select>
                    <i class="fa fa-caret-down"></i>
                </div>

                <div class="select-style">
                    <select name="species">
                        <option value="<?= $adoption['specie'] ?>" disabled selected><?= $adoption['specie'] ?></option>
                        <option value="dog" <?php echo ($adoption['specie'] == 'dog') ? 'selected' : ''; ?>>Chien</option>
                        <option value="cat" <?php echo ($adoption['specie'] == 'cat') ? 'selected' : ''; ?>>Chat</option>
                    </select>
                    <i class="fa fa-caret-down"></i>
                </div>
                <textarea name="description" id="description" cols="30" rows="10" maxlength='200' placeholder="<?= $adoption['description'] ?>"><?= $adoption['description'] ?></textarea>
                <button class="button" type="submit">Modifier <i class="fa fa-arrow-right"></i></button>

            </form>
        </div>
    <?php }; ?>
    <section class="card">
        <div class="img-container">
            <img src="uploads/<?= $adoption['picture'] ?>" alt="Animaux en adoption Maurice" class="img-fluid">
        </div>
        <div class="left-content">
            <div class="content">
                <div class="title">
                    <?php if ($adoption['gender'] == 'male') {
                        echo '<i class="fa fa-mars"></i>';
                    } else echo '<i class="fa fa-venus"></i>'; ?>
                    <h3 class="name"><?= $adoption['name'] ?></h3>
                </div>
                <?php if ($isConnected) { ?>
                    <div class="edit-part hr-buttons">
                        <a class="edit-btn" href="?page=single&id=<?= $adoption["id"] ?>">
                            <i class="fa fa-pen"></i>
                            Modifier
                        </a>

                        <a class="delete-btn" href="?page=supprimer-adoption&id=<?= $adoption["id"] ?>">
                            <i class="fas fa-trash-alt"></i>
                            Supprimer
                        </a>
                    </div>
                <?php }; ?>
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
    require "layout.php";
};
?>