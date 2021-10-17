<!-- post1 -->
<section class="post">
   <div class="row">
      <div class="col-md-12 text-center">

         <div class="post-img">
            <img src="<?= $imgPost; ?>" class="img-fluid">
         </div>

         <div class="post-title">
            <h1><?= $title; ?></h1>
            <h4 class="my-4"><?= $subtitle; ?></h4>
         </div>

         <div class="post-author pb-2">
            <div class="offset-sm-0 offset-md-2 col-sm-12 col-md-8">
               <div class="text-justify font-italic textHtmlPost">
                  <?= $descricao; ?>
               </div>
               <?php if (isset($leiaMais)) : ?>
                  <div class="col-md-12">
                     <a class="d-inline" href="<?= $router->route('blog.showPost', ['postSlug' => $slug]); ?>"> Ler mais ...</a>
                  </div>
               <?php endif; ?>
               <div class="row d-flex align-self-center justify-content-sm-center">
                  <div class="img p-2">
                     <img src="<?= $imgAutor; ?>" class="img-fluid" width="35px">
                     <span class="post-author-name">Rogéria Rita</span>
                  </div>
                  <div class="p-2 post-author-data">
                     <?= $data; ?>
                  </div>
                  <div class="p-2">
                     <?= $categorias; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> <!-- post2 -->