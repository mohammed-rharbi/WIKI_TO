<?php
$title = "Home";
ob_start();
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h1>Welcome to Our Wiki</h1>
            <p class="lead">
                Explore a world of knowledge. Our wiki is here to provide you with comprehensive information on various topics.
            </p>
            <form class="mt-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container py-5">
                <h2>Latest Tags</h2>
                <div class="card-deck">
                    <?php foreach ($gettag as $tag): ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="index.php?action=tag&id=<?php echo $tag->getTagID(); ?>">
                                    <span>
                                        <?php echo $tag->getTagName(); ?>
                                    </span>
                                </a>
                            </h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <?php if (!empty($getCateg)): ?>
                <ul class="list-inline">
                <?php foreach ($getCateg as $categ): ?>
                  <a href="index.php?action=tag&id=<?php echo $categ->getCategoryID(); ?>">
                  <span><?php echo $categ->getName(); ?></span>
                        <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No tags available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>



<?php if (!empty( $getwiki)) : ?>

<div class="container mt-5">
<?php foreach ($getwiki as $wiki):  ?>

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp"
        alt="Trendy Pants and Shoes"
        class="img-fluid rounded-start"
      />
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          <a href="index.php?action=wiki&id=<?php echo $wiki->getWikiID(); ?>">
        <?php echo $wiki->getWikiTitle(); ?></a>
        </h5>
        <p class="card-text">
        <?php $content = $wiki->getWikiContent();
          echo substr($content, 0, 50); 
          if (strlen($content) > 100) {echo '...';}?>
        </p>
        <p class="card-text">
          <small class="text-muted">Last updated <?php echo $wiki->getCratedAt(); ?></small>
        </p>
        <button type="button" class="btn btn-outline-warning btn-rounded">See more</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
  <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        No wikis found.
                    </div>
                    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'app\view\layout\layout.php'; ?>


