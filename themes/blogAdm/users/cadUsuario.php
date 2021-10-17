<?php $this->layout('_theme', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<form id="form1">
   <div class="container" id="pagina">

      <div class="row">
         <div class="col-md-12 form-group text-center">
            <h2 class="text-center">Cadastro de Usuário</h2>
         </div>
         <div class="col-md-6 form-group">
            <label>Nome: </label>
            <input class="form-control" type="text" name="nome" required>
         </div>
         <div class="col-md-6 form-group">
            <label>Email: </label>
            <input class="form-control" type="email" id="email" name="email" required>
            <div id="emailResult"></div>
         </div>
         <div class="col-md-6 form-group">
            <label>Senha: </label>
            <input class="form-control" type="password" autocomplete="false" id="new-password" name="password" required>
            <div class="senhaResult"></div>
         </div>
         <div class="col-md-6 form-group">
            <label>Confirmar Senha: </label>
            <input class="form-control" type="password" autocomplete="false" id="passwordRe" name="passwordRe" required>
            <div class="senhaResult"></div>
         </div>
         <div class="col-md-12 mt-3 form-group text-center">
            <button type="submit" class="btn btn-outline-success">Cadastrar</button>
         </div>
         <div class="col-md-12">
            <div id="resultadoDiv" class="alert d-none">
               <span></span>
            </div>
         </div>
      </div>
   </div>
</form>

<?php $this->start('scripts'); ?>

<script>
   $(document).ready(() => {
      var resultadoDiv = $('#resultadoDiv');
      var resultadoMensagem = $('#resultadoDiv span');
      var senha = $('#new-password');
      var senhaRe = $('#passwordRe');

      // validação de email
      $('#email').on('blur', (e) => {
         let valorEmail = $(e.target).val();
         $.ajax({
            type: 'get',
            url: "<?= $router->route('user.emailVerify'); ?>",
            dataType: "json",
            data: "email=" + valorEmail,
            success: data => {
               if (data['resultado'] == false) {
                  $('#emailResult').removeClass('valid-feedback');
                  $('#emailResult').addClass('invalid-feedback').html(data['message']);
                  $('#email').removeClass('is-valid');
                  $('#email').addClass('is-invalid');
                  $(':submit').prop('disabled', true);
               } else {
                  $('#emailResult').removeClass('invalid-feedback');
                  $('#emailResult').addClass('valid-feedback').html(data['message']);
                  $('#email').removeClass('is-invalid');
                  $('#email').addClass('is-valid');
                  $(':submit').prop('disabled', false);
               }
            }
         })

      });

      $('#form1').submit(function(e) {

         $('#email').trigger('blur');

         // verifica se senhas são iguais
         if (!senhasSaoIguais(senha, senhaRe)) {
            senha.focus();
            e.preventDefault();
            return;
         }

         var dados = $(e.target).serialize();

         // não envia o formulário da forma tradicional
         e.preventDefault();

         resultadoDiv.fadeOut(4);

         $.ajax({
            type: "POST",
            url: "<?= $router->route('user.cadOrEditUser'); ?>",
            data: dados,
            dataType: "json",
         }).done(function(data) {
            resultadoMensagem.html(data['message']);
            resultadoDiv.removeClass('d-none');

            if (data['resultado'] == true) {
               resultadoDiv.removeClass('alert-danger');
               resultadoDiv.addClass('alert-success');
            } else {
               resultadoDiv.removeClass('alert-success');
               resultadoDiv.addClass('alert-danger');
            }

            resultadoDiv.fadeIn(4);
         });
      })

      function senhasSaoIguais(senha1, senha2) {
         let igual = true;
         if (senha1.val() === senha2.val()) {
            $('.senhaResult').removeClass('invalid-feedback');
            $('.senhaResult').addClass('valid-feedback').html('Senhas são iguais!');
            $(senha1).removeClass('is-invalid');
            $(senha2).removeClass('is-invalid');
            $(senha1).addClass('is-valid');
            $(senha2).addClass('is-valid');

            return true;
         }

         $('.senhaResult').removeClass('valid-feedback');
         $('.senhaResult').addClass('invalid-feedback').html('Senhas não são iguais!');
         $(senha1).removeClass('is-valid');
         $(senha2).removeClass('is-valid');
         $(senha1).addClass('is-invalid');
         $(senha2).addClass('is-invalid');

         return false;
      }
   })
</script>

<?php $this->end(); ?>