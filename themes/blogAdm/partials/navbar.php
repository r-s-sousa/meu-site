<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
   <div class="container">
      <a class="navbar-brand" href="<?= $router->route('BlogAdm.home'); ?>">Blog ADM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a href="<?= $router->route('blog.home'); ?>" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
               <a href="<?= $router->route('BlogAdm.listarMensagens'); ?>" class="nav-link">Mensagens</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="dropPost" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Posts
               </a>
               <div class="dropdown-menu" aria-labelledby="dropPost">
                  <a class="dropdown-item" href="<?= $router->route('BlogAdm.cadPost'); ?>">Cadastrar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= $router->route('BlogAdm.home'); ?>">Listar</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="dropCategory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categorias
               </a>
               <div class="dropdown-menu" aria-labelledby="dropCategory">
                  <a class="dropdown-item" href="<?= $router->route('BlogAdm.cadCategoria'); ?>">Cadastrar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= $router->route('BlogAdm.categorias'); ?>">Listar</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="dropUsers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Usuários
               </a>
               <div class="dropdown-menu" aria-labelledby="dropUsers">
                  <a class="dropdown-item" href="<?= $router->route('user.cadastrar'); ?>">Cadastrar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= $router->route('user.listar'); ?>">Listar</a>
               </div>
            </li>
            <li class="nav-item nav-item-final">
               <a href="<?= $router->route('login.logout'); ?>" class="btn btn-outline-danger">Sair</a>
            </li>
         </ul>
      </div>
   </div>
</nav>