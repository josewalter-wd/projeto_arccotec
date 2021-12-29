<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php"><i class="fas fa-tachometer-alt"></i> Área de trabalho</a>
        </li>
        <!-- modulos incorporados e adicionais -->
        <?php $modulos = $query->totalQuery('trinder3_modules', 'id_module', 'ASC'); ?>
        <?php while ($modulo = mysqli_fetch_object($modulos)) { ?>
            <?php if ($modulo->adicional_module == 0) { ?>
                <li <?php echo str_replace('tb_', '', $modulo->table_module) == $_GET['m'] ? 'class="active"' : '' ?>>
                    <a href="CRUD.php?m=<?php echo str_replace('tb_', '', $modulo->table_module) ?>"><i class="fa fa-fw fa-<?php echo $modulo->fontAnsome_module ?>"></i> <?php echo ucfirst(str_replace('_', ' ', substr($modulo->table_module, '3'))); ?></a>
                </li>
            <?php } else { ?>
                <li <?php echo str_replace('tb_', '', $modulo->table_module) == $_GET['m'] ? 'class="active"' : '' ?>>
                    <a href="MODULE.php?m=<?php echo str_replace('tb_', '', $modulo->table_module) ?>"><i class="fa fa-fw fa-<?php echo $modulo->fontAnsome_module ?>"></i> <?php echo ucfirst(str_replace('_', ' ', substr($modulo->table_module, '3'))); ?></a>
                </li>
            <?php } ?>
        <?php } ?>

        <!-- collapse -->
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                <i class="fa fa-fw fa-plus-square"></i> Adicionais <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="index.php?m=shopping"><i class="fa fa-fw fa-truck"></i> Shopping</a>
                </li>
                <li>
                    <a href="index.php?m=host"><i class="fa fa-fw fa-star"></i> Hospedagem</a>
                </li>
            </ul>
        </li>
        <!-- / -->

    </ul>
</div>
<!-- /.navbar-collapse -->