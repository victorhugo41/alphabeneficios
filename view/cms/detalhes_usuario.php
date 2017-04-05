<?php
    require_once('../../includes/connection.php');
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT u.* , n.titulo FROM tbl_usuario u,nivel_usuario n where u.id_nivel = n.id_nivel and id_usuario=".$id;
        $select =mysql_query($sql);
        $rs=mysql_fetch_array($select);
    }
    if(isset($_GET['exc'])){
        $id=$_GET['exc'];
        
        $exc="delete FROM tbl_usuario where id_usuario =".$id ;
        mysql_query($exc);
        
        header('location:usuarios.php');
    }

?>
<!DOCTYPE html >
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name ="viewport"content="width=device-width, initial scale=1,user-scale=no">
	<title>Maktub leads</title>
    <script type="text/javascript">
        function confirma(id) {
            
            var answer = confirm("Deseja excluir um usuario ?");
            if (answer) {
                //some code
                window.location="detalhes_usuario.php?exc="+id;
            }
        }


    </script>

</head>
    <body>
    
    	<header>
            <?php require_once('includes/menu.php')?>
        </header>
        <div id="conteudo_add_usuarios">
            <div id="cabecalho_add">
                Dados do usuario :  <?php echo($rs['nome']); ?>
            </div>
                <div class="container_detalhes_usuario">
                    <label class="input-label">
                        Nome : 
                    </label>
                    <label class="label_detalhes">
                       <?php echo($rs['nome'])?>
                    </label>
                    <label class="input-label">
                        Nickname : 
                    </label>
                    <label class="label_detalhes">
                       <?php echo($rs['nick_name'])?>
                    </label>
                    
                </div>
                <div class="container_detalhes_usuario">
                    <label class="input-label">
                        nivel : 
                    </label>
                    <label class="label_detalhes">
                       <?php echo($rs['titulo'])?>
                    </label>
                    <label class="input-label">
                        Senha : 
                    </label>
                    <label class="label_detalhes">
                       <?php echo($rs['senha'])?>
                    </label>
                </div>
                <div id="base_icones_detalhes">
                    <a href="novo_usuario.php?m=e&id=<?php echo($rs['id_usuario']);?>" class="link_usuarios">
                        <img class="icone_detalhes_usuario" src="imagens/icone_editar.png">
                    </a>
                    
                    <a onClick="confirma(<?php echo($rs['id_usuario'])?>)"  class="link_usuarios" href="#">
                        <img class="icone_detalhes_usuario" src="imagens/icone_excluir.png">
                    </a>
                </div>
            </div>
            
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>
