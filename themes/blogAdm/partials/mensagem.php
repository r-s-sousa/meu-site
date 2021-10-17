<?php
if (isset($_SESSION['mensagem'])) :
?>

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
               <button class="close" type="button" data-dismiss="alert">
                  &times;
               </button>
               <?= $_SESSION['mensagem']; ?>
            </div>
         </div>
      </div>
   </div>

<?php
elseif (isset($_SESSION['error'])) :
?>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
               <button class="close" type="button" data-dismiss="alert">
                  &times;
               </button>
               <?= $_SESSION['error']; ?>
            </div>
         </div>
      </div>
   </div>

<?php
endif;
if (isset($_SESSION['mensagem'])) unset($_SESSION['mensagem']);
if (isset($_SESSION['error'])) unset($_SESSION['error']);
?>