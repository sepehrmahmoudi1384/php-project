<?php
require_once '../../functions/helpers.php';
require_once '../../functions/check-login.php';
require_once '../../functions/pdo_connection.php';

if (!empty($_GET['post_id'])) {

    global $connection;
    $query = "SELECT * FROM `php_project`.`posts` WHERE `id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch();
    $basePath = dirname(__DIR__, 2);

    if (file_exists($basePath . '/' . trim($post->image, '/ '))) {
        unlink($basePath . '/' . trim($post->image, '/ '));
    }

    $query = "DELETE FROM `php_project`.`posts` WHERE `id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$_GET['post_id']]);

}

redirect('panel/post');

