<?php
    require_once('../model/conection.php');
    require_once('../controller/novo_cliente_controller.php');
?>
<!DOCTYPE html >
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name ="viewport"content="width=device-width, initial scale=1,user-scale=no">
	<title>Maktub leads</title>
    <script type="text/javascript">
        <!--
        function MM_jumpMenu(targ,selObj,restore){ 
          eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
          if (restore) selObj.selectedIndex=0;
        }
        //-->
    </script>
</head>
    <body>
    	<header>
            <?php require_once('includes/menu.php')?>
        </header>
        <div id="conteudo_ncliente">
           <div id="cabecalho_add">
                Informe os dados do cliente :
            </div>
                <form name="frm_add_usuario" method="post" action="novo_cliente.php?ide=<?php echo($_GET['ide'])?>">
                    <div class="container_add_usuario_d">
                        <table>
                            <tr>
                                <td><label  class="input-label">Estado :</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)" name="slc_estados" >
                                        <?php 
                                            if(isset($_GET['ide'])){
                                                $id_estado=$_GET['ide'];
                                                $select = "SELECT * FROM estados where cod_estados=".$id_estado;
                                                $res = mysql_query($select);
                                                echo("123");
                                                while($row = mysql_fetch_array($res)){
                                                    $value="novo_cliente.php?ide=".$row['cod_estados'];
                                                    echo("123");
                                                    ?>
                                                    <option value="novo_cliente.php?ide=<?php echo($row['cod_estados'])?>"><?php echo  $row['nome']?></option>
                                                    <?php
                                                }
                                            }        
                                            
                                            
                                            $select = "SELECT * FROM estados where cod_estados <>".$id_estado;
                                            $res = mysql_query($select);
                                            while($row = mysql_fetch_array($res)){

                                        ?>
                                            <option value="novo_cliente.php?ide=<?php echo($row['cod_estados'])?>"><?php echo  $row['nome']?></option>
                                        <?php } ?>
                                     </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="input-label">Cidade :</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="slc_cidade" >
                                        <?php 
                                            if(isset($_GET['ide'])){
                                                $id_estado=$_GET['ide'];

                                            }        

                                            $select = "SELECT * FROM cidades   where estados_cod_estados = ".$id_estado." order by nome";


                                            $res = mysql_query($select);
                                            while($row = mysql_fetch_array($res)){

                                        ?>
                                            <option value="<?php echo($row['cod_cidades'])?>"><?php echo($row['nome']) ?></option>
                                        <?php } ?>
                                     </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label  class="input-label">Tipo de produto :</label></td>
                            </tr>
                            <tr >
                                <td>
                                    <select name ="slc_tipo_produto">
                                        <?php 
                                            $query = "SELECT * FROM tipo_produto";
                                            $load = mysql_query($query);
                                            while($row = mysql_fetch_array($load)){
                                        ?>
                                       <option value="<?php echo($row['id_tipo_produto'])?>" ><?php echo($row['titulo']) ?></option>
                                       <?php }?>
                                       
                                    </select>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td><label for="text-senha" class="input-label">Ocupação :</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <select  name="slc_ocupacao" >				  
                                            <?php $select ="SELECT * FROM ocupacao_cliente";
                                                  $res= mysql_query($select);
                                                  while ($row = mysql_fetch_array($res)){
                                            ?>
                                        <option value="<?php echo($row['id_ocupacao']) ?>"><?php echo($row['titulo'])?></option>
                                        <?php }?>    					   
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="text-senha" class="input-label">Produto Interesse :</label></td>
                            </tr>
                            <tr>
                                <td><select  name="slc_produto" >				  
                                        <?php $select ="SELECT * FROM produto_interesse";
                                              $res= mysql_query($select);
                                              while ($row = mysql_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo($row['id_produto']) ?>"><?php echo($row['titulo'])?></option>
                                        <?php }?>    					   
                                    </select>
                                </td>
                            </tr>
                        
                            <tr>
                                <td><label  class="input-label">Telefone(s)</label></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="text-input" name="txt_telefone_1" placeholder="Obrigatorio **" value=""/></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="text-input" name="txt_telefone_2" placeholder="Digite o telefone" value=""/></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="text-input" name="txt_telefone_3" placeholder="Digite o telefone" value=""/></td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="container_add_usuario_d">
                        <table>
                            <tr>
                                <td><label  class="input-label">Nome **</label></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="text-input" name="txt_nome" placeholder="Digite o nome" required value="" /></td>
                            </tr>
                            
                            <tr>
                                <td><label  class="input-label">Email **</label></td>
                            </tr>
                            <tr>
                                <td><input type="email"  class="text-input" name="txt_email" placeholder="Digite o email" required  value=""/></td>
                            </tr>
                            <tr>
                                <td><label  class="input-label">CPF/CNPJ **</label></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="text-input" name="txt_cpf" placeholder="CPF ou CNPJ da empresa" value=""></td>
                            </tr>
                            <tr>
                                <td><label class="input-label">Total de vidas</label></td>
                            </tr>
                            <tr>
                                <td><input type="text"  class="text-input" name="txt_vidas" placeholder=""   value="0"/></td>
                            </tr>
                            <tr>
                                <td><label  class="input-label">Observação</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" id="text-celular" class="text-input" name="txt_obs" placeholder="obs" value=""/></td>
                            </tr>
                            <tr>
                                <td><label  class="input-label" required >Data para contato ** </label></td>
                            </tr>
                            <tr>
                                <td><input type="date"  class="text-input" name="date_contato" placeholder="dd/mm/aaaa" value=""/></td>
                            </tr>
                            <tr>
                                <td><label  class="input-label">Corretor :</label></td>
                            </tr>
                            <tr>
                                <td><select  name="slc_corretor" >				  
                                        <?php $select ="SELECT * FROM usuario where id_nivel = 2";
                                              $res= mysql_query($select);
                                              while ($row = mysql_fetch_array($res)){
                                        ?>
                                        <option value="<?php echo($row['id_usuario']) ?>"><?php echo($row['nome'])?></option>
                                        <?php }?>    					   
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" id="submit-input"  name="btn_salvar" value="salvar"/></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <div id="alerta_add">
                    Campos marcados com ** são obrigatorios
                </div>
        </div>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>