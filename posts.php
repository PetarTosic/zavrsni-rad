<?php
    include("db.php");
    $sql = "SELECT a.ime, a.prezime, a.pol, p.* FROM authors a INNER JOIN posts p ON a.id = p.author_id ORDER BY created_at DESC;";
    $statement = $connection->prepare($sql);
    // $statement->bindParam();
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
?>
<?php foreach($posts AS $post) { 
    if($post['pol'] === 'M'){
        $boja = 'rgb(79, 79, 255);';
    }else {
        $boja = 'rgb(255, 131, 152)';
    };
    ?>
    <div class="blog-post">
            <h2 class="blog-post-title"><a href="single-post.php?id=<?php echo $post['id']?>"><?php echo $post['title']; ?></a></h2>
            <p class="blog-post-meta" ><?php echo $post['created_at']; ?> by <a href="#" style="color: <?php echo $boja; ?>"><?php echo $post['ime'] . ' ' . $post['prezime']; ?></a></p>

            <p><?php echo $post['body']; ?></p>
    </div><!-- /.blog-post -->
<?php }?>
