<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include ('templates/header.php'); // include header file for all pages ?>

<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'certificates') {
        include('certificates.php');
    } elseif ($_GET['page'] == 'store') {
        include('store.php');
    } elseif ($_GET['page'] == 'home') {
        include('home.php');
    }
} else {
    include('home.php'); // default page would be home page
}
?>
<?php include ('templates/footer.php'); // include footer file for all pages ?> 
