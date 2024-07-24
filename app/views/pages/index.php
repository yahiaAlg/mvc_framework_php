<?php require_once APP_ROOT."/views/inc/header.php" ?>
<h1>Home page</h1>
<!-- list-group of all posts passed from the Pages controller -->
<?php foreach($posts as $post): ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $post->title; ?></h5>
            <p class="card-text"><?php echo $post->content; ?></p>
            <a href="<?php echo URL_ROOT; ?>pages/show/<?php echo $post->id?>" class="btn btn-primary">Read more</a>
        </div>
    </div>
<?php endforeach; ?>

<?php require_once APP_ROOT."/views/inc/footer.php" ?>