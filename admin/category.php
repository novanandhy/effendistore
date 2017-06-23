<?php
    include "../database/config.php";
    session_start();
    if(empty($_SESSION['username'])){
      header('location:index.html');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin - Category</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/compiled.min.css" rel="stylesheet">

    <!-- Style theme -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fixed-sn mdb-skin">
    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light">
                    <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a href="dashboard.php" class="collapsible-header waves-effect arrow-r"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                    <li><a href="category.php" class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Category</a></li>
                    <li><a href="../database/logout.php" class="collapsible-header waves-effect arrow-r"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                </ul>
            </li>
            <!--/. Side navigation links -->
            <div class="sidenav-bg mask-strong"></div>
        </ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar navbar-toggleable-md navbar-dark double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-xs-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Category</p>
            </div>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
    <!--Main layout-->
    <main>
        <div class="container-fluid">
            <center><h2>Category</h2></center>
            <button class="btn btn-default" data-toggle="modal" data-target="#centralModalDanger"><i class="fa fa-plus left"></i> Add Category</button>
            <!--Shopping Cart table-->
            <div class="table-responsive">
                <table class="table product-table">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <!--/Table head-->

                    <!--Table body-->
                    <tbody>

                        <!--First row-->
                        <?php
                                // jalankan query
                            $result = mysqli_query($connect, "SELECT * FROM category order by ID");
                             
                            // tampilkan query
                            while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                echo "<tr>";
                                echo "<td>";
                                echo "<h5><strong>".$row['name']."</strong></h5>";
                                echo "</td>";
                                echo "<td>".$row['description']."</td>";
                                echo "<td>";
                                echo "<a href='function/deleteCategory.php?id=".$row['id']."' class='icons-sm gplus-ic btn-flat' ><i class='fa fa-remove' aria-hidden='true'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                        <!--/First row-->
                    </tbody>
                    <!--/Table body-->
                </table>
            </div>
            <!--/Shopping Cart table-->


            <!-- Modal -->     
            <!-- Right Modal Medium Danger -->
            <div class="modal fade right" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-full-height modal-right" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header" style="background-color: #293a48">
                            <p class="heading lead white-text">Add New Category</p>
                        </div>

                        <!-- Input Products -->
                        <form action="function/inputCategory.php" method="post" enctype="multipart/form-data">
                            <!--Body-->
                            <div class="modal-body">
                                
                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-bars prefix" aria-hidden="true"></i>
                                    <input type="text" name="name" id="form3" class="form-control">
                                    <label for="form3">Category</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-pencil prefix"></i>
                                    <textarea id="input_text" name="description" class="md-textarea" type="text"></textarea>
                                    <label for="input_text">Description</label>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                               <button type="submit" class="btn btn-outline-success waves-effect"><i class="fa fa-check" aria-hidden="true"></i></button>
                               <button  class="btn btn-outline-danger waves-effect" data-dismiss="modal"><i class="fa fa-remove" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                    <!--/.Content-->
                </div>
            </div>
        <!-- Right Modal Large-->


        <!-- Modal -->         
        <!-- Central Modal Small -->
            <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Body-->
                        <div class="modal-body">
                            <p>Are you sure delete this category ?</p>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                           <button class="icons-sm slack-ic btn-flat"><i class="fa fa-check" aria-hidden="true"></i></button>
                           <button class="icons-sm gplus-ic btn-flat" data-dismiss="modal"><i class="fa fa-remove" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
        <!-- Right Modal Large-->                                   

        </div>
    </main>
    <!--/Main layout-->
    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/compiled.min.js"></script>
    <script>
    $(".button-collapse").sideNav();
        
    var el = document.querySelector('.custom-scrollbar');
        Ps.initialize(el);
    </script>
    <script type="text/javascript">
        // Material Select Initialization
         $(document).ready(function() {
            $('.mdb-select').material_select();
          });
    </script>
    <script type="text/javascript">
        
    $('.chips-initial').material_chip({
         placeholder: 'Enter a tag',
        secondaryPlaceholder: 'enter a Tag',
      });

    var chip = {
        tag: 'chip content',
        image: '', //optional
        id: 1, //optional
    };


    </script>
</body>

</html>
