<?php
    require_once('../model/conection.php');
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
        
        <div id="conteudo_detalhes_cliente">
            <?php 
                if(isset($_GET['id'])){
                    $id_lead=$_GET['id'];
                    $sql="SELECT c.* ,cid.nome as nome_cidade,est.nome as nome_estado , crt.nome as crt_nome , tp.titulo as tipo_produto , oc.titulo as ocupacao ,pe.titulo as produto_interesse FROM cidades cid ,cliente c ,estados est , usuario crt, tipo_produto tp, ocupacao_cliente oc , produto_interesse pe where cid.cod_cidades = c.cidade and  c.estado=est.cod_estados and c.id_corretor = crt.id_usuario and oc.id_ocupacao = c.id_ocupacao and tp.id_tipo_produto = c.id_tipo_produto and c.id_produto = pe.id_produto and id_cliente =".$id_lead ;
                    $select=mysql_query($sql);
                    $rs=mysql_fetch_array($select);
                    
                }
            ?>
            <div id="cabecalho_add">
               Detalhes lead :
            </div>
            <div id="container_detalhes_lead">
                <div class="item_impar_detalhes">
                    <label  class="input-label">Nome :</label>
                    <label class="label_detalhes_leads">
                        <?php echo($rs['nome'])?>
                    </label>
                </div>
                <div class="item_par_detalhes">
                    <label  class="input-label">Email : </label>
                    <label class="label_detalhes_leads">
                        <?php echo($rs['email'])?>
                    </label>
                </div>
                <div class="item_impar_detalhes">
                <label  class="input-label">CPF/CNPJ  :</label>
                <label class="label_detalhes_leads">
                    <?php echo($rs['cpf_cnpj'])?>
                </label>
                </div>
                <div class="item_par_detalhes">
                <label class="input-label">Total de vidas :</label><label class="label_detalhes_leads">
                    <?php echo($rs['total_vidas'])?>
                </label>
                </div>
                <div class="item_impar_detalhes">
                    <label  class="input-label" required >Data para contato :</label><label class="label_detalhes_leads">
                    <?php echo($rs['data_contato'])?>
                </label>
                </div>
                <div class="item_par_detalhes">
                    <label  class="input-label" >Corretor :</label><label class="label_detalhes_leads">
                    <?php echo($rs['crt_nome'])?>
                </label>
                </div>
                <div class="item_impar_detalhes">
                <label  class="input-label">Estado :</label>
                <label class="label_detalhes_leads">
                    <?php echo($rs['nome_estado'])?>
                </label>
                </div>
                <div class="item_par_detalhes">
                <label class="input-label">Cidade :</label>
                <label class="label_detalhes_leads">
                    <?php echo($rs['nome_cidade'])?>
                </label>
                </div>
                <div class="item_impar_detalhes">
                <label  class="input-label">Tipo de produto :</label>
                <label class="label_detalhes_leads">
                    <?php echo($rs['tipo_produto'])?>
                </label>
                </div>
                <div class="item_par_detalhes">
                <label for="text-senha" class="input-label">Ocupação :</label>
                <label class="label_detalhes_leads">
                    <?php echo($rs['ocupacao'])?>
                </label>
                </div>
                <div class="item_impar_detalhes">
                    <label for="text-senha" class="input-label">Produto Interesse :</label>
                    <label class="label_detalhes_leads">
                        <?php echo($rs['produto_interesse'])?>
                    </label>
                </div>
                <div class="item_par_detalhes">
                    <label  class="input-label">Telefone :</label><label class="label_detalhes_leads">
                        <?php echo($rs['telefone_1'])?>
                    </label>
                </div>
                <div class="item_impar_detalhes">
                <label  class="input-label">Telefone :</label><label class="label_detalhes_leads">
                    <?php echo($rs['telefone_2'])?>
                </label>
                </div>
                <div class="item_par_detalhes">
                <label  class="input-label">Telefone :</label>

                <label class="label_detalhes_leads">
                    <?php echo($rs['telefone_3'])?>
                </label>
                </div>
                <div class="item_impar_detalhes">
                    <label  class="input-label">Observação :</label>    <label class="label_detalhes_leads">
                    <?php echo($rs['observacao'])?>
                    </label>
                </div>
            </div>
            <div id="inf_adicionais">
                <a href="<?php 
                            $id_tipo = $rs['id_tipo_produto'];
                            if($id_tipo == 1 ){
                                echo("inf_add_adesao.php?id_cliente=".$rs['id_cliente']);
                            }else{
                                 echo("inf_add_pme.php?id_cliente=".$rs['id_cliente']);
                            }
                         ?>">
                <img src="imagens/icone_inf.png" class="icone_detalhes_usuario">
                </a>
                <a href="#">
                <img src="imagens/icone_editar.png" class="icone_detalhes_usuario">
                </a>
            </div>
        </div>
        <footer id="rodape">-
        	<?php require_once('includes/rodape.php')?>
        </footer>
    </body>
</html>
