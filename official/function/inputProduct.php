 <?php
require_once '../database/config.php';

if (isset($_POST['name']) && isset($_POST['category']) && isset($_POST['description'])&& isset($_POST['price']) && isset($_FILES["fileToUpload"]["name"])) {

    // receiving the post params
    $name = $_POST['name'];
    $category = $_POST['category'];
    $desc = $_POST['description'];
    $description = strip_tags($desc);
    $price = $_POST['price'];
    if (isset($_POST['checkbox'])) {
        $status = $_POST['checkbox'];
    }else{
        $status = '0';
    }

    //image properties
    $target_dir = "../img/products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // check if product exists
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $message = "File is not an image";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file alerady exists";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 3000000) {
        $message = "Sorry, your file is too large";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../dashboard.php';</script>";
    // if everything is ok, try to upload file
    } else {
         $sql = "INSERT INTO product (name, id_category, description, created_at, price, status) VALUES ('$name','$category','$description',NOW(),'$price','$status')";
        if (mysqli_query($connect, $sql)) {
            $code = mysqli_insert_id($connect);
            $placed_file = $target_dir . $code . ".jpg";

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $placed_file)) {
                header('location:../dashboard.php');
            } else {
                $message = "Sorry, there was an error uploading your file";
                echo "<script type='text/javascript'>alert('$message');window.location.href='../dashboard.php';</script>";
            }
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($connect);
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
} else {
    $message = "no parameter inputted";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../dashboard.php';</script>";
}
?>