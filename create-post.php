<?php
    include("db.php");

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];
        if(empty($title) || empty($body)) {
            echo "Neki podaci nedostaju";
        } else {
            $date_time = date('Y-m-d');
            $sql = "INSERT INTO posts(title, body, created_at, author_id) 
            VALUES('$title', '$body', '$date_time', '$author')";
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

    <title>Create post</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

<?php include('header.php'); ?> 

<main role="main" class="container">
    <?php 
        $sql2 = "SELECT * FROM authors";
        $statement = $connection->prepare($sql2);
        // $statement->bindParam();
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $authors = $statement->fetchAll();
    ?>

    <div class="row">

        <div class="col-sm-8 blog-main">
            <form action="create-post.php" method="post">
            <ul class="form-style-1">
                <li class="list">Title: <input type="title" name="title"></li>
                <li class="list">Body: <textarea name="body" rows="4" cols="18"></textarea>
                <select name="author">
                <?php foreach($authors as $author) { 
                        if($author['pol'] === 'M'){
                            $boja = 'rgb(79, 79, 255)';
                        }else {
                            $boja = 'rgb(255, 131, 152)';
                        };
                        
                        echo '<option value="' . $author["id"] . '" style="color: ' . $boja . '" >' .           
                        $author["ime"] . ' ' . $author["prezime"] . '</option>';
                        }
                ?>
                </select>
                <li class="list"><input type="submit" name="submit" class="submit" value="Create post"></li>
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
