
<?php include "logout.php"; ?>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/plugins/SplitText.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/sec1h.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/steam.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
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
        <a href="contact.php">CONTACT</a>
    
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

  <section class="section ">
    
    <div class=" container sec1">
      <div class=" " style="margin-top: 300px">
        <h1 class="fade t1">titre1</h1>
        <p class="fa">Lorem ipsum dolor sit amet consectetur elit.</p>
        <button class="fad button-styled">Voir plus</button>
      </div>
      
      <!-- <div class="steam">
        <div class="steam-show"></div>
      </div> -->

    </div>

  </section>




    <section style="margin-top: 100px;">
      <div class="card-section">
        <div class="card">
          <div class="card-front">
            <img src="img/AdobeStock_180837298.jpeg" alt="Image 1">
          </div>
          <div class="card-back">
            <h3>Titre 1</h3>
            <p>Texte de la carte 1.</p>
          </div>
        </div>
        <div class="card">
          <a href="sauna.php">
            <div class="card-front">
              <img src="img/vap.jpeg" alt="Image 2">
            </div>
            <div class="card-back">
              <h3>Titre 2</h3>
              <p>Texte de la carte 2.</p>
            </div>
          </a>
        </div>
        <div class="card">
          <div class="card-front">
            <img src="img/spa-gbf278b3ca_1280.jpg" alt="Image 3">
          </div>
          <div class="card-back">
            <h3>Titre 3</h3>
            <p>Texte de la carte 3.</p>
          </div>
        </div>
      </div>
    </section>
      



      
      <section class="container">
        <div class="step">
          <div class="front">
            <div class="step-number">1</div>
            <div class="step-description">
              Découvrez notre gamme de produits innovants pour une peau sans imperfections.
            </div>
          </div>
          <div class="back">
            <div class="step-title">Titre au dos</div>
           
          </div>
        </div>
      
        <div class="step">
          <div class="front">
            <div class="step-number">2</div>
            <div class="step-description">
              Découvrez notre gamme de produits innovants pour une peau sans imperfections.
            </div>
          </div>
          <div class="back">
            <div class="step-title">Titre au dos</div>
           
          </div>
        </div>
      
        <div class="step">
          <div class="front">
            <div class="step-number">3</div>
            <div class="step-description">
              Découvrez notre gamme de produits innovants pour une peau sans imperfections.
            </div>
          </div>
          <div class="back">
            <div class="step-title">Titre au dos</div>
           
          </div>
        </div>
      </section>
      

    
      


        
      <style>
 
        </style>
        
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
                  <li><a class="footer-link" href="index.php">Accueil</a></li>
                  <li><a class="footer-link" href="#">Produits</a></li>
                  <li><a class="footer-link" href="#">Services</a></li>
                  <li><a class="footer-link" href="#">À propos</a></li>
                  <li><a class="footer-link" href="contact.php">Contact</a></li>
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

<!-- <script src="js/script.js"></script> -->
<script src="js/navbar.js"></script>
<script src="js/sec1h.js"></script>
<script src="js/scroll.js"></script>
<script src="js/toggle.js"></script>

</body>
</html>