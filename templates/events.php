<?php 
function showEventsPage($events)
{
    $page = 'evenements';
    $title = 'Nos évènements';


    global $isConnected;
    global $base_url;

    ob_start() ?>
    <?php if ($isConnected) { ?>
        <div class="container">
            <div class="edit-form">
                <h4><?= isset($_GET['id']) ? 'Modifier l\'évènement' : 'Ajouter un évènement' ?></h4>
                <form method="post" enctype="multipart/form-data">
                    <div class="image-upload-btn">
                        <label class="title-image" for="image-upload">Ajouter une image</label>
                        <input type="file" name="img-event" id="image-upload" accept=".jpeg,.png,.jpg" required>
                    </div>
                    <input type="text" placeholder="Nom" name="title" id="name" required>
                    <input type="text" placeholder="Lien" name="event-link" id="event-link" required>
                    <textarea name="description" id="message" cols="30" rows="10" placeholder="Description" required></textarea>
                    <button class="button" type="submit"><?= isset($_GET['id']) ? 'Modifier' : 'Valider' ?></button>
                </form>
            </div>
        </div>
    <?php } ?>

    <h3 class="events-title">Nos évènements</h3>

    <section class="events">
        <div class="container-card">
            <?php foreach ($events as $event) { ?>

                <div class="card">
                    <h3 class="title"><?= $event['title'] ?></h3>

                    <?php if ($isConnected) { ?>
                        <div class="edit-part">
                            <a class="edit-btn" href="?page=evenements&id=<?= $event["id"] ?>">
                                <i class="fa fa-pen"></i>
                            </a>

                            <a class="delete-btn" href="?page=remove-event&a=delete&id=<?= $event["id"] ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    <?php } ?>
                    <a href="<?= $event['link'] ?>" target="_blank">
                        <div class="img-container">
                            <img src="uploads/<?= $event['picture'] ?>" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="description">
                            <p>
                                <?= $event['description'] ?>
                            </p>
                        </div>
                    </a>
                </div>
            <?php }; ?>

        </div>
    </section>
<?php
    $content = ob_get_clean();
    require "layout.php";
}
?>