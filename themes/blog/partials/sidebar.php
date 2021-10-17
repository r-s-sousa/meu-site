<nav class="d-none d-md-block bg-white" id="sideNav">
   <h5 class="lead mt-4">Categorias</h5>
   <ul class="navbar-nav">

      <?php

      use Source\Support\Categorias;

      foreach ($obCategorias as $obCategoria) :
         $nomeCategoria = ltrim(Categorias::getCategoryNameById($obCategoria->id), '#'); ?>
         <li class="nav-item">
            <a 
               class="nav-link" 
               href="<?= $router->route('blog.searchCategoria', ['categoria' => $nomeCategoria]); ?>">
               <?= $obCategoria->categoria; ?><span style="font-size: 12px; background-color: white; color: black;" class="ml-1 badge badge-info"><?= $countCategorias[$obCategoria->id]; ?></span>
            </a>
         </li>

      <?php endforeach; ?>

   </ul>

   <h5 class="lead mt-4">Posts Recentes</h5>
   <ul class="navbar-nav">
      <?php foreach($ultimas as $ultima): ?>
      <li class="nav-item">
         <a 
            class="nav-link" 
            href="<?= $router->route('blog.showPost', ['postSlug'=>$ultima['slug']]); ?>">
            <?= $ultima['texto']; ?>
         </a>
      </li>
      <?php endforeach; ?>
   </ul>
</nav>