<?php
include './includes/engine.php';

//->negar modulo fora da tabela
$mod = $query->simpleQuery('trinder3_modules', 'table_module', 'tb_' . $_GET['m']);
if (!$mod) {
    echo "<script>location.href='index.php'</script>";
    exit;
}
$id = $query->simpleQuery('trinder3_modules', 'table_module', 'tb_' . $_GET['m']);
$cadastros = $query->totalQuery('tb_' . $_GET['m'], $id->id_table, 'DESC');
$contador = $query->totalCont('tb_' . $_GET['m'], $id->id_table, 'DESC');
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="WalterDesigner">

        <title>..:: Trinder Administrator <?php echo $globais['trinderVersion']; ?> | Plataforma de Administra&ccedil;&atilde;o e Otimização de Sites e Sistemas ::..</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min_1.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Trinder Administrator <?php echo $globais['trinderVersion']; ?> - Plataforma de Administra&ccedil;&atilde;o de Sites e Sistemas</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <!-- incluindo mensagens -->
                            <?php include './includes/trinder3/mensagens.php'; ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <!-- incluindo avisos -->
                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <!-- incluindo dataLog -->
                        <?php include './includes/trinder3/dataLog.php' ?>
                    </li>
                </ul>
                <!-- incluindo menu lateral -->
                <?php include './includes/trinder3/menu.php'; ?>
                
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Gerenciar <?php echo str_replace('_', ' ', $_GET['m']);  ?>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fas fa-tachometer-alt"></i>  <a href="index.php">&Aacute;rea de trabalho</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-edit"></i>  <a href="MODULE.php?m=<?php echo $_GET['m'] ?>"> Cadastrar <?php echo str_replace('_', ' ', $_GET['m']);  ?> </a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-list"></i> Gerenciar cadastrados
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12" style="width: 80%; margin: auto;">
                            
                            <!-- incluindo alertas -->
                            <?php include './includes/trinder3/alertas.php'; ?>
                                
                            <?php $panel = $query->simpleQuery('trinder3_panels', 'id_panel', $mod->id_panel); ?>
                            <div class="panel panel-<?php echo $panel->name_panel ?> ">
                                <div class="panel-heading">
                                    <?php if ($contador > 0) { ?>
                                        <div class="text-muted bootstrap-admin-box-title" style="color:white; ">Tabela de gerenciamento de <strong><?php echo str_replace('_', ' ', $_GET['m']);  ?></strong></div>
                                    <?php } else { ?>
                                        <div class="text-muted bootstrap-admin-box-title" style="color:white; ">Nenhum registro localizado em "<strong><?php echo ucfirst(str_replace('_', ' ',$_GET['m'])); ?></strong>"</div>
                                    <?php } ?>
                                </div>
                                <?php if ($contador > 0) { ?>
                                    <div class="bootstrap-admin-panel-content">
                                        <table class="table bootstrap-admin-table-with-actions">
                                            <?php
                                            //-> pega os nomes dos campos da tabela numerados
                                            $field = $fields->simpleFields('tb_' . $_GET['m']);
                                            
                                            foreach ($field as $key => $value) {$campos[] = $key;}
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="width: 77%"><?php echo ucfirst(str_replace('_', ' (', $campos[1])) ?>)</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($cadastro = mysqli_fetch_array($cadastros)) { ?>
                                                    <tr class="<?php echo $i % 2 == 0 ? 'actions' : 'warning' ?> ">
                                                            <?php $i++; ?>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $cadastro[$campos[1]] ?></td>
                                                        <td style="width: 20%;">
                                                            <a href="MODULE.php?a=<?php echo $cadastro[$campos[0]] ?>&m=<?php echo $_GET['m'] ?>">
                                                                <button class="btn btn-sm btn-primary">
                                                                    <i class="glyphicon glyphicon-pencil"></i> Editar
                                                                </button>
                                                            </a>
                                                            
                                                            <a href="#" onclick="confirmDel(<?php echo $cadastro[$campos[0]]?>)">
                                                                <button class="btn btn-sm btn-danger">
                                                                    <i class="glyphicon glyphicon-trash"></i> Excluir
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <script>
        $(function(){
            $("#alert").fadeIn(700, function(){
                window.setTimeout(function(){
                    $('#alert').fadeOut();
                }, 5000);
            });
        });
        
        function confirmDel(id){
            if (confirm("Deseja realmente excluir esse cadastro?")) {
                location.href='includes/adicional_module/<?php echo $_GET['m'] ?>/CONTROLLER.php?m=<?php echo $_GET['m'] ?>&id=<?php echo $id->id_table ?>&delete='+id;
            }
        }
        </script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
