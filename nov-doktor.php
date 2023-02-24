<?php include("database.php"); 

    if(isset($_POST['submit'])) {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($ime) || empty($prezime) || empty($email) || empty($password)) {
            echo "Neki podatci nedostaju.";
        } else {
            $sql = "INSERT INTO doktori(ime, prezime, email, password) VALUES ('$ime', '$prezime', '$email', '$password')";
            $statement = $connection->prepare($sql);
            $statement->execute();

            header('Location: ./doktori.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos doktora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("header.php"); ?>
    <form action="nov-doktor.php" method="post">
        <h1>Nov doktor:</h1>
        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime">

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime">

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <input class="dugme" type="submit" name="submit" class="submit">
    </form>
</body>
</html>