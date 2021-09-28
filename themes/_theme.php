<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="<?= asset('vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
   <link href="<?= asset('vendor/icofont/icofont.min.css'); ?>" rel="stylesheet">
   <link href="<?= asset('vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
   <link href="<?= asset('vendor/venobox/venobox.css'); ?>" rel="stylesheet">
   <link href="<?= asset('vendor/owl.carousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
   <link href="<?= asset('vendor/aos/aos.css'); ?>" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="<?= asset('css/style.css'); ?>" rel="stylesheet">

   <!-- FAVICON -->
   <link rel="shortcut icon" href="<?= asset('img/user.png'); ?>" type="image/x-icon">

   <!-- TITULO -->
   <title><?= $title ?></title>
</head>

<body>
   <!-- main page -->
   <?= $this->section('content'); ?>

   <!-- footer -->
   <?= $this->section('footer'); ?>

   <!-- Vendor JS Files -->
   <script src="<?= asset('vendor/jquery/jquery.min.js'); ?>"></script>
   <script src="<?= asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   <script src="<?= asset('vendor/jquery.easing/jquery.easing.min.js'); ?>"></script>
   <script src="<?= asset('vendor/waypoints/jquery.waypoints.min.js'); ?>"></script>
   <script src="<?= asset('vendor/counterup/counterup.min.js'); ?>"></script>
   <script src="<?= asset('vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
   <script src="<?= asset('vendor/venobox/venobox.min.js'); ?>"></script>
   <script src="<?= asset('vendor/owl.carousel/owl.carousel.min.js'); ?>"></script>
   <script src="<?= asset('vendor/typed.js/typed.min.js'); ?>"></script>
   <script src="<?= asset('vendor/aos/aos.js'); ?>"></script>

   <!-- Template Main JS File -->
   <script src="<?= asset('js/main.js'); ?>"></script>

   <!-- OUTROS SCRIPTS -->
   <?= $this->section('scripts'); ?>
</body>

</html>