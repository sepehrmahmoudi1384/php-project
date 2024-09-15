<?php
require_once '../functions/helpers.php';
require_once '../functions/pdo_connection.php';

$error = '';

if (isset($_POST['submit'])) {

    if (empty($_POST['email']) or !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = 'لطفا ایمیل را به شکل درست وارد کنید';
    } else if (empty($_POST['first_name']) or !preg_match("/[a-zA-Z]+/", $_POST['first_name'])) {
        $error = 'لطفا نام خود را به شکل درست وارد کنید';
    } else if (empty($_POST['last_name']) or !preg_match("/[a-zA-Z]+/", $_POST['last_name'])) {
        $error = 'لطفا نام خانوادگی خود را به شکل درست وارد کنید';
    } else if (empty($_POST['password']) or !preg_match("/[\w#$@]{5,}/", $_POST['password'])) {
        $error = 'لطفا کلمه عبور خود را به شکل درست وارد کنید';
        $error .= '<br>';
        $error .= 'کلمه عبور حداقل باید ۵ کاراکتر باشد';
    } else if (empty($_POST['confirm'])) {
        $error = 'لطفا تاییدیه کلمه عبور خود را وارد کنید';
    } else {

        $first_name = test_input($_POST['first_name']);
        $last_name = test_input($_POST['last_name']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $confirm = test_input($_POST['confirm']);

        global $connection;

        if ($password === $confirm) {

            $query = "SELECT * FROM `php_project`.`users` WHERE `email` = ?";
            $statement = $connection->prepare($query);
            $statement->execute([$email]);
            $user = $statement->fetch();

            if ($user === false) {

                $query = "INSERT INTO `php_project`.`users` SET
                            `email` = ?,
                            `password` = ?,
                            `first_name` = ?,
                            `last_name` = ?,
                            `created_at` = NOW()";

                $statement = $connection->prepare($query);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $statement->execute([
                    $email,
                    $password,
                    $first_name,
                    $last_name
                ]);

                redirect('auth/login.php');
            } else {
                $error = "ایمیل وارد شده تکراری میباشد";
            }
        } else {
            $error = "کلمه ی عبور با تاییدیه کلمه ی عبور مطابقت ندارد";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css'); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css'); ?>" media="all" type="text/css">
</head>

<body>
    <section id="app">

        <section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
            <section style="width: 20rem;">
                <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">PHP Tutorial login</h1>
                <section class="bg-light my-0 px-2">
                    <small class="text-danger">
                        <?php
                        if (!empty($error)) echo trim($error, '<br>');
                        ?>
                    </small>
                </section>
                <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="<?= url('auth/register.php'); ?>"
                    method="post">
                    <section class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
                    </section>

                    <section class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                            placeholder="first_name ...">
                    </section>
                    <section class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name ...">
                    </section>
                    <section class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="password ...">
                    </section>
                    <section class="form-group">
                        <label for="confirm">Confirm</label>
                        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="confirm ...">
                    </section>
                    <section class="mt-4 mb-2 d-flex justify-content-between">
                        <input type="submit" name="submit" class="btn btn-success btn-sm" value="register">
                        <a class="" href="<?= url('auth/login.php'); ?>">login</a>
                    </section>
                </form>
            </section>
        </section>

    </section>
    <script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>
