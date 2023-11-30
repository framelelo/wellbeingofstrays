<?php 
global $base_url;

global $isConnected;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="assets/styles.css">
    <script src="assets/script.js" defer></script>

    <!--  FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        

    <!--  GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Well-Being of Strays</title>
    <link rel="icon" type="image/x-icon" href="uploads/logo.ico">
</head>
<body class="<?= $title?>-page">
    <?php if ($title !== 'connexion' && $title !== 'inscription') {
        
    ?>

    <header>
        <div class="brand">
            <a href="">
                <img src="uploads/logo.png" alt="wellbeingofstrays" class="logo">
            </a>
        </div>
        <div class="navbar">
            <div class="open-nav nav-btn">
                <i class="fa fa-bars"></i>
            </div>
            <ul class="nav">  
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
                <?php if ($isConnected) {?> 
                <li class="list profil-btn">
                    <a href="<?= $base_url ?>?page=profils"><i class="fas fa-user-circle"></i> <span>Profils</span></a>
                </li>
                <li class="list logout-btn">
                    <a href="<?= $base_url ?>?page=logout"><i class="fas fa-sign-out-alt"></i> <span>Se déconnecter</span></a>    
                </li>
                <?php };?>
            </ul>
        </div>
    </header>
    <?php }; ?>
    <main>
        <?= $content;?>
    </main>
    <?php if ($title !== 'connexion' && $title !== 'inscription') {
    ?>
        <footer>
            <div class="top-container">
                <div class="menu">
                    <h2 class="title">
                        Well-Being of Strays
                    </h2>
                    <p>
                        <i class="fa fa-envelope"></i> wellbeingofstrays@gmail.com
                    </p>
                    <p>
                        <i class="fa fa-phone"></i> 59632054
                    </p>
                    <p>BRN N° : A18000453</p>
                </div>
                <div class="menu">
                    <h2>Comment Aider ?</h2>
                    <ul>
                        <li><a href="">Faire un don</a></li>
                        <li><a href="">Adopter un animal</a></li>
                        <li><a href="">Devenir un bénévole</a></li> 
                    </ul>
                </div>
                <div class="menu">
                    <h2>Menu</h2>
                    <ul>
                        <li><a href="">Accueil</a></li>
                        <li><a href="">Contactez-nous</a></li>
                        <li><a href="">Mentions légales</a></li> 
                    </ul>
                </div>
            </div> 
            <div class="bottom-container">
                <p class="copyright">Well-Being of Strays <i class="fa fa-copyright"><span class="year">2023</span></i></p>
                <div class="social-icons">
                    <a href="" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>

                    <a href="" target="_blank">
                        <i class="fab fa-instagram-square"></i>
                    </a>
                </div>
            </div>
        </footer>
    <?php }; ?>
</body>
</html>