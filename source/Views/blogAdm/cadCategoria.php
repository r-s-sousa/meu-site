<?php $this->layout('_theme', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<form id="form1">
   <div class="container" id="pagina">

      <div class="row">
         <div class="col-md-12">
            <div class="col-md-12 form-group text-center">
               <h2 class="text-center">Cadastro de categoria</h2>
            </div>
            <div class="col-md-12 form-group">
               <label>Categoria: </label>
               <input class="form-control" type="text" name="categoria" required>
            </div>
            <div class="col-md-12 form-group">
               <button type="submit" class="btn btn-outline-success">Cadastrar</button>
            </div>
            <div class="col-md-12 form-group">
               <div id="resultadoDiv" class="alert d-none">
                  <span></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>

<?php $this->start('scripts'); ?>

<script>
   $(document).ready(() => {
      $('#form1').submit(function(e) {
         var dados = ($(this).serializeArray())[0];
         var resultadoDiv = $('#resultadoDiv');
         var resultadoMensagem = $('#resultadoDiv span');

         // não envia o formulário da forma tradicional
         e.preventDefault();

         resultadoDiv.fadeOut(4);

         $.ajax({
            type: "POST",
            url: "<?= $router->route('BlogAdm.cadCategoriaDados'); ?>",
            data: {
               categoria: dados.value
            },
            dataType: "json",
         }).done(function(data) {
            resultadoMensagem.html(data['mensagem']);
            resultadoDiv.removeClass('d-none');

            if(data['resultado'] == true){
               resultadoDiv.removeClass('alert-danger');
               resultadoDiv.addClass('alert-success');
            }
            else{
               resultadoDiv.removeClass('alert-success');
               resultadoDiv.addClass('alert-danger');
            }

            resultadoDiv.fadeIn(4);
         });
      })
   })
</script>

<?php $this->end(); ?>