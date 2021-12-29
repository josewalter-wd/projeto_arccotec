<?php include './includes/engine.php'; ?>

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
                                Área de Trabalho <small>módulos e estatísticas</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fas fa-tachometer-alt"></i> Área de trabalho
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- texto de boas vindas - GERAR TABELA DE ACORDO COM A QUANTIDADES DE LOGINS -->
                            <div class="alert alert-info alert-dismissable" id="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-cog fa-spin"></i>  Bem vindo <strong> <?php echo $_SESSION['name'] ?> </strong> n&oacute;s esperamos que goste da nova vers&atilde;o do seu administrador!
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- modulos incorporados e adicionais -->
                        <?php $modulos = $query->totalQuery('trinder3_modules', 'id_module', 'ASC'); ?>
                        <?php while ($modulo = mysqli_fetch_object($modulos)) { ?>
                            <?php $panel = $query->simpleQuery('trinder3_panels', 'id_panel', $modulo->id_panel); ?>
                            <?php $cont = $query->totalCont($modulo->table_module, $modulo->id_table, 'ASC'); ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-<?php echo $panel->name_panel ?> ">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3" >
                                                <i class="fa fa-<?php echo $modulo->fontAnsome_module ?> fa-5x"style="margin: 5px 0 0 10px"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"><b><?php echo $cont ?></b></div>
                                                <div style=" margin-left:19px; min-height: 45px; font-weight: bold;"><?php echo ucfirst(str_replace('_', ' ', substr($modulo->table_module, '3'))); ?> no sistema</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($modulo->adicional_module == 0){ ?>
                                        <a href="LIST.php?m=<?php echo str_replace('tb_', '', $modulo->table_module) ?>">
                                    <?php }else{ ?>
                                        <a href="MODULE.php?m=<?php echo str_replace('tb_', '', $modulo->table_module) ?>&p=LIST">
                                    <?php } ?>
                                        
                                        <div class="panel-footer">
                                            <span class="pull-left">Gerenciar <?php echo str_replace('_', ' ', substr($modulo->table_module, '3')); ?></span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- /.row -->
                        
                    </div>
                    <!-- / -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Visitas ANO-MES</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="morris-area-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> &Uacute;ltimas atualizações</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?php $icon = array('UPD' => 'fa-check-circle', 'INS' => 'fa-check', 'DEL' => 'fa-remove',); ?>
                                        <?php $updates = $query->queryWithLimit('trinder3_updates', 'dtInsert_update', '10', 'DESC'); ?>
                                        <?php while ($update = mysqli_fetch_object($updates)) { ?>
                                            <a href="#" class="list-group-item">
                                                <span class="badge"><?php echo date('d/m/Y', strtotime($update->dtInsert_update)); ?> &agrave;s <?php echo date('H:i:s', strtotime($update->dtInsert_update)); ?></span>
                                                <i class="fa fa-fw <?php echo $icon[$update->type_update] ?>"></i> <?php echo $update->description_update ?>
                                            </a>
                                        <?php } ?>
                                        <!-- ver tudo --
                                        <a href="#" class="list-group-item">
                                            <span class="badge">12/09/16 &agrave;s 18:30</span>
                                            <i class="fa fa-fw fa-remove"></i> Excuído modulo: "Notícias" [FULANO DE TAL]
                                        </a>
                                        
                                        <a href="#" class="list-group-item">
                                            <span class="badge">12/09/16 &agrave;s 18:30</span>
                                            <i class="fa fa-fw fa-check-circle"></i> Cadastrado modulo: "Notícias" [FULANO DE TAL]
                                        </a>
                                        <!-- ver tudo -->
                                    </div>

                                    <!-- ver tudo --
                                    <div class="text-right">
                                        <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                    <!-- / -->
                                </div>
                            </div>
                        </div>
                        <!-- ecommerce --
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Order #</th>
                                                    <th>Order Date</th>
                                                    <th>Order Time</th>
                                                    <th>Amount (USD)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3326</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:29 PM</td>
                                                    <td>$321.33</td>
                                                </tr>
                                                <tr>
                                                    <td>3325</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:20 PM</td>
                                                    <td>$234.34</td>
                                                </tr>
                                                <tr>
                                                    <td>3324</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:03 PM</td>
                                                    <td>$724.17</td>
                                                </tr>
                                                <tr>
                                                    <td>3323</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:00 PM</td>
                                                    <td>$23.71</td>
                                                </tr>
                                                <tr>
                                                    <td>3322</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:49 PM</td>
                                                    <td>$8345.23</td>
                                                </tr>
                                                <tr>
                                                    <td>3321</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:23 PM</td>
                                                    <td>$245.12</td>
                                                </tr>
                                                <tr>
                                                    <td>3320</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:15 PM</td>
                                                    <td>$5663.54</td>
                                                </tr>
                                                <tr>
                                                    <td>3319</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:13 PM</td>
                                                    <td>$943.45</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-right">
                                        <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / -->
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

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <!-- Grafico acessos externo --
        <script src="js/plugins/morris/morris-data.js"></script>
        <!-- / -->
        <script>
            // Morris.js Charts sample data for SB Admin template

            $(function () {

                // Area Chart
                Morris.Area({
                    element: 'morris-area-chart',
                    data: [{
                            period: '2016-01',
                            visitas: 145,
                            unicos: 20
                        }, {
                            period: '2016-02',
                            visitas: 245,
                            unicos: 50
                        }, {
                            period: '2016-03',
                            visitas: 345,
                            unicos: 70
                        }, {
                            period: '2016-04',
                            visitas: 45,
                            unicos: 50
                        }, {
                            period: '2016-05',
                            visitas: 25,
                            unicos: 90
                        }, {
                            period: '2016-06',
                            visitas: 55,
                            unicos: 20
                        }, {
                            period: '2016-07',
                            visitas: 245,
                            unicos: 40
                        }, {
                            period: '2016-08',
                            visitas: 245,
                            unicos: 10
                        }],
                    xkey: 'period',
                    ykeys: ['visitas', 'unicos'],
                    labels: ['Visitas', 'Únicos'],
                    pointSize: 2,
                    hideHover: 'auto',
                    resize: true
                });



            });

        </script>
        <script>
            $(function () {
                $("#alert").fadeIn(700, function () {
                    window.setTimeout(function () {
                        $('#alert').fadeOut();
                    }, 5000);
                });
            });
        </script>

    </body>

</html>
