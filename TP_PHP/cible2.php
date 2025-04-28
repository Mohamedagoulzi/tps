<?php
$server = "localhost";
$user = "root";
$password = "zago1234";
$database = "form";

// Create connection 
$connection = new mysqli($server, $user, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Récupérer les données du formulaire
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Telephone = $_POST['Telephone'];
$Birthdate = $_POST['birthdate'];

// Insertion dans la base de données
$sql = "INSERT INTO users (FirstName, LastName, Email, Telephone, Birthdate)
        VALUES ('$FirstName', '$LastName', '$Email', '$Telephone', '$Birthdate')";

$connection->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>

    <h2>Liste des utilisateurs</h2>

    <?php
    // Affichage de la liste des utilisateurs
    $sql2 = "SELECT * FROM users";
    $result = $connection->query($sql2);

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Email</th><th>Telephone</th><th>Birthdate</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["FirstName"] . "</td>";
            echo "<td>" . $row["LastName"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Telephone"] . "</td>";
            echo "<td>" . $row["Birthdate"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucun utilisateur trouvé.</p>";
    }

    $connection->close();
    ?>

</body>
</html>
