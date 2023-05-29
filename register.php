
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://spants.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/register.css">
    <title>Contact</title>
    <style>
      
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
        session_start();
        if (isset($_SESSION["email"])) {
            // L'utilisateur est connecté
            echo '<a href="logout.php">LOGOUT</a>';
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

     

      <?php
  $mysqli = new mysqli("localhost", "root", "root", "institut");

  // Connexion à la base de données


  // Vérification de la connexion
  if ($mysqli->connect_error) {
      die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
  }

   // Vérification de la connexion
if ($mysqli->connect_error) {
  die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupération des données du formulaire
  $email = $_POST["email"];
  $nom = $_POST["nom"];
  $password = $_POST["password"];
  $tel = $_POST["tel"];

  // Vérification de la complexité du mot de passe
  $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,\/])[A-Za-z\d@$!%*?&.,\/]{8,30}$/';
  if (!preg_match($pattern, $password)) {
      echo "Le mot de passe doit comporter au moins 8 caractères, inclure une majuscule, une minuscule, un chiffre et un caractère spécial.";
      exit; // Arrêter l'exécution du script si le mot de passe ne respecte pas les critères
  }

  // Hachage et cryptage du mot de passe
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Préparation de la requête d'insertion
  $sql = "INSERT INTO user (email, nom, password, tel) VALUES ('$email', '$nom', '$hashedPassword', '$tel')";

  // Exécution de la requête
  if ($mysqli->query($sql) === true) {
      echo "Inscription réussie !";
  } else {
      echo "Erreur lors de l'inscription : " . $mysqli->error;
  }
}

// Fermeture de la connexion à la base de données
$mysqli->close();
?>


      <div class=" c" style="margin-top: 200px;margin-bottom: 200px;">
        <h1 class="h">Inscription - Institut Lara.</h1>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="tel">Téléphone :</label>
                <input type="tel" name="tel" required>
            </div>
        
            <input type="submit" value="S'inscrire">
        </form>
    </div>



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

    <script src="js/toggle.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>

  