<?php
include './includes/engine.php';

//-> alteracao 
if(!empty($_GET['a'])){
    $id = $query->simpleQuery('trinder3_modules', 'table_module', 'tb_'.$_GET['m']);
    $cadastro = $query->simpleQuery('tb_'.$_GET['m'], $id->id_table, $_GET['a']);
}

$geraSenha = new geraSenha(10,  true, true, false)
?>

<?php //var_dump($cadastro) ?>

<!DOCTYPE html>
<html lang="en">

    <<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="WalterDesigner">

        <title>..:: Trinder Administrator <?php echo $globais['trinderVersion']; ?> | Plataforma de Administra&ccedil;&atilde;o e Otimização de Sites e Sistemas ::..</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--  -->

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min_1.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">
        <!--  -->

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <!--  -->

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">
        <!--  -->

        <!-- Custom Fonts -->
        <link href="font-awesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
        <!-- / -->

        <!-- Date and Time Picker -->
        <link rel="stylesheet" type="text/css" href="css/plugins/jquery.datetimepicker.css"/>

        <!-- Font Awesome Piker --
        <link href="css/plugins/font-awesome.css" rel="stylesheet">
        <link href="css/plugins/fontawesome-iconpicker.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


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
                    <a class="navbar-brand" href="index.php">Trinder Administrator 3.0.3 - Plataforma de Administra&ccedil;&atilde;o de Sites e Sistemas</a>
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
                                    <i class="fa fa-edit"></i> <?php echo empty($_GET['a'])?'Cadastrar':'Alterar'; ?> <?php echo str_replace('_', ' ',$_GET['m']) ?>
                                </li>
                                <li class="active">
                                    <i class="fa fa-list"></i> <a href="MODULE.php?m=<?php echo $_GET['m'] ?>&p=LIST">Gerenciar cadastrados </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12" style="width: 80%; margin: auto;">
                            
                            <!-- incluindo alertas -->
                            <?php include './includes/trinder3/alertas.php'; ?>
                            
                            <!-- cadastrar -->
                            <?php if(empty($_GET['a'])){ ?>
                                <form role="form" method="post" action="includes/adicional_module/<?php echo $_GET['m'] ?>/CONTROLLER.php?m=<?php echo $_GET['m'] ?>&c=cadastrar" enctype="multipart/form-data">
                            <?php }else{ ?>
                                <form role="form" method="post" action="includes/adicional_module/<?php echo $_GET['m'] ?>/CONTROLLER.php?a=<?php echo $_GET['a'] ?>&m=<?php echo $_GET['m'] ?>&id=<?php echo $id->id_table ?>" enctype="multipart/form-data">
                            <?php } ?>
                            <!-- alterar -->
                                <?php $field = $fields->simpleFields('tb_' . $_GET['m']); ?>
                            
                                    <?php foreach ($field as $key => $value) { ?>

                                        <?php //var_dump($value) ?> 
                                        <?php $label = explode('_', $key); ?>

                                        <!-- ID -->
                                        <?php if ($value['Extra'] == 'auto_increment') { ?>
                                            <input type="hidden" name="<?php echo $key ?>" value="<?php echo empty($_GET['a']) ? '0' : $_GET['a']; ?>"/>
                                        <?php } ?>

                                        <!-- STRING - varchar(255) -->
                                        <?php if ($value['Type'] == 'varchar(255)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <input class="form-control" name="<?php echo $key ?>" value="<?php echo $cadastro->$key ?>">
                                                <!-- exemplo --
                                                <p class="help-block">Example block-level help text here.</p>
                                                <!--  -->
                                            </div>
                                        <?php } ?>

                                        <!-- FONTAWESOME - varchar(203) -->
                                        <?php if ($value['Type'] == 'varchar(203)') { ?>
                                            <div class="form-group">
                                                <label><a href="http://fontawesome.io/" target="_BLANK">Font Awesome</a></label>
                                                <div class="input-group">
                                                    <input data-placement="bottomRight" class="form-control icp icp-auto" name="<?php echo $key ?>" value="<?php echo $cadastro->$key ?>" type="text" />
                                                    <span class="input-group-addon"></span>
                                                </div>
                                                <div class="action-create" style='display:none;'></div>
                                            </div>
                                        <?php } ?>

                                        <!-- EMAIL - varchar(204) -->
                                        <?php if ($value['Type'] == 'varchar(204)') { ?>
                                            <div class="form-group">
                                                <label>Endere&ccedil;o de email</label>
                                                <input class="form-control" type="email" name="<?php echo $key ?>" value="<?php echo $cadastro->$key ?>" placeholder="email@exemplo.com.br">
                                                <!-- exemplo --
                                                <p class="help-block">Example block-level help text here.</p>
                                                <!--  -->
                                            </div>
                                        <?php } ?>

                                        <!-- URL - varchar(205) -->
                                        <?php if ($value['Type'] == 'varchar(205)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?> (URL)</label>
                                                <input class="form-control" type="url" name="<?php echo $key ?>" value="<?php echo $cadastro->$key ?>" placeholder="http://www.exemplo.com.br">
                                                <!-- exemplo --
                                                <p class="help-block">Example block-level help text here.</p>
                                                <!--  -->
                                            </div>
                                        <?php } ?>

                                        <!-- PASSW0RD - varchar(206) -->
                                        <?php if ($value['Type'] == 'varchar(206)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <input class="form-control" type="password" name="<?php echo $key ?>" value="" >
                                                <!-- exemplo --
                                                <p class="help-block">Example block-level help text here.</p>
                                                <!--  -->
                                            </div>
                                        <?php } ?>

                                        <!-- DISABLE - varchar(207) -->
                                        <?php if ($value['Type'] == 'varchar(207)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <input class="form-control" name="<?php echo $key ?>" value="<?php echo strtoupper($geraSenha->codigo) ?>" disabled="disabled">
                                                <input type="hidden" name="<?php echo $key ?>" value="<?php echo strtoupper($geraSenha->codigo) ?>" />
                                                <!-- exemplo --
                                                <p class="help-block">Example block-level help text here.</p>
                                                <!--  -->
                                            </div>
                                        <?php } ?>

                                        <!-- NUMERAL - int(11) -->
                                        <?php if ($value['Type'] == 'int(11)' && $value['Extra'] != 'auto_increment') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <input class="form-control" type="number" name="<?php echo $key ?>" value="<?php echo $cadastro->$key ?>">
                                            </div>
                                        <?php } ?>

                                        <!-- VALOR - decimal(10,2) -->
                                        <?php if ($value['Type'] == 'decimal(10,2)') { ?>
                                            <label><?php echo ucfirst($label[0]); ?></label>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">R$</span>
                                                <input type="text" class="form-control" name="<?php echo $key ?>" value="<?php echo number_format($cadastro->$key, 2, ',', '') ?>">
                                                <!-- numero redondo --
                                                <span class="input-group-addon">.00</span>
                                                <!--  -->
                                            </div>
                                        <?php } ?>

                                        <!-- RELACIONAL[select] - varchar(21) -->
                                        <?php if ($value['Type'] == 'varchar(21)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[1]); ?></label>
                                                <?php echo $function->createDinamicSelect($link, $value['Default'], $key, $cadastro->$key) ?>
                                            </div>
                                        <?php } ?>
                                        
                                        <!-- BOOLEANO - tinyint(1) -->
                                        <?php if ($value['Type'] == 'tinyint(1)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="<?php echo $key ?>" id="optionsRadios1" value="1" <?php echo $cadastro->$key == 1?"checked='cheked'":"" ?> >Sim &nbsp;&nbsp;
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="<?php echo $key ?>" id="optionsRadios1" value="0" <?php echo $cadastro->$key == 0?"checked='cheked'":"" ?> >N&atilde;o
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <!-- COR - varchar(13) -->
                                        <?php if ($value['Type'] == 'varchar(13)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label><br/>
                                                <input type="color" name="<?php echo $key ?>" value="<?php echo empty($cadastro->$key) ? '#CD150C' : $cadastro->$key ?>"/>
                                            </div>
                                        <?php } ?>

                                        <!-- DATA HORA - timestamp -->
                                        <?php if ($value['Type'] == 'timestamp' && $value['Default'] != 'CURRENT_TIMESTAMP') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label><br/>
                                                <input type="text" id="datetimepicker3" name="<?php echo $key ?>" value="<?php echo $cadastro->$key ?>"/>
                                            </div>
                                        <?php } ?>
                                        
                                        <!-- IMAGEM - varchar(201) -->
                                        <?php if ($value['Type'] == 'varchar(201)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?> <small> (Proporção da imagem - <?php echo str_replace('.jpg', '', $value['Default']) ?>px)</small></label>
                                                <input type="file" name="arquivo[<?php echo $key ?>]">
                                            </div>
                                        <?php } ?>

                                        <!-- DOCUMENTO - varchar(202) -->
                                        <?php if ($value['Type'] == 'varchar(202)') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <input type="file" name="<?php echo $key ?>">
                                            </div>
                                        <?php } ?>

                                        <!-- TEXTO SIMPLES - text -->
                                        <?php if ($value['Type'] == 'text') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <textarea id="ckeditor_standard" name="<?php echo $key ?>"><?php echo $cadastro->$key ?></textarea>
                                            </div>
                                        <?php } ?>

                                        <!-- TEXTO COMPLETO - longtext -->
                                        <?php if ($value['Type'] == 'longtext') { ?>
                                            <div class="form-group">
                                                <label><?php echo ucfirst($label[0]); ?></label>
                                                <textarea id="ckeditor_full" name="<?php echo $key ?>"><?php echo $cadastro->$key ?></textarea>
                                            </div>
                                        <?php } ?>

                                    <?php } ?>
                                <!--  --
                                <div class="form-group">
                                    <label>Text Input with Placeholder</label>
                                    <input class="form-control" placeholder="Enter text">
                                </div>

                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file">
                                </div>

                                <div class="form-group">
                                    <label>Text area</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Checkboxes</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Checkbox 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Checkbox 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Checkbox 3
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Inline Checkboxes</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">3
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>Radio Buttons</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Inline Radio Buttons</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>Selects</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <textarea id="ckeditor_standard" ></textarea>

                                </div>
                                <div class="form-group">
                                    <textarea id="ckeditor_full" ></textarea>
                                </div>

                                
                                <!--  -->

                                <div class="form-group" style="text-align: center">
                                    
                                    <?php if(empty($_GET['a'])){ ?>
                                        <!-- cadastro -->
                                        <input type="submit" class="btn btn-lg  btn-primary" value="Finalizar o novo cadastro">&nbsp;&nbsp;&nbsp;
                                        <input type="reset" class="btn btn-lg  btn-warning" value="Limpar todos os dados">
                                    <?php }else{ ?>
                                        <!-- alteracao -->
                                        <input type="submit" class="btn btn-lg  btn-primary" value="Finalizar a altera&ccedil;&atilde;o">&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-lg  btn-danger" onclick="location.href='MODULE.php?m=<?php echo $_GET['m'] ?>'&p=LIST" > Cancelar a altera&ccedil;&atilde;o </button>
                                    <?php } ?>
                                        
                                </div>

                            </form>

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

        <!-- WYSIWYG -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/plugins/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="js/plugins/ckeditor/adapters/jquery.js"></script>
        <script type="text/javascript">
            $(function () {
                // CKEditor Standard
                $('textarea#ckeditor_standard').ckeditor({
                    height: '150px',
                    toolbar: [
                        {name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']}, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                        ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'], // Defines toolbar group without name.
                        {name: 'basicstyles', items: ['Bold', 'Italic']}
                    ]
                });

                // CKEditor Full
                $('textarea#ckeditor_full').ckeditor({
                    height: '200px'
                });

            });
        </script>

        <!-- Bootstrap Core JavaScript --
        <script src="js/bootstrap.min.js"></script>

        <!-- Date and Time Piker -->
        <script src="js/plugins/datetimepiker/jquery.datetimepicker.full.js"></script>
        <script>
            jQuery.datetimepicker.setLocale('pt');
            
            $('#datetimepicker3').datetimepicker({
                inline: true,
                value: '<?php echo empty($_GET['a'])?date('Y-m-d H:i:s'):''; ?>',
                format: 'Y-m-d H:i:s'
            });
            
            $('#datetimepicker2').datepiker({
                inline: true,
                value: '<?php echo empty($_GET['a'])?date('Y-m-d'):''; ?>',
                format: 'Y-m-d'
            });
            
            $(function(){
                $("#alert").fadeIn(700, function(){
                    window.setTimeout(function(){
                        $('#alert').fadeOut();
                    }, 5000);
                });
            });
            
        </script>
        
    </body>

</html>
