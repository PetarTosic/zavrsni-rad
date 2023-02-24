<?php 
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacijenti</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("header.php"); 
    $sql = "SELECT * FROM pacijenti";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $pacijenti = $statement->fetchAll();
    ?>

    <?php foreach($pacijenti AS $pacijent) { ?>
        <div class="dok-div">
            <p class="dok-p"><?php echo "Ime pacijenta: " . $pacijent['ime'] . " " . $pacijent['prezime']; ?></p>
            <p class="dok-p"><?php echo "Email: " . $pacijent['email']; ?></p>
        </div>
    <?php } ?>
    
</body>
</html>