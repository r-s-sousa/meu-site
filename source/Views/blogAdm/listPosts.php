<?php $this->layout('_theme', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<div class="container-fluid" id="pagina">
   <div class="row">
      <div class="col-md-12">
         <?= $this->insert('blogAdm/partials/mensagem'); ?>
      </div>
      <div class="col-md-12 text-center">
         <h2 class="text-center">Listagem de Posts</h2>
         <table class="table table-bordered mt-3" id="tabela">
            <thead class="bg-secondary text-white">
               <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Status</th>
                  <th>Descrição</th>
                  <th>Categorias</th>
                  <th>Img</th>
                  <th>Funções</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($obPosts as $post) : ?>
                  <tr>
                     <td><?= $post->id; ?></td>
                     <td><?= $post->titulo; ?></td>
                     <td>
                        <?php if ($post->visivel) : ?>
                           <i class='bx bxs-square text-success'></i>
                        <?php else : ?>
                           <i class='bx bxs-square text-danger'></i>
                        <?php endif; ?>
                     </td>
                     <td><?= $post->descricao; ?></td>
                     <td><?= $categoriasName[$post->id]; ?></td>
                     <td><img src="<?= url('themes/blog/partials/imgs/' . $post->imgPath); ?>" width="130px"> </td>
                     <td class="tdAcoes">
                        <a href="<?= $router->route('BlogAdm.edtPost', ['id' => $post->id]); ?>"><i class="bx bx-edit text-primary mr-2"></i></a>
                        <a class="btnDeletarPost" href="<?= $router->route('BlogAdm.delPost', ['id' => $post->id]); ?>"><i class="bx bx-minus text-danger"></i></a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?= $this->start('scripts'); ?>
<script>
   $(document).ready(() => {
      $('.btnDeletarPost').on('click', (e) => {
         if (!confirm('tem certeza que deseja deletar esse post ?')){
            e.preventDefault();
         }
      })
   })
</script>
<?= $this->end(); ?>