<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<?php include "logout.php"; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/formCont.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <title>Contact</title>
    <style>
        /* CSS pour la section animée */
        .section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        .section-content {
            opacity: 1;
        }



    </style>
</head>
<body>

<nav class="navbar">
    <div class="navbar-left">
        <a href="index.php">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">BLOG</a>
    </div>
    <div class="navbar-center">
        <h1>Lara. M</h1>
    </div>
    <div class="navbar-right">
        <a href="#">SHOP</a>
        <a href="#">CONTACT</a>

        <?php
           if (session_status() === PHP_SESSION_NONE) {
               session_start();
           }
           
           if (isset($_SESSION["email"])) {
               // L'utilisateur est connecté
               echo '<a href="login.php?logout">DÉCONNEXION</a>
               ';
           } else {
               // L'utilisateur n'est pas connecté
               echo '<a href="login.php">MON ESPACE</a>';
           }
           ?>
           
     
           
    </div>
    <div class="navbar-toggle">
        <button class="toggle-button">&#9776;</button>
    </div>
</nav>

<section class="section">
    <div class="section-content">
        <h1>Contactez-nous</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

            <div class="form-row">
                <div class="form-col">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-col">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="content">Contenu :</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-col">
                    <label for="tel">Téléphone :</label>
                    <input type="tel" id="tel" name="tel" required>
                </div>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</section>


    <?php

        // Connexion à la base de données
        $mysqli = new mysqli("localhost", "root", "root", "institut");

        // Vérifier la connexion
        if ($mysqli->connect_error) {
            die("La connexion a échoué : " . $mysqli->connect_error);
        }

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $content = $_POST['content'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];

            // Vérification si les champs du formulaire ne sont pas vides
            if (!empty($nom) && !empty($prenom) && !empty($content) && !empty($email) && !empty($tel)) {
                // Préparer et exécuter la requête d'insertion
                $stmt = $mysqli->prepare("INSERT INTO contact (nom, prenom, content, email, tel) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $nom, $prenom, $content, $email, $tel);

                if ($stmt->execute()) {
                    // Les données ont été enregistrées avec succès
                    echo "Les données ont été enregistrées avec succès.";
                } else {
                    // Une erreur s'est produite lors de l'enregistrement des données
                    echo "Erreur : " . $stmt->error;
                }

                // Fermer la requête
                $stmt->close();
            } else {
                // Afficher un message d'erreur si des champs sont vides
                echo "Tous les champs du formulaire doivent être remplis.";
            }
        }

        // Fermer la connexion
        $mysqli->close();
        ?>


    <script>
        // Animation de la section avec GSAP
        gsap.from(".section-content", { opacity: 0, duration: 1, y: -50, delay: 0.5 });
    </script>
   <footer class="footer">
        <div class="container">
          <div class="footer-content">
            <div class="footer-column">
              <h4 class="footer-title">À propos</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam metus ut purus euismod, ut tristique nulla
                egestas. Nullam et odio nec turpis tempor condimentum.
              </p>
            </div>
            <div class="footer-column">
              <h4 class="footer-title">Liens utiles</h4>
              <ul>
                <li><a class="footer-link" href="#">Accueil</a></li>
                <li><a class="footer-link" href="#">Produits</a></li>
                <li><a class="footer-link" href="#">Services</a></li>
                <li><a class="footer-link" href="#">À propos</a></li>
                <li><a class="footer-link" href="#">Contact</a></li>
              </ul>
            </div>
            <div class="footer-column">
              <h4 class="footer-title">Suivez-nous</h4>
              <div class="footer-social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
              </div>
            </div>
            <div class="footer-column">
              <h4 class="footer-title">Contact</h4>
              <p>Adresse : 123, Rue du Paradis<br>Ville, Pays</p>
              <p>Téléphone : +123 456 789<br>Email : info@example.com</p>
            </div>
          </div>
        </div>
 
      
        </div>
        <div class="footer-copyright">
          &copy; 2023 Mon
        </div>
    </footer> 
    <script>
    // Animation de la section avec GSAP
    // gsap.from(".section-content", {
    //     opacity: 0,
    //     duration: 1,
    //     y: -50,
    //     delay: 0.5,
    //     onComplete: function() {
    //         document.querySelector(".section").classList.add("section-contact");
    //     }
    // });
</script>

<script src="js/navbar.js"></script>
<script src="js/toggle.js"></script>
</body>
</html>
