<?php
$title = "Admin Dashbourd";
ob_start();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <h1 class="display-4 mb-5 text-center"><?= $title ?></h1>
            <div class="row justify-content-center">
                <div class="col-lg-6 mb-4">
                    <a href="index.php?action=routeindex" class="card-link">
                        <div class="card card-custom">
                            <div class="card-body text-center">
                                <h5 class="card-title">tags</h5>
                                <p class="card-text">Manage tags</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="index.php?action=busindex" class="card-link">
                        <div class="card card-custom">
                            <div class="card-body text-center">
                                <h5 class="card-title">category</h5>
                                <p class="card-text">Manage category</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="index.php?action=scheduleindex" class="card-link">
                        <div class="card card-custom">
                            <div class="card-body text-center">
                                <h5 class="card-title">wiki</h5>
                                <p class="card-text">Manage wikis</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="text-center">
                <img src="app/imgs/2343.png_1200-removebg-preview.png" alt="travel" width="500">
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app\view\layout\layout.php'; ?>