<!DOCTYPE html>
<?php
global $base_url;

global $isConnected;
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="assets/styles.css">
    <script src="assets/script.js" defer></script>

    <!--  GOOGLE RECAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!--  FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--  GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Well-Being of Strays - <?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="uploads/logo.ico">
</head>

<body class="<?= $page ?>-page">
    <?php if ($page !== 'connexion' && $page !== 'inscription') {

    ?>

        <header>
            <div class="brand">
                <a href="<?= $base_url ?>">
                    <img src="uploads/logo.png" alt="wellbeingofstrays" class="logo">
                </a>
            </div>
            <nav>
                <div class="open-nav nav-btn">
                    <i class="fa fa-bars"></i>
                </div>
                <ul class="navbar">
                    <div class="close-nav nav-btn">
                        <i class="fa fa-times"></i>
                    </div>
                    <li class="list">
                        <a href="<?= $base_url ?>">Accueil</a>
                    </li>
                    <li class="list">
                        <a href="<?= $base_url ?>?page=adoptions">Adoptions</a>
                    </li>
                    <li class="list dropdown-btn">
                        <a href="<?= $base_url ?>?page=missions">Missions
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="list dropdown-list">
                                <a href="<?= $base_url ?>?page=missions#sensibilisation">Sensibilisation</a>
                            </li>
                            <li class="list dropdown-list">

                                <a href="<?= $base_url ?>?page=missions#nourrissage">Nourrissage</a>
                            </li>
                            <li class="list dropdown-list">
                                <a href="<?= $base_url ?>?page=missions#sauvetage">Sauvetage</a>
                            </li>
                            <li class="list dropdown-list">
                                <a href="<?= $base_url ?>?page=missions#sterilisation">Stérilisation</a>
                            </li>
                        </ul>
                    </li>
                    <li class="list">
                        <a href="<?= $base_url ?>?page=evenements">Évènements</a>
                    </li>
                    <li class="list">
                        <a href="<?= $base_url ?>?page=contact">Contact</a>
                    </li>
                    
                    <?php if ($isConnected) { ?>

                        <?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] == 'admin') { ?>

                            <li class="list profil-btn">
                                <a href="<?= $base_url ?>?page=profils"><i class="fas fa-user-circle"></i> <span>Profils</span></a>
                            </li>
                        <?php } ?>

                        <li class="list logout-btn">
                            <a href="<?= $base_url ?>?page=logout"><i class="fas fa-sign-out-alt"></i> <span>Se déconnecter</span></a>
                        </li>
                    <?php }; ?>
                </ul>
            </nav>
        </header>
    <?php }; ?>

    <!-- Main content -->
    <main>
        <!-- Variable content -->
        <?= $content; ?>
    </main>
    
    <?php if ($page !== 'connexion' && $page !== 'inscription') {
    ?>
        <footer>
            <div class="top-container">
                <div class="menu">
                    <h2 class="title">
                        Well-Being of Strays
                    </h2>
                    <p class="contact">
                        <i class="fa fa-envelope"></i> <a href="mailto:wellbeingofstrays@gmail.com">wellbeingofstrays@gmail.com</a>
                    </p>
                    <p class="contact">
                        <i class="fa fa-phone"></i> <a href="tel:59632054">59632054</a>
                    </p>
                    <p>BRN N° : A18000453</p>
                </div>
                <div class="menu">
                    <h2>Comment Aider ?</h2>
                    <ul>
                        <li><a href="https://www.paypal.com/donate?hosted_button_id=3DS8RCCPB5EB6" target="_blank">Faire un don</a></li>
                        <li><a href="<?= $base_url ?>?page=adoptions">Adopter un animal</a></li>
                        <li><a href="https://rb.gy/lekvls" target="_blank">Devenir bénévole</a></li>
                    </ul>
                </div>
                <div class="menu">
                    <h2>Menu</h2>
                    <ul>
                        <li><a href="<?= $base_url ?>">Accueil</a></li>
                        <li><a href="<?= $base_url ?>?page=contact">Contactez-nous</a></li>
                        <li><a href="<?= $base_url ?>?page=mentions_legales">Mentions légales</a></li>
                    </ul>
                </div>
            </div>
            <div class="bottom-container">
                <p class="copyright">Well-Being of Strays <i class="fa fa-copyright"><span class="year"><?= date('Y'); ?></span></i></p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/wellbeingofstrays808" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>

                    <a href="https://www.instagram.com/thewellbeingofstrays/" target="_blank">
                        <i class="fab fa-instagram-square"></i>
                    </a>
                </div>
            </div>
        </footer>
    <?php }; ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>