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

                <!-- template sections -->

                <section class="page_topline ds section_padding_top_5 section_padding_bottom_5 table_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 text-center text-sm-left">
                                <p class="divided-content darklinks">
                                    <span class="black">Olá! Hoje é dia <?php echo date(j) ?> de <?php echo $meses[date(n)] ?> de <?php echo date(Y) ?></span>
                                    
                                </p>
                            </div>
                            <div class="col-sm-4 text-center text-sm-right">
                                <a href="certificado.php">Validar certificado</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="page_toplogo table_section table_section_md ls section_padding_top_30 section_padding_bottom_30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 text-center text-md-left">
                                <a href="index.php" class="logo top_logo">
                                    <img src="images/top-logo.png" alt="">                                    
                                </a>

                                <!-- header toggler -->
                                <span class="toggle_menu">
                                    <span></span>
                                </span>
                            </div>
                            <div class="col-md-8 text-center text-md-right">

                                <div class="inline-teasers-wrap">
                                    <div class="media small-teaser">
                                        <div class="media-left media-middle">
                                            <div class="teaser_icon highlight size_normal">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h6 class="weight-black text-uppercase bottommargin_5">
                                                <?php echo $institucional->telefone_institucional ?>
                                            </h6>
                                            <p class="small-text small lightgrey">
                                                <?php echo $institucional->endereco_institucional ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="media small-teaser">
                                        <div class="media-left media-middle">
                                            <div class="teaser_icon highlight2 size_normal">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h6 class="weight-black text-uppercase bottommargin_5">
                                                Hor&aacute;rio de funcionamento
                                            </h6>
                                            <p class="small-text small lightgrey">
                                                <?php echo $institucional->horarioFuncionamento_institucional ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </section>

                <header class="page_header header_white toggler_left with_top_border">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 display_table">

                                <div class="header_mainmenu display_table_cell">
                                    <!-- main nav start -->
                                    <nav class="mainmenu_wrapper">
                                        <ul class="mainmenu nav sf-menu">
                                            <li class="active">
                                                <a href="index.php">Inicial</a>
                                            </li>
                                            
                                            <li>
                                                <a href="institucional.php">Institucional</a>
                                            </li>
                                                                                       
                                            <li>
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

                <section class="intro_section page_mainslider ds">
                    <div class="flexslider" data-dots="false">
                        <ul class="slides">
                            <?php $banners = $query->totalQuery('tb_banners', 'rand()', 'ASC'); ?>
                            <?php while ($banner = mysqli_fetch_object($banners)) { ?>
                            <li>
                                <img src="images/banners/<?php echo $banner->imagem_banner; ?>" alt="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <div class="slide_description_wrapper">
                                                <div class="slide_description">
                                                    <div class="intro-layer" data-animation="fadeInUp">
                                                        <h3>
                                                            <?php echo $banner->titulo_banner; ?>
                                                        </h3>
                                                    </div>
                                                    <div class="intro-layer" data-animation="fadeInUp">
                                                        <?php echo $banner->descricao_banner; ?>
                                                    </div>
                                                    <div class="intro-layer" data-animation="fadeInUp">
                                                        <a href="<?php echo $banner->link_banner; ?>" class="theme_button color2 wide_button">Veja mais!</a>
                                                    </div>
                                                </div>
                                                <!-- eof .slide_description -->
                                            </div>
                                            <!-- eof .slide_description_wrapper -->
                                        </div>
                                        <!-- eof .col-* -->
                                    </div>
                                    <!-- eof .row -->
                                </div>
                                <!-- eof .container -->
                            </li>
                            <?php } ?>
                            

                        </ul>
                    </div>
                    <!-- eof flexslider -->

                </section>

                <?php if(!$detect->isMobile()){ ?>
                <section class="ls ms section_padding_top_100 section_padding_bottom_75 columns_padding_25 columns_margin_bottom_30">
                    <div class="container">
                        <div class="row">
                            <?php $vantagens = $query->queryWithLimit('tb_vantagens', 'rand()', '4', 'ASC'); ?>
                            <?php while ($vantagem = mysqli_fetch_object($vantagens)) { ?>
                                <div class="col-md-3 col-sm-6 to_animate" data-animation="pullUp">
                                    <div class="teaser text-center">
                                        <div class="teaser_icon main_bg_color hover-icon round size_small">
                                            <i class="fa <?php echo $vantagem->icone_vantagem ?>" aria-hidden="true"></i>
                                        </div>
                                        <h4 class="poppins hover-color2">
                                            <a href="#"><?php echo $vantagem->titulo_vantagem ?></a>
                                        </h4>
                                        <?php echo $vantagem->descricao_vantagem ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <?php } ?>
                <?php if(!$detect->isMobile()){ ?>
                <section class="ls page_about section_padding_top_150 section_padding_bottom_150 background_cover">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7 col-md-6 col-sm-offset-5 col-md-offset-6 to_animate" data-animation="fadeInRight">
                                <?php echo $function->text('Texto Inicial'); ?>
                                <div class="inline-teasers-wrap">
                                    <a href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace("/[^0-9]/", "", $institucional->whatsApp_institucional); ?>&text=Ola!%20Acabo%20de%20acessar%20o%20site%20da%20<?php echo $institucional->nome_institucional ?>,%20gostaria%20de%20saber%20mais%20sobre%20" class="theme_button color1 margin_0" style="background-color: limegreen; border-color: lime;" onmouseover="this.style.background='green';" onmouseout="this.style.background='limegreen';" >WhatsApp Direct</a>
                                    <div class="media small-teaser inline-block">
                                        <div class="media-left">
                                            <i class="fa fa-phone highlight size_small" aria-hidden="true"></i>
                                        </div>
                                        <div class="media-body fontsize_20 medium grey">
                                            <?php echo $institucional->telefone_institucional ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?>
                <?php if($detect->isMobile()){ ?>
                <section id="pickup" class="ds page_contact parallax section_padding_top_150 section_padding_bottom_150">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                                <h2 class="section_header">Agende sua visita</h2>
                                <p class="lightgrey underheading"><?php echo $institucional->nome_institucional ?> - <?php echo $institucional->slogan_institucional ?>
                                <form class="contact-form row columns_margin_bottom_20" method="post" action="processos/contact_me.php?form=agendamento">
                                    <input type="hidden" name="to" value="<?php echo $institucional->email_institucional ?>" />
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pickup-name">Nome completo
                                                <span class="required">*</span>
                                            </label>
                                            <i class="fa fa-user highlight2" aria-hidden="true"></i>
                                            <input type="text" aria-required="true" size="30" value="" name="nome" id="pickup-name" class="form-control" placeholder="Nome completo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pickup-phone">Telefone
                                                <span class="required">*</span>
                                            </label>
                                            <i class="fa fa-phone highlight2" aria-hidden="true"></i>
                                            <input type="text" aria-required="true" size="30" value="" name="telefone" id="pickup-phone" class="form-control" placeholder="Telefone">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group select-group">
                                            <label for="pickup-date">Data
                                                <span class="required">*</span>
                                            </label>
                                            <i class="fa fa-calendar highlight2" aria-hidden="true"></i>
                                            <select aria-required="true" id="pickup-date" name="data" class="choice empty form-control">
                                                <option value="" disabled selected data-default>Data</option>
                                                <?php for($i = 1; $i < 8; $i++){ ?>
                                                    <?php $data = date('d/m/Y', strtotime("+$i days")); ?>
                                                    <?php if(date('l', strtotime("+$i days")) != 'Sunday'){ ?>
                                                        <option value="<?php echo $data ?>"><?php echo $data ?> <?php echo ($i == 1)?"(amanhã)":"" ?></option>
                                                    <?php }} ?>
                                            </select>
                                            <i class="fa fa-angle-down theme_button" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group select-group">
                                            <label for="pickup-time">Time
                                                <span class="required">*</span>
                                            </label>
                                            <i class="fa fa-clock-o highlight2" aria-hidden="true"></i>
                                            <select aria-required="true" id="pickup-time" name="hora" class="choice empty form-control">
                                                <option value="" disabled selected data-default>Hora</option>
                                                <option value="08am">08:00</option>
                                                <option value="09am">09:00</option>
                                                <option value="10am">10:00</option>
                                                <option value="11am">11:00</option>
                                                <option value="12am">12:00</option>
                                                <option value="13pm">13:00</option>
                                                <option value="14pm">14:00</option>
                                                <option value="15pm">15:00</option>
                                                <option value="16pm">16:00</option>
                                                <option value="17pm">17:00</option>
                                            </select>
                                            <i class="fa fa-angle-down theme_button" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label for="pickup-message">Mensagem</label>
                                            <i class="fa fa-pencil highlight2" aria-hidden="true"></i>
                                            <textarea aria-required="true" rows="3" cols="45" name="mensagem" id="pickup-message" class="form-control" placeholder="Mensagem"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="contact-form-submit topmargin_40">
                                            <button type="submit" id="pickup-_submit" name="contact_submit" class="theme_button color1">Agende sua visita</button>
                                            <a href="https://api.whatsapp.com/send?phone=55<?php echo preg_replace("/[^0-9]/", "", $institucional->whatsApp_institucional); ?>&text=Ola!%20Acabo%20de%20acessar%20o%20site%20da%20<?php echo $institucional->nome_institucional ?>,%20gostaria%20de%20saber%20mais%20sobre%20" class="theme_button color1 margin_0" style="background-color: limegreen; border-color: lime;" onmouseover="this.style.background='green';" onmouseout="this.style.background='limegreen';" >WhatsApp Direct</a>
                                        </div>
                                        
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?>
                
                <section class="ls ms overflow_hidden half_section section_padding_top_100 section_padding_bottom_150 columns_padding_80">
                    <div class="image_cover image_cover_left">
                        <!-- you can put your image here instead of puting it in column-->
                        <img src="images/condition.jpg" alt="">
                    </div>
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-6">
                                <!-- <img src="images/condition.jpg" alt=""> -->
                            </div>
                            <!-- .col-* -->

                            <div class="col-md-6 to_animate" data-animation="fadeInRight">

                                <h2 class="section_header with_snowflake_icon highlight">
                                    Alguns de nossos servicos
                                </h2>
                                <?php $servicos = $query->queryWithLimit('tb_servicos', 'rand()', '4', 'ASC'); ?>
                                <?php while ($servico = mysqli_fetch_object($servicos)) { ?>
                                    <div class="media big-left-media lineheight-thin">
                                        <div class="media-left media-middle">
                                            <img src="images/servicos/<?php echo $servico->imagem_servico ?>" class="round" alt="" />
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4><?php echo $servico->nome_servico ?></h4>
                                            <?php echo $servico->descricao_servico ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- .col-* -->

                        </div>
                    </div>
                </section>
                
                <?php if(!$detect->isMobile()){ ?>
                <section id="news" class="ls section_padding_100">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2 class="section_header">
                                    Ultimas novidades
                                </h2>
                                <p class="underheading"><?php echo $institucional->nome_institucional ?> - <?php echo $institucional->slogan_institucional ?></p>
                            </div>
                        </div>
                        <div class="row columns_margin_bottom_20 to_animate" data-animation="fadeInUp">
                            <?php $novidades = $query->queryWithLimit('tb_novidades', 'id_novidade', '4', 'DESC'); ?>
                            <?php while ($novidade = mysqli_fetch_object($novidades)) { ?>
                            <div class="col-md-4 col-sm-6">
                                <article class="vertical-item content-padding with_border text-center rounded overflow-hidden">
                                    <div class="item-media">
                                        <img src="images/novidades/<?php echo $novidade->imagem_novidade ?>"  alt="">
                                        <div class="media-links">
                                            <a href="<?php echo $novidade->link_novidade ?>" class="abs-link" target="_blank"></a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <h4 class="entry-title">
                                            <?php echo $novidade->titulo_novidade ?>
                                        </h4>
                                        <?php echo $novidade->descricao_novidade ?>
                                        <p class="colorlinks small-text">
                                            <a href="<?php echo $novidade->link_novidade ?>" target="_blank">Leia mais!</a>
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <?php } ?>
                <?php if(!$detect->isMobile()){ ?>
                <section id="reviews" class="ds parallax page_testimonials section_padding_top_150 section_padding_bottom_150">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 text-center">

                                <div class="owl-carousel testimonials-owl-carousel" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-dots="false" data-nav="true">
                                    <?php $depoimentos = $query->totalQuery('tb_depoimentos', 'rand()', 'ASC'); ?>
                                    <?php while ($depoimento = mysqli_fetch_object($depoimentos)) { ?>
                                        <blockquote class="with_quotes text-center">
                                            <img src="images/depoimentos/<?php echo $depoimento->imagemCliente_depoimento ?>" alt="" /> <?php echo $depoimento->depoimento_depoimento ?>
                                            <div class="item-meta">
                                                <h4 class="bottommargin_10"><?php echo $depoimento->nomeCliente_depoimento ?></h4>
                                                <p class="small-text highlight"><?php echo $depoimento->descricaoCliente_depoimento ?></p>
                                            </div>
                                        </blockquote>
                                    <?php } ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?>
                <section id="faq" class="ls section_padding_top_150 section_padding_bottom_150">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2 class="section_header">
                                    Perguntas Frequentes
                                </h2>
                                <p class="underheading"><?php echo $institucional->nome_institucional ?> - <?php echo $institucional->slogan_institucional ?></p>
                            </div>
                        </div>
                        <div class="row columns_margin_top_60 to_animate" data-animation="fadeInUp">
                            <?php $perguntas = $query->queryWithLimit('tb_perguntas', 'rand()', '3', 'ASC'); ?>
                            <?php while ($pergunta = mysqli_fetch_object($perguntas)) { ?>
                                <div class="col-md-4">
                                    <div class="teaser with_border rounded text-center lineheight_thin">
                                        <div class="teaser_icon main_bg_color2 round offset_icon size_small">
                                            <span class="weight-black">?</span>
                                        </div>
                                        <h4 class="poppins">
                                                <?php echo $pergunta->pergunta_pergunta ?>
                                        </h4>
                                            <?php echo $pergunta->resposta_pergunta ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row topmargin_30 to_animate" data-animation="fadeInUp">
                            <div class="col-sm-12 text-center">
                                <a href="perguntas.php" class="theme_button color1 wide_button">Veja mais perguntas</a>
                            </div>
                        </div>
                    </div>
                </section>
                <?php if(!$detect->isMobile()){ ?>
                <section class="ls page_map" data-address="Guarujá - State of São Paulo">
                    <!-- marker description and marker icon goes here -->
                    <div class="map_marker_description">
                        <h3></h3>
                        <p></p>
                        <img class="map_marker_icon" src="images/map_marker_icon.png" alt="">
                    </div>
                </section>

                <section class="cs section_padding_top_30 section_padding_bottom_30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 to_animate" data-animation="fadeInLeft">
                                <div class="media small-teaser teaser inline-block">
                                    <div class="media-left media-middle">
                                        <div class="teaser_icon light_bg_color big_bg highlight round size_xsmall">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="media-body media-middle">
                                        <span class="fontsize_20 medium black"><?php echo $institucional->telefone_institucional ?></span>
                                        <br>
                                        <span class="small-text small-spacing lightgrey"><?php echo $institucional->endereco_institucional ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 to_animate" data-animation="fadeInLeft">
                                <div class="media small-teaser teaser inline-block">
                                    <div class="media-left media-middle">
                                        <div class="teaser_icon light_bg_color big_bg highlight round size_xsmall">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                    <div class="media-body media-middle">
                                        <span class="fontsize_20 medium black">Horário de Funcionamento</span>
                                        <br>
                                        <span class="small-text small-spacing lightgrey"><?php echo $institucional->horarioFuncionamento_institucional ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0 to_animate" data-animation="fadeInRight">
                                <div class="widget widget_mailchimp">
                                    <form class="signup topmargin_10" action="" method="get">
                                        <!-- <div class="form-group-wrap"> -->
                                        <div class="form-group margin_0">
                                            <input class="mailchimp_email form-control" name="email" type="email" placeholder="Cadastre seu email ">
                                        </div>
                                        <button type="submit" class="theme_button">Enviar</button>
                                        <!-- </div> -->
                                        <div class="response"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?>
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

        <!-- Google Map Script -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwYSMRGuTsmfl2z_zZDStYqMlKtrybxo"></script>
    </body>

</html>
