 <?php
require_once '../database/config.php';

if (isset($_GET['code']) ) {

    // receiving the post params
    $code = $_GET['code'];

    $sql = "DELETE FROM product WHERE id=$code";

    if (mysqli_query($connect, $sql)) {
        unlink('../img/products/'.$row['id']."jpg");
        header('location:../dashboard.php');
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($connect);
        echo "<script type='text/javascript'>alert('$message');window.location.href='../dashboard.php';</script>";
    }  
    
} 
else {
    $message = "no parameter inputted";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../dashboard.php';</script>";
}
?>