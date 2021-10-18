<?php
if (isset($_SESSION['mensagem'])) :
?>
    <div class="alert alert-success alert-dismissible">
        <button class="close" type="button" data-dismiss="alert">
            &times;
        </button>
        <?= $_SESSION['mensagem']; ?>
    </div>
<?php
elseif (isset($_SESSION['error'])) :
?>
    <div class="alert alert-danger alert-dismissible">
        <button class="close" type="button" data-dismiss="alert">
            &times;
        </button>
        <?= $_SESSION['error']; ?>
    </div>
<?php
endif;
if (isset($_SESSION['mensagem'])) unset($_SESSION['mensagem']);
if (isset($_SESSION['error'])) unset($_SESSION['error']);
?>