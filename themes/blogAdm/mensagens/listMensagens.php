<?php $this->layout('_theme', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
<link rel="stylesheet" href="<?= asset('css/blogAdm.css'); ?>">
<?php $this->end(); ?>

<?= $this->insert('blogAdm/partials/navbar'); ?>

<div class="container" id="pagina">
   <div class="row">
      <div class="col-md-12">
         <h2 class="text-center">Listagem de Mensagens</h2>
      </div>
      <div class="col-md-12 my-2">
         <?= $this->insert('login/mensagem'); ?>
      </div>
      <div class="col-md-12 text-center">
         <table class="table table-bordered" id="tabela">
            <thead class="bg-secondary text-white">
               <tr>
                  <th>Sts</th>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Titulo</th>
                  <th>Mensagem</th>
                  <th>Ações</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($obMensagens as $obMensagem) : ?>
                  <tr>
                     <td>
                        <?php if ($obMensagem->email_send_at) : ?>
                           <i class='bx bxs-square text-success'></i>
                        <?php else : ?>
                           <i class='bx bxs-square text-danger'></i>
                        <?php endif; ?>
                     </td>
                     <td><?= $obMensagem->id; ?></td>
                     <td><?= $obMensagem->nome; ?></td>
                     <td><?= $obMensagem->email; ?></td>
                     <td><?= $obMensagem->titulo; ?></td>
                     <td><?= $obMensagem->mensagem; ?></td>
                     <td class="tdAcoes">
                        <a href="<?= $router->route('BlogAdm.enviarEmail', ['id' => $obMensagem->id]); ?>"><i class="bx bx-send text-primary mr-2"></i></a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>