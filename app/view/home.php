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
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
          This is a wider card with supporting text below as a natural lead-in to
          additional content. This content is a little bit longer.
        </p>
        <p class="card-text">
          <small class="text-muted">Last updated 3 mins ago</small>
        </p>
        <button type="button" class="btn btn-outline-warning btn-rounded">See more</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'WIKI__TO\app\public\layout.php'; ?>


