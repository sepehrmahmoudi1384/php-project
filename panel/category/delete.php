<?php
require_once '../../functions/helpers.php';
require_once '../../functions/check-login.php';
require_once '../../functions/pdo_connection.php';
if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
    global $connection;
    $query = "DELETE FROM `php_project`.`categories` WHERE `id`=?";
    $statement = $connection->prepare($query);
    $statement->execute([$_GET['cat_id']]);
}
redirect('panel/category');