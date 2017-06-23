
<?php
    session_start();
    if(!empty($_SESSION['username'])){
      header('location:dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/compiled.min.css" rel="stylesheet">

    <!-- Style theme -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fixed-sn mdb-skin">
    
    <main>
        <!--Modal: Login Form-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal" role="document">
                <!--Content-->
                <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header light-blue darken-3 white-text">
                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="title"><i class="fa fa-user"></i> Effendi Store</h4>
                    </div>
                    <form action="../database/login.php" method="POST">
                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form form-sm">
                                <i class="fa fa-user prefix"></i>
                                <input type="text" name="username" id="form30" class="form-control">
                                <label for="form30">Username</label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" name="password" id="form31" class="form-control">
                                <label for="form31">Password</label>
                            </div>

                            <div class="text-center mt-2">
                                <button type="submit" class="btn btn-info">Log in <i class="fa fa-sign-in ml-1"></i></button>
                            </div>

                        </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: Login Form-->                        
    </main>
    <!--/Main layout-->
    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/compiled.min.js"></script>
    <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
</body>

</html>
