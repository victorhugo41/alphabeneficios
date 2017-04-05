<nav id="nav_menu">
    <div id="container_logo">
        <div id="cont_logo_menu">
            <img alt="logo alpha beneficios" title="logo alpha beneficios" src="../../img/alpha-logo.png" id="img_logo" >
        </div>
    </div>
    <div id="container_menu">
        <a href="home.php" class="link_menu">
        <div class="item_menu">
            Leads       
        </div>
        </a>
        <a href="#" class="link_menu">
        <div class="item_menu">
            Fale conosco 
        </div>
        </a>
        <a href="cadastro.php" class="link_menu">
        <div class="item_menu">
            Cadastro
        </div>
        </a>
        <a href="#" class="link_menu">
        <div class="item_menu">
            Relatorio 
        </div>
        </a>
        <a href="usuarios.php" class="link_menu">
        <div class="item_menu">
            Usuarios 
        </div>
        </a>
    </div>
    <div id="container_profile">
        <?php echo($_SESSION['nickname']); ?>
        <div id="aparecer">
            <?php  
                
            ?>
            <div id="cabecalho_perfil">
                <b>Administrador</b>
            </div>
            <a href="detalhes_usuario.php?id=<?php ?>">
                <div class="perfil_sair">
                    Vizualizar perfil
                </div>
            </a>
            <a  href="sair.php?m=logoff">
                <div onclick="confirma(logoff)" class="perfil_sair">
                    Logoff
                </div>
            </a>
            <a onclick="confirma(sair)" href="sair.php?m=sair">
               <div class="perfil_sair">
                    Sair
                </div>
            </a>
        </div>
        
        
    </div>
    
</nav>
<div id="space"></div>