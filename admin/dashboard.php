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
    <title>Admin - Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled.min.css" rel="stylesheet">

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
                    <li><a href="Category.php" class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Category</a></li>
                    <li><a href="../database/logout.php" sclass="collapsible-header waves-effect arrow-r"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
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
                <p>Dashboard</p>
            </div>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
    <!--Main layout-->
    <main>
        <div class="container-fluid">
            <center><h2>Dashboard</h2></center>
            <div class="row">
                <div class="col-sm-2">
                    <button class="btn btn-default" data-toggle="modal" data-target="#centralModalDanger"><i class="fa fa-plus left"></i> Add Item</button>
                </div>
                <div class="col-sm-4 offset-sm-2">
                    <div class="md-form"">
                        <i class="fa fa-search prefix" aria-hidden="true"></i>
                        <input type="number" min="0" id="myInput" onkeyup="myFunction()" class="form-control">
                        <label for="form9" data-error="wrong" data-success="right">Type product's code</label>
                    </div>
                </div>
            </div>
            <!--Shopping Cart table-->
            <div class="table-responsive">
                <table class="table product-table" id="myTable">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Updated</th>
                            <th></th>
                        </tr>
                    </thead>
                    <!--/Table head-->

                    <!--Table body-->
                    <tbody>

                        <!--First row-->
                        <?php
                            // jalankan query
                            $result = mysqli_query($connect, "SELECT * FROM product order by ID");
                             
                            // tampilkan query
                            while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                echo "<tr>";
                                
                                echo "<th scope='row'>";
                                echo "<img src='../img/products/".$row['image']."' width='180px' class='img-fluid'>";
                                echo "</th>";
                                
                                echo "<td>";
                                echo "<h5><strong>".$row['name']."</strong></h5>";
                                $result2 = mysqli_query($connect, "SELECT * FROM category WHERE id = ".$row['id_category']);
                                while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
                                    echo "<p class='text-muted'>".$row2['name']."</p>";
                                }
                                echo "</td>";

                                echo "<td id='code'>".$row['code']."</td>";

                                // strip tags to avoid breaking any html
                                $string = strip_tags($row['description']);

                                // check if string length more than 300 words
                                if (strlen($string) > 300) {

                                    // truncate string
                                    $stringCut = substr($string, 0, 100);
                                    $stringMore = substr($string, 101, strlen($string));

                                    echo "<td>";
                                    echo "<span class='teaser'>".$stringCut."</span>";
                                    echo "<span class='complete'>".$stringMore."</span>";
                                    echo "<span class='more'>read more...</span>";
                                    echo "</td>";
                                }else{
                                    echo "<td>".$string."</td>";
                                }

                                echo "<td>".$row['updated_at']."</td>";;

                                echo "<td>";
                                echo "<a  data-toggle='modal' class='icons-sm gplus-ic btn-flat remove' data-target='#centralModalSm' data-productid='".$row['code']."'><i class='fa fa-remove' aria-hidden='true'></i></a>";
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
                            <p class="heading lead white-text">Add New Item</p>
                        </div>

                        <!-- Input Products -->
                        <form action="function/inputProduct.php" method="post" enctype="multipart/form-data">
                            <!--Body-->
                            <div class="modal-body">
                                
                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-shopping-cart prefix" aria-hidden="true"></i>
                                    <input type="text" name="name" id="form3" class="form-control">
                                    <label for="form3">Name</label>
                                </div>

                                <div class="md-form"><i class="fa fa-barcode prefix" aria-hidden="true"></i>
                                    <input type="number" min="0" name="code" id="form3" class="form-control">
                                    <label for="form3">Code</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-bars prefix" aria-hidden="true"></i>
                                    <select class="mdb-select select-width" name="category">
                                         <option value="" disabled selected>Choose category</option>

                                         <!-- menampilkan kategori -->
                                        <?php
                                            // jalankan query
                                            $result = mysqli_query($connect, "SELECT * FROM category order by ID");
                                             
                                            // tampilkan query
                                            while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                               echo "<option value=".$row['id'].">".$row['name']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-pencil prefix"></i>
                                    <textarea id="input_text" name="description" class="md-textarea" type="text"></textarea>
                                    <label for="input_text">Input text</label>
                                </div>

                                <div class="md-form">
                                <i class="fa fa-money prefix" aria-hidden="true"></i>
                                    <input type="number" min="0" name="price" id="form31" class="form-control">
                                    <label for="form31">Price</label>
                                </div>

                                <div class="md-form">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm">
                                            <span>Choose file</span>
                                            <input type="file" name="fileToUpload">
                                        </div>
                                        <div class="file-path-wrapper">
                                           <input class="file-path validate" type="text" placeholder="Upload your file">
                                        </div>
                                    </div>
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
                            <p>Are you sure delete this products ?</p>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">

                            <!-- alamat href ada di javascript -->
                           <a type="submit" href="" id="code" class="icons-sm slack-ic btn-flat"><i class="fa fa-check" aria-hidden="true"></i></a>
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
    <script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/compiled.min.js"></script>
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

    <!-- delete product by code -->
    <script type="text/javascript">
        $(document).on("click", ".remove", function () {
             var code = $(this).data('productid');
             var link = document.getElementById('code');
             link.href = "function/deleteProduct.php?code="+code;
        });
    </script>

    <!-- filter table by code -->
    <script>
    function myFunction() {
      // Declare variables 
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
    </script>

    <!-- read more javascript -->
    <script type="text/javascript">
        $(".more").toggle(function(){
            $(this).text("less..").siblings(".complete").show();    
        }, function(){
            $(this).text("more..").siblings(".complete").hide();    
        });
    </script>
    
</body>

</html>
