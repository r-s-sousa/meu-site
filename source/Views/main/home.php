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

<?= $this->insert('main/partials/footer', ['qtdAcessos' => $qtdAcessos]); ?>

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