<?php
session_abort();
session_start();

if (!isset($_SESSION['user'])) {
    redirect('auth/login.php');
}
