<?php
    include("db.php");

    if(isset($_POST['submit'])) {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $pol = $_POST['pol'];
        if(empty($ime) || empty($prezime) || empty($pol)) {
            echo "Neki podaci nedostaju";
        } else {
            $sql = "INSERT INTO authors(ime, prezime, pol) 
            VALUES('$ime', '$prezime', '$pol')";
            $statement = $connection->prepare($sql);
            $statement->execute();

            header('Location: ./index.php');
        }
    }
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>
<?php $active3 = 'active'; ?>
<?php include('header.php'); ?> 

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            <form action="create-author.php" method="post">
            <ul class="form-style-1">
                <li class="list">Ime: <input type="ime" name="ime"></li>
                <li class="list">Prezime: <input type="prezime" name="prezime"></li>
                <li class="list">Pol: <br><input type="radio" name="pol" id="pol" value="M">M
                <input type="radio" name="pol" id="pol" value="F">F</li>
                <li class="list"><input type="submit" name="submit" class="submit" value="Create author"></li>
            </ul>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php include('sidebar.php'); ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php'); ?>

</body>
</html>
