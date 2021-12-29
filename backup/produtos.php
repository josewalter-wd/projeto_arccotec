<?php include './includes/engine.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <title>..:: <?php echo $institucional->nome_institucional ?> | <?php echo $institucional->slogan_institucional ?> ::..</title>
        <meta charset="utf-8">
        <!--[if IE]>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animations.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/main.css" class="color-switcher-link">
        <link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <!--[if lt IE 9]>
                <script src="js/vendor/html5shiv.min.js"></script>
                <script src="js/vendor/respond.min.js"></script>
                <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!--[if lt IE 9]>
                <div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
        <![endif]-->

        <div class="preloader">
            <div class="preloader_image"></div>
        </div>

        <!-- search modal -->
        <div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="rt-icon2-cross2"></i>
                </span>
            </button>
            <div class="widget widget_search">
                <form method="get" class="searchform search-form form-inline" action="">
                    <div class="form-group">
                        <input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
                    </div>
                    <button type="submit" class="theme_button">Search</button>
                </form>
            </div>
        </div>

        <!-- Unyson messages modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
            <div class="fw-messages-wrap ls with_padding">
                <!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
                <!--
        <ul class="list-unstyled">
                <li>Message To User</li>
        </ul>
                -->

            </div>
        </div>
        <!-- eof .modal -->

        <!-- wrappers for visual page editor and boxed version of template -->
        <div id="canvas">
            <div id="box_wrapper">


                <header class="page_header header_white toggler_left with_top_border">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 display_table">

                                <div class="header_mainmenu display_table_cell">
                                    <!-- main nav start -->
                                    <nav class="mainmenu_wrapper">
                                        <ul class="mainmenu nav sf-menu">
                                            <li>
                                                <a href="index.php">Inicial</a>
                                            </li>
                                            
                                            <li>
                                                <a href="institucional.php">Institucional</a>
                                            </li>
                                                                                       
                                            <li class="active">
                                                <a href="produtos.php">Produtos</a>
                                            </li>
                                            
                                            <li>
                                                <a href="servicos.php">Servi&ccedil;os</a>
                                                <ul>
                                                    <?php $servicos = $query->totalQuery('tb_servicos', 'nome_servico', 'ASC') ?>
                                                    <?php while ($servico = mysqli_fetch_object($servicos)) { ?>
                                                        <li>
                                                            <a href="servicos.php"><?php echo $servico->nome_servico ?></a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                             
                                            <li>
                                                <a href="galeria.php">Galeria</a>
                                            </li>
                                            
                                            <li>
                                                <a href="perguntas.php">Perguntas Frequentes</a>
                                            </li>
                                            
                                            <li>
                                                <a href="contato.php">Contato</a>
                                            </li>

                                            <li>
                                                <a href="#" class="search_modal_button">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <!-- eof contacts -->
                                        </ul>
                                    </nav>
                                    <!-- eof main nav -->
                                    <!-- header toggler -->
                                    <span class="toggle_menu">
                                        <span></span>
                                    </span>
                                </div>

                                <div class="header_right_buttons display_table_cell text-right">
                                    <a href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace("/[^0-9]/", "", $institucional->whatsApp_institucional); ?>&text=Ola!%20Acabo%20de%20acessar%20o%20site%20da%20<?php echo $institucional->nome_institucional ?>,%20gostaria%20de%20saber%20mais%20sobre%20" class="theme_button color1 margin_0" style="background-color: limegreen; border-color: lime;" onmouseover="this.style.background='green';" onmouseout="this.style.background='limegreen';" >WhatsApp Direct</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="page_breadcrumbs ds parallax section_padding_top_50 section_padding_bottom_50">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2 class="highlight">Produtos - <?php echo $institucional->nome_institucional ?></h2>
                                <ol class="breadcrumb darklinks">
                                    <li>
                                        <a href="index.php">
                                            Inicial
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Vitrine</a>
                                    </li>
                                    <li class="active">Produtos</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ls section_padding_top_100 section_padding_bottom_100 columns_padding_25">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-12">

                                <div class="columns-3">

                                    <ul id="products" class="products list-unstyled">
                                        <?php $produtos = $query->totalQuery('tb_produtos', 'btus_produto', 'ASC') ?>
                                        <?php while ($produto = mysqli_fetch_object($produtos)) { ?>
                                            <li class="product type-product">
                                                <div class="vertical-item content-padding text-center with_border rounded" style="height: 500px;">
                                                    <div class="item-media with_background bottommargin_30">
                                                        <img src="images/produtos/<?php echo $produto->imagem_produto ?>" alt="" />
                                                    </div>
                                                    <div class="item-content">
                                                        <h4 class="poppins bottommargin_10">
                                                            <a href="#"><?php echo $produto->nome_produto ?></a>
                                                        </h4>
                                                        <p class="price">
                                                            <del>
                                                                <span class="amount">R$ <?php echo number_format($produto->valorAntigo_produto , 2, ',', '.')?></span>
                                                            </del> 
                                                            <ins>
                                                                <span class="amount">R$ <?php echo number_format($produto->valorAtual_produto , 2, ',', '.')?></span>
                                                            </ins>
                                                        </p>
                                                        <?php echo $produto->descricao_produto ?>
                                                        <p >
                                                            <a href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace("/[^0-9]/", "", $institucional->whatsApp_institucional); ?>&text=Ola!%20Acabo%20de%20acessar%20o%20site%20da%20<?php echo $institucional->nome_institucional ?>,%20gostaria%20de%20saber%20mais%20sobre%20o%20produto%20<?php echo $produto->nome_produto ?>" class="theme_button color1 margin_0" style="background-color: limegreen; border-color: lime;" onmouseover="this.style.background='green';" onmouseout="this.style.background='limegreen';" >+ Informações via WhatsApp</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>
                                <!-- eof .columns-* -->

                            </div>

                        </div>
                    </div>
                </section>

                <footer class="page_footer ds section_padding_top_100 section_padding_bottom_65 columns_padding_25">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4 col-sm-12 text-center to_animate" data-animation="fadeInUp">
                                <div class="widget">
                                    <a href="index.php" class="logo bg_logo bottommargin_25">
                                        <img src="images/footer-logo.png" alt="">
                                        <span class="logo_text">
                                            <span class="big grey"><?php echo $institucional->nome_institucional ?></span>
                                            <span class="small-text"><?php echo $institucional->slogan_institucional ?></span>
                                        </span>
                                    </a>
                                    <p>
                                        <?php echo $institucional->descricao_institucional ?>
                                    </p>
                                    <div class="line-height-thin">
                                        <div class="media small-teaser inline-block margin_0">
                                            <div class="media-left media-middle">
                                                <i class="fa fa-map-marker highlight" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body media-middle">
                                                <?php echo $institucional->endereco_institucional ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="media small-teaser inline-block margin_0">
                                            <div class="media-left media-middle">
                                                <i class="fa fa-phone highlight" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body media-middle">
                                                <?php echo $institucional->telefone_institucional ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="media small-teaser inline-block margin_0">
                                            <div class="media-left media-middle">
                                                <i class="fa fa-map-marker highlight" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body media-middle colorlinks">
                                                <a href="mailto:<?php echo $institucional->email_institucional ?>"><?php echo $institucional->email_institucional ?></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 text-center to_animate" data-animation="fadeInUp">
                                <div class="widget widget_contact topmargin_10">
                                    <h3>Contato express</h3>
                                    <form class="contact-form topmargin_45" method="post" action="processos/contact_me.php?form=contato-e">
                                        <input type="hidden" name="to" value="<?php echo $institucional->email_institucional ?>" />
                                        <p class="form-group">
                                            <label for="footer-name">Nome <span class="required">*</span></label>
                                            <input type="text" aria-required="true" size="30" value="" name="nome" id="footer-name" class="form-control text-center" placeholder="Seu Nome">
                                        </p>
                                        <p class="form-group">
                                            <label for="footer-email">Telefone <span class="required">*</span></label>
                                            <input type="text" aria-required="true" size="30" value="" name="telefone" id="footer-email" class="form-control text-center" placeholder="Telefone">
                                        </p>
                                        <p class="form-group">
                                            <label for="footer-message">Menssagem</label>
                                            <textarea aria-required="true" rows="3" cols="45" name="mensagem" id="footer-message" class="form-control text-center" placeholder="Menssagem"></textarea>
                                        </p>
                                        <p class="footer_contact-form-submit topmargin_40">
                                            <button type="submit" id="footer_contact_form_submit" name="contact_submit" class="theme_button color1 wide_button">Enviar mensagem</button>
                                        </p>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 text-center to_animate" data-animation="fadeInUp">

                                <div class="widget widget_recent_entries topmargin_10">

                                    <h3 class="widget-title">Últimas novidades</h3>
                                    <ul class="greylinks">
                                        <?php $novidades = $query->queryWithLimit('tb_novidades', 'id_novidade', '4', 'DESC'); ?>
                                        <?php while ($novidade = mysqli_fetch_object($novidades)) { ?>
                                            <li>
                                                <p class="margin_0">
                                                    <a href="<?php echo $novidade->link_novidade ?>">
                                                        <?php echo mb_strimwidth($novidade->descricao_novidade, 0, 100, '...') ?>
                                                    </a>
                                                </p>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </footer>

                <section class="ls page_copyright section_padding_15">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <p class="small-text regular grey">&copy; Copyright 2018 - Design and Developer - <a href="mailto:josewalter@mail.com">WalterDesigner</a></p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <!-- eof #box_wrapper -->
        </div>
        <!-- eof #canvas -->

        <script src="js/compressed.js"></script>
        <script src="js/main.js"></script>
        <script src="js/switcher.js"></script>

    </body>
</html>