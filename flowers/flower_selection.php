<!--This saves the information of the flower within a session-->
<?php
session_start();

if (isset($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'])) {
    $_SESSION['selected_flower'] = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price']
    ];
}

header("Location: about.php");
exit;
?>

