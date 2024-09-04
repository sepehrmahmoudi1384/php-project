<?php
require_once '../../functions/helpers.php';
require_once '../../functions/check-login.php';
require_once '../../functions/pdo_connection.php';

global $connection;

if (!isset($_GET['post_id'])) {
    redirect('panel/post');
}


// check if post_id exists
$query = "SELECT * FROM `php_project`.`posts` WHERE `id` = ?";
$statement = $connection->prepare($query);
$statement->execute([$_GET['post_id']]);
$post = $statement->fetch();
if ($post === false) {
    redirect('panel/post');
}

if (
    !empty($_POST['title'])
    &&
    !empty($_POST['cat_id'])
    &&
    !empty($_POST['body'])
) {

    $query = "SELECT * FROM `php_project`.`categories` WHERE `id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$_POST['cat_id']]);
    $category = $statement->fetch();

    $image = '';
    $fileUpload = false;
    if (!empty($_FILES['image']['name'])) {

        global $image, $fileUpload;

        $allowedMimes = ['png', 'jpeg', 'jpg', 'gif'];
        $imageMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (!in_array($imageMime, $allowedMimes)) {
            redirect('panel/post');
        }

        $basePath = dirname(__DIR__, 2);

        if (file_exists($basePath . trim($post->image, '/ '))) {
            unlink($basePath . trim($post->image, '/ '));
        }

        $image = '/' .
            trim('/assets/images/posts/', '/ ') .
            '/' .
            date('Y_m_d_H_m_i_s') .
            '.' .
            $imageMime;

        $fileUpload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);

        if ($fileUpload !== false && $category !== false) {
            $query = "UPDATE `php_project`.`posts` SET 
                     `title` = ?,
                     `body` = ?, 
                     `cat_id` = ?, 
                     `image` = ?, 
                     `updated_at` = NOW()
                     WHERE `id` = ?";
            $statement = $connection->prepare($query);
            $statement->execute([$_POST['title'], $_POST['body'], $_POST['cat_id'], $image, $_GET['post_id']]);
        }
    } else {
        if ($category !== false) {
            $query = "UPDATE `php_project`.`posts` SET 
                     `title` = ?,
                     `body` = ?, 
                     `cat_id` = ?, 
                     `updated_at` = NOW()
                     WHERE `id` = ?";
            $statement = $connection->prepare($query);
            $statement->execute([$_POST['title'], $_POST['body'], $_POST['cat_id'], $_GET['post_id']]);
        }
    }

    redirect('panel/post');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css'); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css'); ?>" media="all" type="text/css">
</head>

<body>
<section id="app">

    <?php require_once '../layouts/top-nav.php'; ?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?php require_once '../layouts/sidebar.php'; ?>
            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/post/edit.php?post_id=' . $_GET['post_id']); ?>" method="post"
                      enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= $post->title; ?>">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                            <?php
                            $query = "SELECT * FROM `php_project`.`categories`";
                            $statement = $connection->prepare($query);
                            $statement->execute();
                            $categories = $statement->fetchAll();
                            foreach ($categories as $category) { ?>

                                <option value="<?= $category->id; ?>" <?php if ($category->id == $post->cat_id) echo 'selected' ?>>
                                    <?= $category->name; ?>
                                </option>

                            <?php } ?>
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5"><?= $post->body; ?></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </section>
                </form>

            </section>
        </section>
    </section>

</section>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>