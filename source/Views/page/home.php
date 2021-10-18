<?php $this->layout('_theme', ['title' => $title]); ?>

<?= $this->insert('page/partials/header'); ?>

<?= $this->insert('page/partials/hero'); ?>

<main id="main">

   <?= $this->insert('page/partials/about'); ?>

   <?= $this->insert('page/partials/facts'); ?>

   <?= $this->insert('page/partials/skills'); ?>

   <?= $this->insert('page/partials/resume'); ?>

   <?= $this->insert('page/partials/services'); ?>

   <?= $this->insert('page/partials/contact'); ?>

</main>

<?= $this->insert('page/partials/footer', ['qtdAcessos' => $qtdAcessos]); ?>

<?= $this->start('scripts'); ?>
<script>
   $(document).ready(() => {
      $('#formContact').submit((e) => {
         e.preventDefault();
         let dados = $(e.target).serialize();

         $.ajax({
            type: 'post',
            url: '<?= $router->route('profile.recebeDadosDeContato'); ?>',
            dataType: 'json',
            data: dados,
            success: dados => {
               if (dados['resultado']) {
                  $('.sent-message').html(dados['message']).show();
                  $('.error-message').hide();
               } else {
                  $('.sent-message').hide();
                  $('.error-message').html(dados['message']).show();
               }
            },
            beforeSend: () => {
               $('.error-message').hide();
               $('.sent-message').hide();
               $('.loading').show();
            },
            complete: () => {
               $('.loading').hide();
            }
         })
      })
   })
</script>
<?= $this->end(); ?>