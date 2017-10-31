<?php
    include "database/config.php";
    session_start();
    if(empty($_SESSION['username'])){
      header('location:index.html');
    }

    if (isset($_GET['key'])) {
        $key = $_GET['key'];
        $show = mysqli_query($connect, "SELECT * FROM product WHERE id = $key");
    }else{
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
    <title>Admin - Edit Product</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/compiled.min.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="img/iconadmin.ico">

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
                <p>Edit Product</p>
            </div>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
    <!--Main layout-->
    <main>
    <?php 
        while ($row=mysqli_fetch_array($show,MYSQLI_ASSOC)){ ?>
        <div class="container-fluid">
            <!-- Input Products -->
            <form action="function/editProduct.php" method="post" enctype="multipart/form-data">
                <!--Body-->
                <div class="modal-body">
                    
                    <!--Body-->
                    <div class="md-form">
                        <i class="fa fa-shopping-cart prefix" aria-hidden="true"></i>
                        <input type="text" name="name" value="<?php echo $row['name'] ?>" id="form3" class="form-control">
                        <label for="form3">Name</label>
                    </div>

                    <input type="hidden" name="code" value="<?php echo $row['id'] ?>" id="form3" class="form-control">

                    <div class="md-form">
                        <i class="fa fa-bars prefix" aria-hidden="true"></i>
                        <select class="mdb-select select-width" name="category" value="<?php echo $row['id_category']?>">
                             <option value="" disabled selected>Choose category</option>

                             <!-- menampilkan kategori -->
                            <?php
                                // jalankan query
                                $result = mysqli_query($connect, "SELECT * FROM category order by ID");
                                 
                                // tampilkan query
                                while ($row2=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                    if($row2['id'] == $row['id_category']){
                                        echo "<option selected='selected' value=".$row2['id'].">".$row2['name']."</option>";
                                    }else{
                                        echo "<option value=".$row2['id'].">".$row2['name']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-pencil prefix"></i>
                        <textarea id="input_text" name="description" class="md-textarea" type="text"><?php echo $row['description']?></textarea>
                        <label for="input_text">Input text</label>
                    </div>

                    <div class="md-form">
                    <i class="fa fa-money prefix" aria-hidden="true"></i>
                        <input type="number" min="0" name="price" value="<?php echo $row['price']?>" id="form31" class="form-control">
                        <label for="form31">Price</label>
                    </div>

                    <div class="form-group">
                        <?php 
                            if ($row['status']=='1') {
                                ?><input type="checkbox" id="checkbox" name="checkbox" value="1" checked><?php
                            }else{
                                ?><input type="checkbox" id="checkbox" name="checkbox" value="1"><?php
                            }
                        ?>
                        <label for="checkbox">Stock Available</label>
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
                </div>
            </form>
        </div>
        <?php } ?>
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
    
</body>

</html>
