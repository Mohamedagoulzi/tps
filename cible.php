<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (
        isset($_POST["FirstName"]) &&
        isset($_POST["LastName"]) &&
        isset($_POST["Email"]) &&
        isset($_POST["Telephone"]) &&
        isset($_POST["birthdate"])
    )
    {
        echo "<h1>Hello Mr <span style='color: blue;'>".$_POST["LastName"]." ".$_POST["FirstName"]."</span></h1>";
        echo "
        <table style='border: 1px solid; border-collapse: collapse;'>
        <thead>
            <tr>
                <th style='border: 1px solid;'>Email</th>
                <th style='border: 1px solid;'>Date de naissance</th>
                <th style='border: 1px solid;'>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style='border: 1px solid;'>".$_POST["Email"]."</td>
                <td style='border: 1px solid;'>".$_POST["birthdate"]."</td>
                <td style='border: 1px solid;'>".$_POST["Telephone"]."</td>
            </tr>
        </tbody>
        </table>";
    }
    else {
        echo "❌ ERROR: Tous les champs ne sont pas remplis.";
    }
}
else {
    echo "❌ ERROR: Requête invalide.";
}
?>
