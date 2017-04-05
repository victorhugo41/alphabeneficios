<?php
    require_once('../controller/novo_usuario_controller.php');
?>
<!DOCTYPE html >
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name ="viewport"content="width=device-width, initial scale=1,user-scale=no">
	<title>Maktub leads</title>
    
</head>
    <body>
    
    	<header>
            <?php require_once('includes/menu.php')?>
        </header>
        <div id="conteudo_add_usuarios">
            <div id="cabecalho_add">
                Insira os dados do usuario :
            </div>
                <form name="frm_add_usuario" method="post" action="novo_usuario.php?id=<?php echo($id);?>">
                    <div class="container_add_usuario_d">
                        <table>
                            <tr>
                                <td><label for="text-nome" class="input-label">Nome</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="text-input" name="txt_nome" placeholder="Digite o nome" required value="<?php echo($txt_nome)?>" /></td>
                            </tr>
                            <tr>
                                <td><label for="text-email" class="input-label">Nickname :</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" id="text-email" class="text-input" name="txt_nickname" placeholder="Digite o nickname" required             value="<?php echo($txt_nick_name)?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="text-senha" class="input-label">Senha</label></td>
                            </tr>
                            <tr>
                                <td><input type="password" id="text-celular" class="text-input" name="txt_senha" placeholder="Digite a senha" required
                                           value="<?php echo($txt_senha)?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="text-senha" class="input-label">Confirmar Senha</label></td>
                            </tr>
                            <tr>
                                <td><input type="password" id="text-celular" class="text-input" name="txt_confirmar" placeholder="Redigite a senha" required
                                           value="<?php echo($txt_confirmar)?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="text-senha" class="input-label">Nivel :</label></td>
                            </tr>
                            <tr >
                                <td>
                                    <select name ="slc_nivel">
                                        <?php 
                                            if($modo=="e"){
                                                $select_option ="SELECT * FROM nivel_usuario where id_nivel=".$id_select ;
                                                $select_ex=mysql_query($select_option);
                                                $rs=mysql_fetch_array($select_ex);
                                                ?><option selected	value="<?php echo($rs['id_nivel'])?>"><?php echo($rs['titulo'])?></option>
                                                       <?php
                                              }	
    
                                            $sql="select * FROM nivel_usuario where  id_nivel <>".$id_select;
                                            $select=mysql_query($sql);
                                            while($rs=mysql_fetch_array($select)){
                                        ?>
                                        <option value="<?php echo($rs['id_nivel']) ?>" ><?php echo($rs['titulo']) ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" id="submit-input" value="<?php echo($valor_botao)?>" name="btn_cadastrar" /></td>
                            </tr>
                            
                        </table>
                    </div>
                </form>
                <div id="alerta_add">
                    <?php echo($alerta)?>
                </div>
            </div>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>
