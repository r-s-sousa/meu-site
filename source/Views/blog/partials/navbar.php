<!-- BARRA DE NAVEGAÇÃO COM DROPDOW ITENS -->
<nav class="navbar navbar-expand-sm navbar-dark navBlog fixed-top" id="navBlog">
   <div class="container">
      <a href="<?= $router->route('blog.home'); ?>" class="navbar-brand lineBottom">Blog Rafael</a>

      <!-- HAMBURGUES -->
      <button class="navbar-toggler" data-target="#navId3" data-toggle="collapse">
         <span class="navbar-toggler-icon text-primary"></span>
      </button>

      <!-- NAVEGAÇÃO -->
      <div class="collapse navbar-collapse" id="navId3">

         <ul class="navbar-nav ml-auto navbarteste">
            <li class="nav-item" id="blogHome">
               <a href="<?= $router->route('blog.home'); ?>" class="nav-link lineBottom">Blog</a>
            </li>
            <li>
               <a href="<?= URL ?>" class="nav-link lineBottom">Site</a>
            </li>
            <li>
               <a target="_blanck" href="https://www.instagram.com/rafinhas21"><i class="bx bxl-instagram socialLink"></i></a>
            </li>
            <li>
               <a target="_blanck" href="https://api.whatsapp.com/send?phone=5561994346828"><i class="bx bxl-whatsapp socialLink"></i></a>
            </li>
         </ul>

         <form class="form-inline d-none d-lg-block ml-md-4" action="<?= $router->route('blog.searchPost'); ?>" method="GET">
            <input class="form-control mr-sm-2" type="search" name="pesquisa" id="pesquisa" placeholder="Pesquisar" aria-label="Pesquisar">
            <button id="btnSearch" class="btn btn-outline-info" type="submit"><i class="bx bx-search"></i></button>
         </form>

      </div>
   </div>
</nav>