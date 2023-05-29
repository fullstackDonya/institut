<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <label for="tel">Téléphone :</label>
        <input type="tel" name="tel" required><br>

        <input type="submit" value="S'inscrire">
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "institut";

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $database);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Vérification si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $email = $_POST["email"];
        $nom = $_POST["nom"];
        $password = $_POST["password"];
        $tel = $_POST["tel"];

        // Hachage et cryptage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO utilisateurs (email, nom, password, tel) VALUES ('$email', '$nom', '$hashedPassword', '$tel')";

        // Exécution de la requête
        if ($conn->query($sql) === true) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
        }
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>
</body>
</html>
