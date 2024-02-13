<p align="center">
  <a href="https://zupimages.net/up/24/07/crpo.png">
    <img src="https://zupimages.net/up/24/07/crpo.png" alt="Logo" width=250 height=auto>
  </a>
<h3>Well-Being of Strays</h3>

</p>


## Sommaire

- [Le site](#introduction)
- [Spécifications](#spécifications)
- [Comment ça marche ? ](#comment-ça-marche-)
- [Bugs et demandes](#bugs-et-demandes)
- [Créatrice](#créatrice--copyright)
- [Remerciements](#remerciements)


## Introduction

<p>
 Le projet de conception du site vitrine pour l'association Well-Being of Strays avait pour objectif principal d'accroître la visibilité en ligne au-delà des réseaux sociaux. Les besoins comprenaient la présentation des animaux disponibles pour l'adoption, la facilitation de la collecte de dons via un lien PayPal, et l'information du public sur les événements à venir.</p>

  
<p>  Les maquettes ont intégré des boutons 'Call-To-Action' pour encourager les dons, et la page d'accueil a été optimisée pour mettre en avant la section adoption. Sur le plan du développement, une interface utilisateur a été créée pour la gestion facile des fiches d'adoption et d'événements, avec des fonctionnalités CRUD. Un formulaire d'inscription a été ajouté pour permettre aux membres de gérer la partie dynamique du contenu, et les visiteurs peuvent consulter les fiches et utiliser un formulaire de contact. </p>

  
  <p>La méthodologie Agile a été suivie pour garantir la validation de chaque étape et répondre aux besoins visuels et fonctionnels de l'association.
  </p>

## Spécifications: 

i.	Souscription 
La page est accessible par un lien directement communiqué à l’administrateur si besoin peut le transmettre aux membres autorisés.
1.	Le membre peut s’inscrire si nécessaire en tant que simple utilisateur et gérer les fiches adoptions et évènements, uniquement l’utilisateur avec le rôle “Administrateur” peut gérer les données personnelles des comptes.
Le formulaire lié à la base de données comprend les champs obligatoires : 
a.	Nom
b.	Prénom
c.	Numéro de téléphone 
d.	Email
e.	Mot de passe
f.	Confirmer le mot de passe
Note : sur la page “Profils” il est possible pour l’administrateur d’ajouter de nouveaux comptes et aussi d’attribuer le rôle d’Administrateur aux membres.

ii.	Connexion - accessible par un lien directement
1.	L’utilisateur peut se connecter via le formulaire afin de gérer le contenu.
Le formulaire lié à la base de données comprend les champs obligatoires : 
a.	Email
b.	Mot de passe
Note : sur la page “Profils” il est possible pour l’administrateur de modifier toutes les informations d’un compte membre ou de supprimer également.



iii.	Accueil
1.	La première section de la page contient un bouton de redirection vers le lien paypal pour effectuer un don.
2.	Section Adoption -
a.	Affichage de tous les animaux disponibles en adoption, chaque fiche est cliquable vers la page de l’animal.
3.	Un filtre sous forme de menu déroulant pour sélectionner l’espèce de l’animal est disponible afin de rendre l’expérience utilisateur (UX) plus agréable.
Si connecté - 
4.	les boutons “Modifier” ou “Supprimer” s’affichent pour la partie Adoptions afin de gérer le contenu.
5.	Section Mission comprend un lien vers la section concernée sur la page Missions.

iv.	Adoptions
1.	La page affiche la liste des adoptions, qui sont séparée par l’espèce mais les visiteurs peuvent toujours filtrer.
Si connecté - 
a.	Le formulaire permettant d’ajouter une nouvelle fiche Adoption avec les champs obligatoires : 
i.	Photo de l’animal – taille maximale définie ainsi que le format 
ii.	Nom
iii.	Genre
iv.	Espèce 
v.	Description 
v.	Missions
1.	Sections avec ancrage pour accéder directement à la section souhaitée : 
a.	Sensibilisation
b.	Nourrissage
c.	Sauvetages
d.	Stérilisation

vi.	Évènements
1.	La liste des événements s’affiche
Si connecté - 
b.	Le formulaire permettant d’ajouter une nouvelle fiche Évènement avec les champs obligatoires : 
i.	Titre
ii.	Image de l'évènement  – taille maximale définie ainsi que le format
iii.	Lien qui redirige vers la publication ou le formulaire Google pour les inscriptions vers un évènements


vii.	Fiche – Animal
1.	Section de l’animal sélectionné où s’affiche les détails suivants : 
a.	Image
b.	Nom
c.	Genre
d.	Descriptions

Si connecté - 
c.	Les boutons “Modifier” ou “Supprimer” s’affichent afin de gérer le contenu.
d.	Le formulaire permettant de modifier une nouvelle fiche animal avec les champs suivants : 
i.	Photo de l’animal – taille maximale définie ainsi que le format 
ii.	Nom
iii.	Genre
iv.	Espèce 
v.	Description

2.	Bouton Contacter : redirige vers la page Contact.

viii.	Contact
1.	Formulaire avec les champs obligatoires sauf pour le champ Téléphone : 
a.	Nom
b.	Email
c.	Téléphone 
d.	Objet 
e.	Message

ix.	Mon profil - accessible par l’administrateur uniquement
1.	Formulaire avec les champs obligatoires sauf pour le champ Téléphone : 
2.	Liste de tous les comptes des membres.
3.	Le formulaire permettant de modifier les informations personnelles ou d’ajouter un compte avec les champs suivants : 
a.	Nom
b.	Prénom
c.	Numéro de téléphone 
d.	Email
e.	Mot de passe
f.	Confirmer le mot de passe 


## Comment ça marche ?

Le projet a été conçu sur la bse d'un MVC classique avec donc des dossiers pour séparer les fichiers en fonction de leur utilité. <br>

Pour trouver les liaisons entre l'application et la base de données, il faudra aller depuis la source du projet : <br>
Les fichiers permettent de gérer les données de la base de données et donc d'interagir avec, les fichiers concernés pour exécuter les requêtes sont :

```text
models/
 ├── authModel.php
 └── eventsmodel.php
 └── adoptionsmodel.php
 └── profilesmodel.php

    
```

Exemple d'une fonction pour la connexion d'utilisateur :<br>

function eventPage()
{
    global $base_url;

    $selectedEvent = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectedEvent = showEvent($id);
    }

    $events = showEvents();

    if ($_POST) {
        $id_user = $_SESSION["user"]["id"];
        $title = $_POST['title'];
        $link = $_POST['event-link'];
        $description = $_POST['description'];

        $picture = time() . '_' . $_FILES['img-event']['name'];
        $temp_folder = $_FILES['img-event']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $picture;

        $maxFileSize = 2097152;

        if (!empty($_FILES['img-event']['name'])) {

        $oldPicturePath = ROOT_PATH . "/uploads/" . $selectedEvent['picture'];
        $picture_upload = move_uploaded_file($temp_folder, $upload_folder);
            $fileSize = $_FILES['img-event']['size'];

            if ($fileSize > $maxFileSize) {
                echo '<div class="modal"><p>La taille de votre image est trop lourde.</p></div>';
                return
                    showEventsPage($events, $selectedEvent);
            } else {
                
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
            
            if (!$picture_upload) {
                echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
                return
                    showEventsPage($events, $selectedEvent);
            }
        }
        elseif (empty($_FILES['img-event']['name']) && isset($_GET['id'])) {
            $picture = $selectedEvent['picture'];
        }
        else {
            echo '<div class="modal"><p>Merci d\'ajouter une image</p></div>';
            return
                showEventsPage($events, $selectedEvent);
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $update = updateEvents($id, $id_user, $title, $picture, $link, $description);
        } else {
            $update = newEvents($id_user, $title, $picture, $link, $description);
        }

        if ($update) {
            header("Location: $base_url/?page=evenements");
        } else {
            echo '<div class="modal"><p>Merci de vérifier les champs obligatoires.</p></div>';
        }
    }
    showEventsPage($events, $selectedEvent);
}
Pour les controllers qui récupèrent les valeurs des champs depuis les différents formulaires, ils sont accessibles :

```text
controllers/
 ├── authController.php
 └── adoptionsController.php
 └── eventsController.php
 └── homeController.php
 └── profilesController.php
 └── contactController.php
 └── captchaControllers
    
```

Un exemple de la fonction depuis le dossier Controllers, pour la création de post :

function createPosts(): void
{
    if ($_POST) {
        $id_user = $_SESSION['user']['id'];
        $content = $_POST['postContent'];

        $image =  time() . $_FILES['userPicture']['name'];
        $temp_folder = $_FILES['userPicture']['tmp_name'];
        $upload_folder = ROOT_PATH . "/uploads/" . $image;

        $maxFileSize = 2097152;
        $fileSize = $_FILES['userPicture']['size'];

        // Check if a file was uploaded successfully
        if ($image) {
            // Check file size
            if ($fileSize > $maxFileSize) {
                echo '<div class="modal-error"><p>La taille de votre image est trop lourde.</p></div>';
            } else {
                // Move uploaded file
                move_uploaded_file($temp_folder, $upload_folder);
            }
        } else {
            // No file uploaded, use default image
            $image = '';
        }

        $result = createPost($id_user, $image, $content);
        if ($result) {
            echo header('Location: ?p=home');
        } else {
            echo '<div class="modal-error"><p>Une erreur s\'est produite.</p></div>';
        }
    }

    // showHomePage();
    $posts = getAllPosts();
    showHomePage($posts);
}

## Bugs et demandes

Pour tous les bugs ou autres demandes, merci de signaler sur : framelelelo89@gmail.com



## Créatrice & copyright


- <https://github.com/framelelo>

## Remerciements

Merci pour votre intérêt à cette application que j'espère pourront servir.



Enjoy :metal:
