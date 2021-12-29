
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..:: Trinder Administrator - Administrador de Sites - Vers&atilde;o 2.0 ::.. - Walter Designer Team | Developer for <?php echo $globais['nomeEmpresa'] ?></title>
<!-- load css -->
<link href="css/style000.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-- load script -->
<?php if ($_GET['page'] != 'menu.php') { ?>
    <script type="text/javascript" src="js/jquery00.js"></script>
    <script type="text/javascript" src="js/interfac.js"></script>
<?php } else { ?>
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <link type="text/css" href="css/blitzer/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<?php } ?>
<script type="text/javascript">
    $(document).ready(
    function()
    {
        $('#dock').Fisheye(
        {
            maxWidth: 50,
            items: 'a',
            itemsText: 'span',
            container: '.dock-container2',
            itemWidth: 40,
            proximity: 90,
            halign : 'center'
        }
    )
        $('#dock2').Fisheye(
        {
            maxWidth: 60,
            items: 'a',
            itemsText: 'span',
            container: '.dock-container2',
            itemWidth: 40,
            proximity: 80,
            alignment : 'left',
            valign: 'bottom',
            halign : 'center'
        }
    )
    }
);
</script>
