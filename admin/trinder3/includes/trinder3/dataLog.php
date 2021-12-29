<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['name'] ?> <b class="caret"></b></a>
<ul class="dropdown-menu">
    <li>
        <a href="MODULE.php?m=conta"><i class="fa fa-fw fa-user"></i> Minha conta</a>
    </li>
    <li>
        <a href="MODULE.php?m=mensagens"><i class="fa fa-fw fa-envelope"></i> Mensagens</a>
    </li>
    <li>
        <a href="MODULE.php?m=configuracoes"><i class="fas fa-cogs"></i> Configurações</a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="../log/index.php?log=logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
    </li>
</ul>