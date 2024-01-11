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


<div class="container mt-5">
<?php if (!empty($wikis)) : ?>
<div class="card mb-3">
<?php foreach ($wikis as $wiki):  ?>
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
          <a href="index.php?action=wiki&id=<?php echo $wiki->getId(); ?>">
                                    <?php echo $wiki->getTitle(); ?>
                                </a>
        </h5>
        <p class="card-text">
        <?php $content = $wiki->getContent();
echo substr($content, 0, 50); 
 if (strlen($content) > 100) {echo '...';}?>
        </p>
        <p class="card-text">
          <small class="text-muted">Last updated 3 mins ago</small>
        </p>
        <?php endforeach; ?>
        <button type="button" class="btn btn-outline-warning btn-rounded">See more</button>
      </div>
    </div>
  </div>
  <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        No wikis found.
                    </div>
                    <?php endif; ?>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'app\view\layout\layout.php'; ?>


