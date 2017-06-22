 <?php
require_once '../../database/config.php';

if (isset($_POST['name']) && isset($_POST['category']) && isset($_POST['description'])&& isset($_POST['price'])&& isset($_POST['code'])&& isset($_FILES["fileToUpload"]["name"])) {

    // receiving the post params
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $code = $_POST['code'];

    //image properties
    $target_dir = "../../img/products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $placed_file = $target_dir . $code . "." . $imageFileType;
    $image = $code . "." . $imageFileType;

    // check if product exists
    $result = $connect->query("SELECT code FROM product WHERE name = '$code'");
    if($result->num_rows == 0) {
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
        if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $placed_file)) {
                 $sql = "INSERT INTO product (name, id_category, description, updated_at, price, code, image) VALUES ('$name','$category','$description',NOW(),'$price','$code','$image')";
                if (mysqli_query($connect, $sql)) {
                    header('location:../dashboard.php');
                } else {
                    $message = "Error: " . $sql . "<br>" . mysqli_error($connect);
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            } else {
                $message = "Sorry, there was an error uploading your file";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    } else {
        $message = "Code has already exist";
        echo "<script type='text/javascript'>alert('$message');window.location.href='../dashboard.php';</script>";
    }

} else {
    $message = "no parameter inputted";
    echo "<script type='text/javascript'>alert('$message');window.location.href='../dashboard.php';</script>";
}
?>