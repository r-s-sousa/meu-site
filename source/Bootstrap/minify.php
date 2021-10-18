<?php

use MatthiasMullie\Minify;

if($_SERVER['SERVER_NAME'] == 'localhost' && $_ENV['MINIFY']){
   $minifierCSS = new Minify\CSS();

   $minifierCSS->add(dirname(__DIR__, 2)."/themes/assets/vendor/bootstrap/css/bootstrap.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/themes/assets/vendor/icofont/icofont.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/themes/assets/vendor/boxicons/css/boxicons.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/themes/assets/vendor/venobox/venobox.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/themes/assets/vendor/owl.carousel/assets/owl.carousel.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/themes/assets/vendor/aos/aos.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/themes/assets/css/style.css");
   
   $minifierJS = new Minify\JS();
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/jquery/jquery.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/bootstrap/js/bootstrap.bundle.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/jquery.easing/jquery.easing.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/waypoints/jquery.waypoints.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/counterup/counterup.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/isotope-layout/isotope.pkgd.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/venobox/venobox.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/owl.carousel/owl.carousel.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/typed.js/typed.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/vendor/aos/aos.js");
   $minifierJS->add(dirname(__DIR__, 2)."/themes/assets/js/main.js");

   // Save minified files to disk
   $minifierCSS->minify(dirname(__DIR__, 2)."/themes/assets/minify/style.css");
   $minifierJS->minify(dirname(__DIR__, 2)."/themes/assets/minify/scripts.js");
}

// die();