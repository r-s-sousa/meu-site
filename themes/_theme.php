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

   <!-- Template Main CSS File -->
   <link href="<?= asset('minify/style.css'); ?>" rel="stylesheet">

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

   <!-- Template Main JS File -->
   <script src="<?= asset('minify/scripts.js'); ?>"></script>

   <!-- OUTROS SCRIPTS -->
   <?= $this->section('scripts'); ?>
</body>

</html>