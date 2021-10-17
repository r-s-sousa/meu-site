<!-- post1 -->
<section class="post">
   <div class="row my-3">
      <div class="col-lg-4 d-flex">
         <div class="align-self-center">
            <div>
               <img src="<?= $imgPost; ?>" class="img-fluid">
            </div>
         </div>
      </div>
      <div class="col-lg-8 text-center d-flex">
         <div class="align-self-center">
            <div class="post-title pt-4 p-lg-0">
            <h1><a class="linkTitle" href="<?= $router->route('blog.showPost', ['postSlug' => $slug]); ?>"><?= $title; ?></a></h1>
               <h4 class="my-4"><?= $subtitle; ?></h4>
            </div>
            <div class="post-author-sm pb-2">
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
   </div>
</section>