<?php
    require_once('../../includes/connection.php');

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
        <div id="conteudo_cadastro">
            <div id="tipo_cadastro_topo">
                Escolha a forma de cadastro :
                <div id="opcoes_cadastro">
                    <div class="icones_cadastrar">
                        <a alt="digitar dados" title="Digitar dados" href="novo_cliente.php" >
                            <img class="img_cadastrar" src="imagens/icone_digitar.png">
                        </a>
                        
                    </div>
                    <div class="icones_cadastrar">
                        <a alt="Carregar novo arquivo" title="Carregar novo arquivo" href="novo_arquivo.php">
                            <img class="img_cadastrar" src="imagens/icone_upload.png">
                        </a>
                    </div>
                </div>
            </div>
            <div id="cabecalho_direcionar_cadastro">
                Lista de cadastros
            </div>
            <div id="base_lista_cadastros">
                <?php 
                    $query = "SELECT c.* ,p.titulo as produto_ ,t.titulo as tipo_produto , crt.nome as nome_corretor FROM cliente c , tipo_produto  t, produto_interesse p , usuario crt where t.id_tipo_produto = c.id_tipo_produto  and c.id_produto = p.id_produto and c.id_corretor = crt.id_usuario order by id_cliente desc ";
                    $select = mysql_query($query);
                    while($row = mysql_fetch_array($select)){
                ?>
                    <a href="detalhes_lead.php?id=<?php echo($row['id_cliente'])?>">
                        <div class="item_lista_cadastros">
                            <div class="base_dados_cadastros_e">
                                <p class="linha_dados_cadastrados"><b>Nome :</b><?php echo($row['nome']) ?></p>
                                <p class="linha_dados_cadastrados"><b>Corretor : </b><?php echo($row['nome_corretor']) ?></p>
                                <p class="linha_dados_cadastrados"><?php echo($row['produto_']." | ".$row['tipo_produto']) ?> </p>
                            </div>
                            <div class="base_dados_cadastros_d">
                                <p class="linha_dados_cadastrados"><b>id :</b> <?php echo($row['id_cliente']) ?></p>
                                <p class="linha_dados_cadastrados"><b>Data de contato </b> :<?php echo($row['data_contato']) ?></p>
                                <p class="linha_dados_cadastrados">Telefone :</p>   
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>