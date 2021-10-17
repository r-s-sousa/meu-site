<?php $this->layout('_theme', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<div class="container" id="pagina">
   <div class="row">
      <div class="col-md-12 text-center">
         <h2 class="text-center">Edição de categoria</h2>
         
      </div>
   </div>
</div>