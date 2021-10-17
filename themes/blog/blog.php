<?php
$this->layout('_theme', ['title' => $title]);
$this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blog.css'); ?>">
<link rel="stylesheet" href="<?= asset('css/paginator.css'); ?>">
<?php $this->end(); ?>

<header>
   <?=
   $this->insert('blog/partials/navbar');
   $this->insert('blog/partials/sidebar', [
      'obCategorias' => $obCategorias,
      'ultimas' => $ultimas,
      'countCategorias' => $countCategorias
   ]);
   ?>
</header>

<div class="container" id="pagina">
   <?= $posts; ?>
   <div class="col-md-12 text-center">
      <?= $paginator; ?>
   </div>
</div>

<div class="container">
   <footer>
      <?= $this->insert('blog/partials/footer'); ?>
   </footer>
</div>

<?php if (isset($mainPage)) : ?>
   <?= $this->start('scripts'); ?>
   <script>
      $(document).ready(function() {
         $('#blogHome').addClass('active');

         let btnSearch = $('#btnSearch');
         let iconForBtn = $('#btnSearch i');
         btnSearch.prop('disabled', true);
         iconForBtn.removeClass('bx-search');
         iconForBtn.addClass('bx-lock');

         $("#pesquisa").keyup((e) => {
            let tamanho = $(e.target).val().length;
            if (tamanho < 3) {
               btnSearch.prop('disabled', true);
               iconForBtn.removeClass('bx-search');
               iconForBtn.addClass('bx-lock');
            } else if (tamanho >= 3) {
               btnSearch.prop('disabled', false);
               iconForBtn.removeClass('bx-lock');
               iconForBtn.addClass('bx-search');
            }
         })

      });
   </script>
   <?= $this->end(); ?>
<?php endif; ?>