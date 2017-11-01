<?php
    include "official/database/config.php";

    $code = $_GET['code'];

     // jalankan query
        $result = mysqli_query($connect, "SELECT * FROM product WHERE id = $code");
         
        // tampilkan query
        while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Effendi Store - detail</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="official/img/icon.ico">

    <!-- Theme CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- include file html -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

      <!-- include file navbar html -->
   <div w3-include-html="navbar-second.html"></div>

    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-6">
                <?php echo "<img src='official/img/products/".$row['id'].".jpg' class='img-responsive' alt=''>"; ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <?php echo "<h4 class='product-name'>".$row['name']."</h4>"; ?>
                </div>
                <div class="row">
                    <?php 
                        if ($row['status'] == '1') {
                            echo "<span class='badge' style='color:#fff;background-color:#28a745'>Tersedia</span>";
                        }else{
                            echo "<span class='badge' style='color:#fff;background-color:#dc3545'>Kosong</span>";
                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-5">
                        <?php echo "<p class='price'>Rp.".$row['price']."</p>"; ?>
                    </div>
                    <div class="col-md-6 col-xs-7">
                        <?php 
                            $result2 = mysqli_query($connect, "SELECT * FROM category WHERE id = ".$row['id_category']);
                            while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                echo "<p class='text-muted' style='margin-top:3px;'>".$row2['name']."</p>";
                            }?>
                    </div>
                    
                </div>
                <div class="row">
                    <h5 style="margin-top:25px;">Deskripsi Produk</h5>
                    <?php $string = nl2br($row['description']);
                        echo "<p>".$string."</p>";
                    }?>
                </div>
            </div>
        </div>
    </div>

     <!-- include file footr html -->
    <div w3-include-html="footer.html"></div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

    <script>
        w3.includeHTML();
    </script>

</body>

</html>
