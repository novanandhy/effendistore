 <?php
require_once '../database/config.php';

if (isset($_GET['id']) ) {

    // receiving the post params
    $id = $_GET['id'];
    
    $sql = "DELETE FROM category WHERE id=$id";

    if (mysqli_query($connect, $sql)) {
        header('location:../category.php');
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($connect);
        echo "<script type='text/javascript'>alert('$message');window.location.href='../category.php';</script>";
    }
} 
else {
    $message = "no parameter inputted";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../category.php';</script>";
}
?>