<?php
function showMissions()
{

    // Set title and page name
    $title = 'Bien-être animal errant île Maurice';
    $page = 'missions';

    // Start buffer
    ob_start() ?>
    <main>
        <div class="jumbotron">
            <img src="uploads/jumbotron-missions.jpg" loading="lazy" alt="Well-Being of Strays" class="img-fluid">
            <div class="container">
                <div class="content">
                    <h2>Pour une protection animale bienveillante et durable</h2>
                    <p>
                        La protection animale est un impératif moral qui demande de traiter les animaux avec compassion, respect et dignité, en veillant à prévenir leur exploitation et à garantir leur bien-être.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <h1>Nos missions</h1>
            <section id="sensibilisation" class="block animatable bounceInLeft">
                <div class="img-part">
                    <img class="img-fluid" src="uploads/Missions-1.jpg" loading="lazy" alt="Sensibilisation animale ile maurice">
                </div>
                <div class="text-part">
                    <h2>
                        Sensibilisation :
                    </h2>
                    <p>
                        Lors des évènements nous en profitons aussi pour aller vers le public afin de sensibiliser le public sur les problèmes liés aux animaux errants, promouvoir la stérilisation, l'adoption responsable ainsi qu’encourager le respect envers tous les êtres vivants.
                    </p>
                </div>

            </section>
            <section id="nourrissage" class="block animatable bounceInRight">
                <div class="img-part">
                    <img class="img-fluid" src="uploads/Missions-2.jpg" loading="lazy" alt="Nourrir les animaux errants - ile maurice">
                </div>
                <div class="text-part">
                    <h2>
                        Nourrissage :
                    </h2>
                    <p>
                        Nos bénévoles à travers l’île nourrissent régulèrement les souvent que possibleanimaux errants de leur région. Afin de leur offrir un repas aussi souvent que possible n’ayant malheureusement pas de refuge pour les accueillir.</p>
                </div>
            </section>
            <section id="sauvetage" class="block animatable bounceInLeft">
                <div class="img-part">
                    <img class="img-fluid" src="uploads/Missions-3.png" loading="lazy" alt="Sensibilisation animale ile maurice">
                </div>
                <div class="text-part">
                    <h2>
                        Sauvetage :
                    </h2>
                    <p>
                        L'association recueille des animaux errants en détresse, les soigne et les réhabilite, les préparant ainsi à être adoptés dans des foyers aimants.</p>
                </div>

            </section>
            <section id="sterilisation" class="block animatable bounceInRight">
                <div class="img-part">
                    <img class="img-fluid" src="uploads/Missions-4.jpg" loading="lazy" alt="Stérilisation animale ile maurice">
                </div>
                <div class="text-part">
                    <h2>
                        stérilisation :
                    </h2>
                    <p>
                        Des programmes de stérilisation et de castration sont tous les mois organisées pour réduire la population d'animaux errants et éviter la souffrance inutile des abandons ou des négligences suite à des naissances non-désirées. </p>
                </div>
            </section>
        </div>

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