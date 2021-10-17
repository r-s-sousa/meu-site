<?php $this->layout('_theme', ['title' => $title]); ?>
<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<style>
   .ck-editor__editable_inline {
      height: 400px;
   }
</style>
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<form action="<?= $router->route('BlogAdm.edtPostDados'); ?>" method="POST" enctype="multipart/form-data">
   <div class="container" id="pagina">
      <div class="row">
         <div class="col-md-12 text-center">
            <h2 class="text-center">Edição de Post</h2>
            <hr>
         </div>
         <div class="col-md-12 form-group">
            <div class="row">
               <div class="col-md-5">
                  <label>Titulo</label>
                  <input class="form-control" type="text" name="titulo" value="<?= $obPost->titulo; ?>" required>
                  <input type="hidden" name="id" id="id" value="<?= $obPost->id; ?>">
               </div>
               <div class="col-md-4">
                  <label>Img</label>
                  <input class="form-control-file" accept="image/*" type="file" name="img" onchange="loadFile(event)">
               </div>
               <div class="col-md-3 border-dark">
                  <img id="output" width="130px" height="75px" src="<?= url("themes/blog/partials/imgs/$obPost->imgPath"); ?>">
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <label>Visível</label>
            <select class="form-control" name="visivel" id="visivel" required>
               <option value="1">Sim</option>
               <option value="0">Não</option>
            </select>
         </div>
         <div class="col-md-6">
            <label>Subtitulo</label>
            <input class="form-control" type="text" name="subtitulo" id="subtitulo" value="<?= $obPost->subtitulo; ?>" required>
         </div>
         <div class="col-md-4">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" id="slug" value="<?= $obPost->slug; ?>" required>
            <div id="slugResult"></div>
         </div>
         <div class="col-md-12 form-group" id="categorias">
            <hr>
            <label>Categorias</label>
            <br>
            <?php
            $categoriasDoPost = json_decode($obPost->categorias);
            foreach ($obCategorias as $obCategoria) :
               if (in_array($obCategoria->id, array_values($categoriasDoPost))) :
            ?>
                  <label class="itemCategory">
                     <input class="categoryCheckbox" type="checkbox" name="categoria[]" checked value="<?= $obCategoria->id; ?>"> <?= $obCategoria->categoria; ?>
                  </label>
               <?php else : ?>
                  <label class="itemCategory">
                     <input class="categoryCheckbox" type="checkbox" name="categoria[]" value="<?= $obCategoria->id; ?>"> <?= $obCategoria->categoria; ?>
                  </label>
            <?php endif;
            endforeach; ?>
            <div id="resultadoCheckbox" class="d-none alert alert-danger alert-dismissible fade show" role="alert">
               Você precisa selecionar pelo menos uma categoria
               <button id="btnCloseMsn" type="button" class="close" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <hr>
         </div>
         <div class="col-md-12 form-group">
            <label>Descrição</label>
            <textarea class="editor" name="descricao" id="descricao" required><?= html_entity_decode($obPost->descricao); ?></textarea>
         </div>
         <div class="col-md-12 form-group text-center">
            <button type="submit" class="btn btn-outline-success">Atualizar</button>
         </div>
      </div>
   </div>

</form>

<?php $this->start('scripts'); ?>
<script>
   var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
         URL.revokeObjectURL(output.src) // free memory
      }
   };

   $(document).ready(function() {

      $('#visivel').val('<?= $obPost->visivel; ?>')

      $('#resultadoCheckbox').hide();

      $('#btnCloseMsn').click(() => {
         $('#resultadoCheckbox').hide('slow');
      })

      $('form').submit((e) => {
         let countCategory = $('.categoryCheckbox:checked').length;
         if (countCategory == 0) {
            e.preventDefault();
            $('#resultadoCheckbox').removeClass('d-none');
            $('#resultadoCheckbox').show();
         }
      })

      $('#slug').keyup(function(event) {
         slugText = $(this).val();
         $.ajax({
            type: 'POST',
            url: "<?= $router->route('BlogAdm.verifySlugExists'); ?>",
            data: {
               slug: slugText,
               id: $('#id').val()
            },
            dataType: 'json',
         }).done(function(data) {
            if (data['resultado'] == false) {
               $('#slugResult').removeClass('valid-feedback');
               $('#slugResult').addClass('invalid-feedback').html(data['message']);
               $('#slug').removeClass('is-valid');
               $('#slug').addClass('is-invalid');
               $(':submit').prop('disabled', true);
            } else {
               $('#slugResult').removeClass('invalid-feedback');
               $('#slugResult').addClass('valid-feedback').html(data['message']);
               $('#slug').removeClass('is-invalid');
               $('#slug').addClass('is-valid');
               $(':submit').prop('disabled', false);
            }
         });
      })
   });
</script>
<?= $this->insert('blogAdm/partials/ckeditor'); ?>
<?php $this->end(); ?>