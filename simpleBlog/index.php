<?php
    require('config/config.php');
    require('config/db.php');

    $query = 'SELECT * FROM posts';

    $result = mysqli_query($conn, $query);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
    <div class="container mt-3">
        <h1>Posts</h1>
        <hr>
        <?php foreach($posts as $post) : ?>
            <div>
                <h3><?php echo $post['title']; ?></h3>
                <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary">Read More</a>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
<?php include('inc/footer.php'); ?>