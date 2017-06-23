<?php
    include "database/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Effendi Store</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">Effendi Store</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Halaman Utama</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="catalogue.php">Katalog</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="row bg-light-gray">
            <div class="col-md-2 col-xs-2">
                <nav class="col-xs-12" id="myScrollspy">
                    <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205" style="margin-top: 150px;">
                        <li style="margin-bottom: 10px">Kategori</li>
                        <?php
                            // jalankan query
                            $result = mysqli_query($connect, "SELECT * FROM category ORDER BY id");
                             
                            // tampilkan query
                            while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                echo "<li><a href='#section1'>".$row['name']."</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-xs-10">
                <div class="catalogue">
                    <div class="row" style="margin-top: 50px;">
                        <center><h2>Our Products</h2></center>

                        <?php
                            // jalankan query
                            $result = mysqli_query($connect, "SELECT * FROM product ORDER BY id");
                             
                            // tampilkan query
                            while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                echo "<div class='col-md-4 col-xs-6 portfolio-item'>
                                        <a href='detail.php?code=".$row['code']."' class='portfolio-link'>
                                            <div class='portfolio-hover'>
                                                <div class='portfolio-hover-content'>
                                                    <h4>Details</h4>
                                                </div>
                                            </div>
                                            <img src='img/products/".$row['image']."' class='img-responsive catalogue' alt=''>
                                        </a>
                                        <div class='portfolio-caption'>
                                            <h4>".$row['name']."</h4>";
                                            $result2 = mysqli_query($connect, "SELECT * FROM category WHERE id = ".$row['id_category']);
                                            while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                                echo "<p class='text-muted'>".$row2['name']."</p>";
                                            }
                                        echo"<p><i class='glyphicon glyphicon-tag'> Rp.".$row['price']."</i></p>
                                        </div>
                                    </div>";
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-offset-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <span class="copyright">Copyright &copy; Effendi Store 2017</span>
            </div>
        </div>
    </footer>

   

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

</body>

</html>
