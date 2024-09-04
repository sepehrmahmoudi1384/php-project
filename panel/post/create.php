<?php
require_once '../../functions/helpers.php';
require_once '../../functions/check-login.php';
require_once '../../functions/pdo_connection.php';

if (
    !empty($_POST['title'])
    &&
    !empty($_POST['cat_id'])
    &&
    !empty($_POST['body'])
    &&
    !empty($_FILES['image']['name'])
) {

    global $connection;
    $query = "SELECT * FROM `php_project`.`categories` WHERE `id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$_POST['cat_id']]);
    $category = $statement->fetch();

    $allowedMimes = ['png', 'jpeg', 'jpg', 'gif'];
    $imageMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    if (!in_array($imageMime, $allowedMimes)) {
        redirect('panel/post');
    }

    $basePath = dirname(__DIR__, 2);
    $image = '/' .
        trim('/assets/images/posts/', '/ ') .
        '/' .
        date('Y_m_d_H_m_i_s') .
        '.' .
        $imageMime;
    $fileUpload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);

    if ($category !== false && $fileUpload !== false) {
        global $connection;
        $query = "INSERT INTO `php_project`.`posts` SET 
                     `title` = ?,
                     `body` = ?, 
                     `cat_id` = ?, 
                     `image` = ?, 
                     `created_at` = NOW()";
        $statement = $connection->prepare($query);
        $statement->execute([$_POST['title'], $_POST['body'], $_POST['cat_id'], $image]);
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

                <form action="<?= url('panel/post/create.php'); ?>" method="post" enctype="multipart/form-data">
                    <section class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title ...">
                    </section>
                    <section class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </section>
                    <section class="form-group">
                        <label for="cat_id">Category</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                            <?php
                            global $connection;
                            $query = "SELECT * FROM `php_project`.`categories`";
                            $statement = $connection->prepare($query);
                            $statement->execute();
                            $categories = $statement->fetchAll();
                            foreach ($categories as $category) { ?>
                                <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                            <?php } ?>
                        </select>
                    </section>
                    <section class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="5"
                                  placeholder="body ..."></textarea>
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
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