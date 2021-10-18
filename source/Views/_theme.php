<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title><?= $title; ?></title>
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="<?= asset('minify/style.css'); ?>" rel="stylesheet">

   <!-- FAVICON -->
   <link rel="shortcut icon" href="<?= asset('img/user.png'); ?>" type="image/x-icon">

   <!-- ANOTHER STYLES -->
   <?= $this->section('styles'); ?>
</head>

<body>
   <?= $this->section('content'); ?>
   
   <!-- JS minify -->
   <script src="<?= asset('minify/scripts.js'); ?>"></script>

   <!-- OUTROS SCRIPTS -->
   <?= $this->section('scripts'); ?>
</body>

</html>