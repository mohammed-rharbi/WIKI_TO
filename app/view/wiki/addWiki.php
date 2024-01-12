<?php
$title = "Create Wiki";
ob_start();

?>

<div class="container mt-5">
    <?php echo "<h1>$title</h1>" ?>
    <form action="index.php?action=storeWiki" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" name="wiki_title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control" name="wiki_content" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category:</label>
            <select class="form-control" name="category">
                <?php foreach ($category as $categ): ?>
                    <option value="<?php echo $categ->getCategoryID(); ?>">
                        <?php echo $categ->getName(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags:</label>
            <select class="form-control" name="tags" multiple>
                <?php foreach ($tag as $tags): ?>
                    <option value="<?php echo $tags->getTagID(); ?>">
                        <?php echo $tags->getTagName(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button  type="submit" class="btn btn-primary">Create Wiki</button>
    </form>
</div>

<?php
$content = ob_get_clean();
include_once 'app/view/layout/layout.php';
?>