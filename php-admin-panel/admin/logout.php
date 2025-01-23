<?php 
require '../config/function.php';

//istifadeci login olanda $_SESSION['auth'] deyerini 'true' edirik
if (isset($_SESSION['auth'])) {
    logoutSession();
    redirect('../login.php','Logged Out Successfully!');
}

?>