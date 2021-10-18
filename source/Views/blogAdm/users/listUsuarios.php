<?php $this->layout('_theme', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<div class="container" id="pagina">
   <div class="row">
      <div class="col-md-12">
         <h2 class="text-center">Listagem de Usuários</h2>
      </div>
      <div class="col-md-12 my-2">
         <?= $this->insert('login/mensagem'); ?>
      </div>
      <div class="col-md-12 text-center">
         <table class="table table-bordered" id="tabela">
            <thead class="bg-secondary text-white">
               <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Funções</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($obUsers as $obUser) : ?>
                  <tr>
                     <td><?= $obUser->id; ?></td>
                     <td><?= $obUser->nome; ?></td>
                     <td><?= $obUser->email; ?></td>
                     <td class="tdAcoes">
                        <a href="<?= $router->route('user.editar', ['id' => $obUser->id]); ?>"><i class="bx bx-edit text-primary mr-2"></i></a>
                        <a class="btnDeletar" href="<?= $router->route('user.deletar', ['id' => $obUser->id]); ?>"><i class="bx bx-minus text-danger"></i></a>
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
   $(document).ready(function() {
      $('.btnDeletar').on('click', (e) => {
         if (!confirm('Deseja realmente deletar esse usuário ?'))
            e.preventDefault();
      })
   });
</script>
<?= $this->end(); ?>