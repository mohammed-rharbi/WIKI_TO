
<?php
$title = "Wiki List";
ob_start();
?>



<div class="col-md-3">
    <!-- Sidebar -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Admin Menu</h5>
            <ul class="list-group">
                <li class="list-group-item"><a href="index.php?action=author" class="text-decoration-none">Dashboard</a></li>
                <li class="list-group-item"><a href="index.php?action=author_wiki_table" class="text-decoration-none">Manage Wiki</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h1>wiki List</h1>

    <div class="row mb-3">
                    <div class="col-md-12 text-right">
                        <a href="index.php?action=addWiki" class="btn btn-success">Add new Wiki</a>
                    </div>
                </div>

        <table class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
    <th>Title</th>
    <th>Content</th>
    <th>Category</th>
    <th>Tags</th>
    <th>Created At</th>
    <th>Is Archived</th>
    <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php if (!empty($wikis)): ?>

                            <?php foreach ($wikis as $wiki): ?>
                                <tr>
                                    <td><?= $wiki->getWikiTitle(); ?></td>
                                    <td>
                                        <?php
                                        $content = $wiki->getWikiContent();
                                        echo substr($content, 0, 50);
                                        if (strlen($content) > 100) {
                                            echo '...';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $wiki->getCategory(); ?></td>
                                    <td>
                                        <?php
                                        $tags = $wiki->getTags();
                                        foreach ($tags as $tag) {
                                            echo $tag->getName() . ', ';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $wiki->getCratedAt(); ?></td>
                                    <td><?= $wiki->getIsArchive(); ?></td>
                                    <td>
                                        <a href="index.php?action=wiki_edit&id=<?= $wiki->getWikiID(); ?>"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="index.php?action=wiki_delete&id=<?= $wiki->getWikiID(); ?>"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
</table>
    <?php else: ?>
        <p class="text-center">No wiki found</p>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app\view\layout\layout.php';
?>



