<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Stockage dans un fichier ou une base de données
    $file = fopen('users.txt', 'a');
    fwrite($file, "$username,$password\n");
    fclose($file);

    echo "Inscription réussie!";
    header('Location: index.html#login'); // Redirection vers la page de connexion
}
?>
