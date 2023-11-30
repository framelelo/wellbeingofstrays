
<?php 
$title = 'events';
global $isConnected;
global $base_url;

ob_start()?>
       <div class="container">
            <div class="edit-form">
                <h4>Ajouter un évènement</h4>
                <form>
                    <div class="image-upload-btn"> 
                        <label class="title-image" for="image-upload">Ajouter une image</label>
                        <input type="file" name="img-animal" id="image-upload" accept=".jpeg,.png,.jpg">
                    </div>
                    <input type="text" placeholder="Nom" name="name" id="name">
                    <input type="text" placeholder="Lien" name="event-link" id="event-link">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Description"></textarea>
                    <button class="button" type="submit">Valider</button>
                </form>
            </div>
        </div>
       
        <h3 class="events-title">Nos évènements</h3>

        <section class="events">
            <div class="container-card">
                <div class="card">
                    <h3 class="title">FREE STERILISATION</h3>
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
                            <img src="uploads/events 1.jpeg" alt="animaux en adoption" class="img-fluid">
                        </div>
                        <div class="description">
                            <p>
                                Déjà castré, il adore se prélasser toute la journée pour récupérer des forces pour des gros moments
                            </p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <h3 class="title">PET FOOD COLLECTION</h3>
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
                            <img src="uploads/events 2.jpeg" alt="animaux en adoption" class="img-fluid">
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
        <?php
    $content = ob_get_clean();
    require "layout.php";
?>