<?php
    require_once 'rajaongkir/class.php';
    $rajaongkir = new Rajaongkir();
    $u_Provinsi =   "https://api.rajaongkir.com/starter/province";      
        
    $provinsi=  json_decode($rajaongkir->call_get($u_Provinsi),true);
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
    <link href='https://fonts.googleapis.com/css?family=Doppio One' rel='stylesheet'>

    <link rel="shortcut icon" href="official/img/icon.ico">

    <!-- Theme CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- include file html -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="15">

   <!-- include file navbar html -->
   <div w3-include-html="navbar-second.html"></div>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-green" style="padding: 50px;">
        <h2 style="margin-top: 100px;"><center class="font-white">Cara Pemesanan</center></h2>
        <div class="row is-flex" style="margin-top: 50px;">
        	<div class="col-md-5">
        		<center><img src="official/img/choose-white.png" height="200px;" style="padding: 25px;" /></center>
        		<center><h4 class="font-white">Pilih produk anda</h4></center>
        	</div>
        	<div class="col-md-7 padding-text">
        		<h5><center class="font-white">Silahkan Pilih Barang anda pada Katalog Produk Kami<br> (Pembelian diatas 5pcs dapat potongan 5%)</center></h5>
        	</div>
        </div>
        <div class="row"">
        	<div class="col-md-5">
        		<center><img src="official/img/barcode-white.png" height="200px;" style="padding: 25px;" /></center>
        		<center><h4 class="font-white">Cek ongkir</h4></center>
        	</div>
        	<div class="col-md-7 padding-text">
        		<h5><center class="font-white">Cek ongkos kirim ke rumah / daerah tujuan anda</center></h5>
                <p><center class="font-white">Cek ongkir <a href="#ongkir">disini</a></center></p>
        	</div>
        </div>
        <div class="row"">
        	<div class="col-md-5">
        		<center><img src="official/img/choices-white.png" height="200px;" style="padding: 25px;" /></center>
        		<center><h4 class="font-white">Pesan barang anda</h4></center>
        	</div>
        	<div class="col-md-7 padding-text">
        		<h5><center class="font-white">Silahkan lakukan pemesanan dengan cara SMS / WA nomor 081226406984 dengan format :</center></h5>
            	<p class="font-white">Nama Penerima/Pemesan :</p>
            	<p class="font-white">Alamat				  :</p>
            	<p class="font-white">Barang Pesanan		  :</p>
            	<p class="font-white">nomor Handphone		  :</p>
        	</div>
        </div>
        <div class="row"">
        	<div class="col-md-5">
        		<center><img src="official/img/black-and-white-credit-cards-white.png" height="200px;" style="padding: 25px;" /></center>
        		<center><h4 class="font-white">Bayar pesanan anda</h4></center>
        	</div>
        	<div class="col-md-7 padding-text">
        		<h5><center class="font-white">Lakukan pembayaran sejumlah Harga Barang + Ongkos Kirim dengan cara Transfer ke Rekening Bank Mandiri 1710003044693 atas nama Riefki Atma Yudo Effendi</center></h5>
        	</div>
        </div>
        <div class="row"">
        	<div class="col-md-5">
        		<center><img src="official/img/accepted-notes-white.png" height="200px;" style="padding: 25px;" /></center>
        		<center><h4 class="font-white">Konfirmasi</h4></center>
        	</div>
        	<div class="col-md-7 padding-text">
        		<h5><center class="font-white">Lakukan konfirmasi ke nomor 081226406984 dengan cara mengirimkan bukti transfer
</center></h5>
        	</div>
        </div>

        <h2 style="margin-top: 100px;" id="ongkir"><center class="font-white">Cek ongkir</center></h2>
        <center><p class="font-white">dari Surabaya (per Kilogram)</p></center>
        <form id="form" style="margin-top: 10px;">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label class="font-white">Provinsi Tujuan</label>
                        <select class="form-control" type="text" onChange="pilih('#provinsi_tuj','#kota_tuj')" name="provinsi_tuj" id="provinsi_tuj" >
                                <option>Pilih</option>
                            <?php
                                for($i=0; $i<count($provinsi['rajaongkir']['results']); $i++ ){
                                    
                                    echo "<option id='id' value='".$provinsi['rajaongkir']['results'][$i]['province_id']."'>".$provinsi['rajaongkir']['results'][$i]['province']."</option>";
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-white">Kota/Kabupaten Tujuan</label>
                        <select class="form-control" type="text" name="kota_tuj" id="kota_tuj" ></select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-white">Kurir</label>
                        <select class="form-control" type="text" name="kurir" id="kurir" >
                            <option>Pilih</option>
                            <option value='jne'>JNE</option>
                            <option value='pos'>POS INDONESIA</option>
                        </select>
                    </div>
                </div>        
            </div>
            <div class="row" style="margin-top: 20px;">
                <center><button class="btn btn-warning">Cek</button></center>
            </div>
        </form>
        <div class="row detail" style="margin-top: 20px;">
            
        </div>
    </section>


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

     <!-- include file html -->
     <script>
        w3.includeHTML();
    </script>

    <!-- choose provinsi and kota raja ongkir -->
    <script>
        function pilih(prov,kota){
            
                $.get("rajaongkir/kota.php?id="+$(prov).val(),function(dkota){
                    $(kota).html(dkota);
                })
            
        }
    </script>

    <!-- send data to cost -->
    <script>
    $("#form").submit(function(e){
        e.preventDefault();
        $.post("rajaongkir/cost.php",$(this).serialize(),function(hKirim){
            $(".detail").html(hKirim);
        });
    });
    
    </script>

</body>

</html>
