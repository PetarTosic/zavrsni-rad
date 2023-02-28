<?php    
    $sql2 = "SELECT a.ime, a.prezime, a.pol, c.* FROM authors a INNER JOIN comments c ON a.id = c.author_id WHERE post_id = $id1";
    $statement = $connection->prepare($sql2);
    // $statement->bindParam();
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
?>
<?php foreach($comments AS $comment) { 
    if($comment['pol'] === 'M'){
            $boja = 'rgb(79, 79, 255)';
        }else {
            $boja = 'rgb(255, 131, 152)';
        };
    ?>
    <li id="komentar">
        <p class="blog-post-meta">Comment by: <a href="#" style="color: <?php echo $boja; ?>"><?php echo $comment['ime'] . ' ' . $comment['prezime']; ?></a></p>
        <p><?php echo $comment['text'] ?></p>
    </li>
<?php } ?>