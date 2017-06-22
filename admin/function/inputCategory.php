 <?php
require_once '../../database/config.php';

if (isset($_POST['name']) && isset($_POST['description']) ) {

    // receiving the post params
    $description = $_POST['description'];
    $category = $_POST['name'];

    // check if value exist
    $result = $connect->query("SELECT name FROM category WHERE name = '$category'");

    if($result->num_rows == 0) {
          $sql = "INSERT INTO category (name, description) VALUES ('$category','$description')";

        if (mysqli_query($connect, $sql)) {
            header('location:../category.php');
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($connect);
            echo "<script type='text/javascript'>alert('$message');window.location.href='../category.php';</script>";
        }
    } else {
        $message = "Category has already exist";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../category.php';</script>";
    }
    $mysqli->close();
    
} 
else {
    $message = "no parameter inputted";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../category.php';</script>";
}
?>