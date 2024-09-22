<?php
function showEventsPage($events, $selectedEvent)
{

    // Set title and page name
    $title = 'Aider les animaux errants';
    $page = 'evenements';

    global $isConnected, $token;

    // Start buffer
    ob_start();

    // Check if user is connected
    if ($isConnected) {
        // Set ternary operators for default values
        $defaultImage = $selectedEvent['picture'] ?? '';
        $defaultTitle = $selectedEvent['title'] ?? 'Titre';
        $defaultLink = $selectedEvent['link'] ?? 'Lien';
        $defaultCoontent = $selectedEvent['description'] ?? 'Description';
        $isRequired = isset($_GET['id']) ? '' : 'required';

?>

        <div class="container">
            <!-- Form to add or update events-->
            <div class="edit-form">
                <h4><?= isset($_GET['id']) ? 'Modifier l\'évènement' : 'Ajouter un évènement' ?></h4>
                <form method="post" enctype="multipart/form-data">

                    <!-- Image upload & preview -->
                    <div class="image-upload-btn">
                        <div class="img-container img-preview" <?= !isset($selectedEvent['picture']) ? 'style="display: none;"' : '' ?>>
                            <img src="uploads/<?= $defaultImage ?>" alt="Animaux en adoption à l'ile Maurice" class="img-fluid" id="previewImage">
                        </div>
                        <label class="title-image" for="image-upload">
                            <?= isset($_GET['id']) ? 'Modifier la photo' : 'Ajouter une photo' ?>
                        </label>
                        <input type="file" name="img-event" id="image-upload" accept=".jpeg,.png,.jpg" onchange="previewFile()" value="<?= $defaultImage ?>">

                    </div>

                    <input type="text" name="title" id="name" maxlength="40" value="<?= $defaultTitle ?>" <?= $isRequired ?>>
                    <!-- Link format validation -->
                    <input type="text" oninput="validateLinkFormat(this)" name="event-link" id="event-link" value="<?= $defaultLink ?>" <?= $isRequired ?> rel="noopener noreferrer nofollow">
                    <span id="link-error-message" style="color: red;"></span>

                    
                    <textarea name="description" id="message" cols="30" rows="10" maxlength="150" <?= $isRequired ?>><?= $defaultCoontent ?></textarea>

                    <!-- CSRF token -->
                    <input type="hidden" name="token" value="<?= $token ?? '' ?>">

                    <button class="button" type="submit">
                        <?= isset($_GET['id']) ? 'Modifier' : 'Ajouter' ?> <i class="fa fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    <?php } ?>

    <h3 class="events-title">Nos évènements</h3>
    <!-- Display events cards -->
    <section class="events">
        <div class="container-card">

            <?php if ($events) {
                foreach ($events as $event) { ?>
                    <div class="card">
                        <h3 class="title"><?= $event['title'] ?></h3>
                        <?php if ($isConnected) { ?>
                            <div class="edit-part">
                                <a class="edit-btn" href="?page=evenements&id=<?= $event["id"] ?>">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a class="delete-btn" href="?page=supprimer-evenement&id=<?= $event["id"] ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        <?php } ?>
                        <a href="<?= $event['link'] ?>" target="_blank" rel="noopener noreferrer nofollow">
                            <div class="img-container">
                                <img src="uploads/<?= $event['picture'] ?>" alt="Animaux en adoption à l'ile Maurice" loading="lazy" class="img-fluid">
                            </div>
                            <div class="description">
                                <p>
                                    <?= $event['description'] ?>
                                </p>
                            </div>
                        </a>
                    </div>
            <?php };
            } else echo '<p class="no-adoptions">Pas d\'évènements pour le moment</p>'; ?>

        </div>
    </section>
<?php
    // End buffer and display it through layout.php with the variable $content
    $content = ob_get_clean();
    require "layout.php";
}
?>