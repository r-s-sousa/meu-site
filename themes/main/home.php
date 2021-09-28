<?php $this->layout('_theme', ['title' => $title]); ?>

<?= $this->insert('main/partials/header'); ?>

<?= $this->insert('main/partials/hero'); ?>

<main id="main">

   <?= $this->insert('main/partials/about'); ?>

   <?= $this->insert('main/partials/facts'); ?>
   
   <?= $this->insert('main/partials/skills'); ?>
   
   <?= $this->insert('main/partials/resume'); ?>

   <?= $this->insert('main/partials/services'); ?>

   <?= $this->insert('main/partials/contact'); ?>
   
</main>

<?php 
   $this->start('footer');
   $this->insert('main/partials/footer');
   $this->end();
?>