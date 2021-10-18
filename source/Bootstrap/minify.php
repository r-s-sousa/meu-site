<?php

use MatthiasMullie\Minify;

if($_SERVER['SERVER_NAME'] == 'localhost' && $_ENV['MINIFY']){
   $minifierCSS = new Minify\CSS();

   $minifierCSS->add(dirname(__DIR__, 2)."/public/vendor/bootstrap/css/bootstrap.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/public/vendor/icofont/icofont.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/public/vendor/boxicons/css/boxicons.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/public/vendor/venobox/venobox.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/public/vendor/owl.carousel/assets/owl.carousel.min.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/public/vendor/aos/aos.css");
   $minifierCSS->add(dirname(__DIR__, 2)."/public/css/style.css");
   
   $minifierJS = new Minify\JS();
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/jquery/jquery.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/bootstrap/js/bootstrap.bundle.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/jquery.easing/jquery.easing.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/waypoints/jquery.waypoints.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/counterup/counterup.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/isotope-layout/isotope.pkgd.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/venobox/venobox.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/owl.carousel/owl.carousel.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/typed.js/typed.min.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/vendor/aos/aos.js");
   $minifierJS->add(dirname(__DIR__, 2)."/public/js/main.js");

   // Save minified files to disk
   $minifierCSS->minify(dirname(__DIR__, 2)."/public/minify/style.css");
   $minifierJS->minify(dirname(__DIR__, 2)."/public/minify/scripts.js");
}

// die();