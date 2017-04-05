<?php
    require_once('../../includes/connection.php');
?>
<!DOCTYPE html >
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name ="viewport"content="width=device-width, initial scale=1,user-scale=no">
	<title>alpha beneficios leads</title>
    
</head>
    <body>
    
    	<header>
            <?php require_once('includes/menu.php')?>
        </header>
        <div id="conteudo_usuarios">
            <div id="cabecalho_usuarios">
                Usuarios cadastrados  :
                <div id="base_imagem_add">
                    <a href="novo_usuario.php?m=a">
                    <img alt="adicionar novo usuario" title="adicionar novo usuario" src="imagens/icone_adiconar.png"id="icone_add"></a>
                </div>
            </div>
            <div id="lista_usuarios">
                <?php $sql = "SELECT u.* ,n.titulo FROM tbl_usuario u ,nivel_usuario n where n.id_nivel = u.id_nivel and u.nome <>'".$_SESSION['nome-usuario']."';"  ;
                    $select = mysql_query($sql);   
                    while($rs=mysql_fetch_array($select)){
                ?>
                <a class="link_usuarios" title="detalhes -<?php echo($rs['nome'])?>" href="detalhes_usuario.php?id=<?php echo($rs['id_usuario']);?>"> 
                    <div class="item_lista">
                    
                        <span class="alinhar"><?php echo ($rs['nome']." - ".$rs['titulo'])?></span>
                        <div class="containner_editar">
                              <img id="item_editar" src="imagens/icone_editar.png">
                        </div>
                    
                    </div>
                </a>
                <?php }?>
            </div>
        </div>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>
