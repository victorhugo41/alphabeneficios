<?php
    require_once('../../includes/connection.php');
    $image="";
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
        
        <div id="conteudo_leads">
            <div id="cabecalho_home">
                Leads Disponíveis
            </div>
            <div id="base_leads">
                <div id="menu_lateral_leads">
                    
                    <?php 
                        $select = "SELECT * FROM status_negociacao ";
                        $rs = mysql_query($select);
                        while($row =  mysql_fetch_array($rs)){
                            $id_status = $row['id_status'];
                            if($id_status==1){
                                $image="icone_direcionada.png";
                            }else if ($id_status==2){
                                $image="icone_relogio.png";

                            }else if ($id_status==3){
                                $image="icone_negociando.png";

                            }else if ($id_status==4){
                                $image="icone_fechada.png";

                            }else if ($id_status==5){
                                $image="icone_unlike.png";

                            }else if ($id_status==6){
                                $image="icone_invalido.png";

                            }else{
                                $image="icone_direcionada.png";
                            }
                    ?>
                    <a href="home.php?ids=<?php echo($id_status) ?>">
                        <div class="item_menu_lateral">

                            <div class="base_icone_menul">
                                <img class="icone_lateral" alt="icone"title="icone"src="imagens/<?php echo($image) ?>">
                            </div>
                            <div class="texto_menul">
                                    <?php echo($row['titulo'])?>(<?php 
                                
//                                $total_leads_sql ="SELECT * FROM cliente where id_status=".$id_status." and id_corretor =".$_SESSION['id_corretor'];
//                                $cont_leads = mysql_query($total_leads_sql);
//                                $total_leads = mysql_num_rows($cont_leads);
                                
                                
//                                echo($total_leads);

                                ?>)
                            </div>
                            <div class="cont_menul">
                                


                            </div>
                        </div>
                    </a>
                    <?php } ?>
                    
                </div>
                <div id="cabecalho_lista_leads">
                    <b>Direcionadas</b>    
                </div>
                <div id="lista_leads">
                    <?php 
                    
                    if(isset($_GET['ids'])){
                        $id_get_status=$_GET['ids'] ;
                        $query = "SELECT c.* ,p.titulo as produto_ ,t.titulo as tipo_produto , crt.nome as nome_corretor FROM cliente c , tipo_produto  t, produto_interesse p , usuario crt where t.id_tipo_produto = c.id_tipo_produto  and c.id_produto = p.id_produto and c.id_corretor = crt.id_usuario and id_corretor =".$_SESSION['id_corretor']." and id_status =".$id_get_status ;
                        
                    }else{
                        $query = "SELECT c.* ,p.titulo as produto_ ,t.titulo as tipo_produto , crt.nome as nome_corretor FROM cliente c , tipo_produto  t, produto_interesse p , usuario crt where t.id_tipo_produto = c.id_tipo_produto  and c.id_produto = p.id_produto and c.id_corretor = crt.id_usuario and id_corretor =".$_SESSION['id_corretor'] ;    
                    }
                    
                    $select = mysql_query($query);
                    while($row = mysql_fetch_array($select)){
                    ?>
                    <a href="detalhes_lead.php?id=<?php echo($row['id_cliente']) ?>" >
                        <div class="item_lista_leads">
                            <div class="base_dados_leads_e">
                                <p class="linha_dados_leads"><span class="p-bold" >Nome :</span><?php echo($row['nome']) ?></p>
                                <p class="linha_dados_leads"><span class="p-bold" >Corretor : </span><?php echo($row['nome_corretor']) ?></p>
                                <p class="linha_dados_leads"><?php echo($row['produto_']." | ".$row['tipo_produto']) ?> </p>
                            </div>
                            <div class="base_dados_leads_d">
                                <p class="linha_dados_leads"><span class="p-bold" >id :</span> <?php echo($row['id_cliente']) ?></p>
                                <p class="linha_dados_leads"><span class="p-bold" >Data de contato </span> :<?php echo($row['data_contato']) ?></p>
                                <p class="linha_dados_leads">Telefone :</p>   
                            </div>
                        </div>
                    </a>
                <?php } ?>
                </div>
            </div>
            
        </div>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php')?>
        </footer>
    </body>
</html>
