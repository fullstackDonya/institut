
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<?php include "logout.php"; ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/formLog.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Connexion</title>
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


    <h1>Connexion</h1>
    <form method="POST" action="login.php">
        <label for="email">Email :</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>

        <input type="submit" value="Se connecter">
    </form>
    <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Vérifier les informations d'identification dans votre base de données
    // (vérification de l'email et du mot de passe)

    // Exemple de vérification avec une connexion à une base de données MySQL


    // Connexion à la base de données
    $mysqli = new mysqli("localhost", "root", "root", "institut");

    if ($mysqli->connect_error) {
        die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
    }

    // Préparer la requête pour récupérer l'utilisateur avec l'email donné
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Utilisateur trouvé, vérifier le mot de passe
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            // Authentification réussie
            $_SESSION["email"] = $email;
            header("Location: index.php"); // Rediriger vers une page de tableau de bord sécurisée
            exit();
        }
    }

    // Authentification échouée
    $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
    echo $errorMessage;

    // Fermer la connexion à la base de données
    $stmt->close();
    $mysqli->close();
}
?>
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

    <script src="js/navbar.js"></script>
    <script src="js/toggle.js"></script>
</body>
</html>
