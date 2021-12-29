<!-- alerta de CADASTRO -->
<?php if ($_GET['c']) { ?>
    <div class="alert alert-success" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Alerta de cadastro!</strong> O item foi cadastrado com sucesso.
    </div>
<?php } ?>

<!-- alerta de ALTERACAO -->
<?php if (is_numeric($_GET['a'])) { ?>
    <div class="alert alert-success" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Altere os dados cadastrais abaixo.
    </div>
<?php } ?>

<!-- alerta de ALTERACAO -->
<?php if ($_GET['a'] == 'true') { ?>
    <div class="alert alert-info" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Alerta de altera&ccedil;&atilde;o!</strong> O item foi alterado com sucessso.
    </div>
<?php } ?>

<!-- alerta de EXCLUSAO -->
<?php if (!empty($_GET['d'])) { ?>
    <div class="alert alert-danger" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Alerta de exclus&atilde;o!</strong> O item foi excluído com sucesso, essa opera&ccedil;&atilde;o n&atilde;o pode ser desfeita.
    </div>
<?php } ?>

<!-- alertas --
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Alerta de cadastro!</strong> O item foi cadastrado com sucesso.
</div>
<!--  --
<div class="alert alert-warning">
    <strong>Warning!</strong> Best check yo self, you're not looking too good.
</div>
<!-- / -->
