<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emargement";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement de la requête d'enregistrement des participants dans ma b_d
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    // Insertion des données dans la table participants de la b_d emargement
    $sql = "INSERT INTO participants (nom, prenom, telephone, email) VALUES ('$nom', '$prenom', '$telephone', '$email')";

    if ($conn->query($sql) === TRUE) {
        //juste pour eviter l'ouverture d'une autre page pour la confirmation
        $_SESSION['confirmation_suc'] = " ";
      
    } 
}

// Fermer la connexion à la base de données
$conn->close();
header("Location: index.html");
exit();
?>
 
