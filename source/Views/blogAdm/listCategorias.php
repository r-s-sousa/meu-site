<?php $this->layout('_theme', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<div class="container" id="pagina">
   <div class="row">
      <div class="col-md-12 text-center">
         <h2 class="text-center">Listagem de Categorias</h2>
         <table class="table table-bordered mt-3" id="tabela">
            <thead class="bg-secondary text-white">
               <tr>
                  <th>#</th>
                  <th>Categoria</th>
                  <th>Usada</th>
                  <th>Funções</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($obCategorias as $categoria) : ?>
                  <tr id="linha_<?= $categoria->id; ?>">
                     <td><?= $categoria->id; ?></td>
                     <td><?= str_replace(" ", "-", $categoria->categoria); ?></td>
                     <td><?= $qtdByCateriaId[$categoria->id]; ?> vezes</td>
                     <td class="tdAcoes">
                        <a class="btnAtualizar" data-id="<?= $categoria->id; ?>" href="#"><i class="bx bx-edit text-primary mr-2"></i></a>
                        <a href="#" class="btnDeletar" data-id="<?= $categoria->id; ?>"><i class="bx bx-minus text-danger"></i></a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<div class="modal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Editando categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="form-group col-md-12">
               <label>Categoria</label>
               <input class="form-control" type="text" name="categoria" id="categoria">
            </div>
            <div class="form-group col-md-12">
               <button type="submit" class="btnAttCategoria btn btn-outline-success">Atualizar</button>
            </div>
         </div>
      </div>
   </div>
</div>

<?= $this->start('scripts'); ?>
<script>
   $(document).ready(function() {
      $('.btnDeletar').on('click', function(e) {
         if (confirm('Tem certeza que deseja deletar essa categoria ?')) {

            e.preventDefault();

            let id = ($(this).prop('dataset')['id']);
            let removerEsse = $(this).parent().parent();

            $.ajax({
               type: "GET",
               url: "<?= $router->route('BlogAdm.delCategoria'); ?>",
               data: {
                  id: id
               },
               dataType: "json",
            }).done(function(data) {
               if (data['resultado']) {
                  removerEsse.remove();
               }
            });
         }
      });

      $('.btnAtualizar').on('click', function(e) {
         e.preventDefault();
         celulas = null;
         id2 = null;
         categoriaTD = null;
         valorCategoria = null;

         id2 = ($(this).prop('dataset')['id']);
         celulas = ($(this).parent().parent("#linha_" + id2).prop('cells'));
         categoriaTD = $(celulas[1]);
         valorCategoria = $(celulas[1]).html();

         $('#categoria').val(valorCategoria);
         $('.modal').fadeIn(500);

         $('.close').on('click', function() {
            $('.modal').fadeOut(500);
         })

         $(':submit').on('click', function(e) {
            novoValor = $('#categoria').val();
            if (novoValor.length > 0) {
               $.ajax({
                  type: "POST",
                  url: "<?= $router->route('BlogAdm.edtCategoriaDados'); ?>",
                  data: {
                     id: id2,
                     novoValor: novoValor
                  },
                  dataType: "json",
               }).done(function(data) {
                  if (data['resultado']) {
                     // atualiza o valor
                     categoriaTD.html(data['categoria']);
                     $('.modal').fadeOut(500);
                  }
               });
            }
         })
      });


   });
</script>
<?= $this->end(); ?>