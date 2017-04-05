<?php
    require_once('../model/conection.php');
    
    if(isset($_POST['btn_teste'])){
        $nome_arq =basename($_FILES['input_file']['name']);
        $uploadDir="arquivos_json/"; 
        $uploadfile=$uploadDir.$nome_arq ; 
        echo($nome_arq."<br>");
        $extensao =  end(explode(".", $nome_arq));
        echo($extensao." <br>");
        echo($uploadfile); 
        $json_insert ="INSERT INTO arquivo_json (nome,extensao,status_json)values('".$nome_arq."','".$extensao."','1')";
        mysql_query($json_insert);
        
        
        move_uploaded_file($_FILES['input_file']['tmp_name'],$uploadfile);
    }
    
    $sql="SELECT * FROM arquivo_json";




//    $select=mysql_query($sql);
//    while($row=mysql_fetch_array($select)){
//        
//        $arquivo = "arquivos_json/".$row['nome'];
//        $info = file_get_contents($arquivo);
//        $lendo = json_decode($info);
//        foreach($lendo->usuarios as $campo){
//
//        echo "<br><b>Nome:</b> ".$campo->nome;
//        echo "<br /><b>Idade:</b> ".$campo->idade;
//        echo "<br /><b>E-mail:</b> ".$campo->email;
//        echo "<br /><b>Profissão:</b> ".$campo->profissao;
//            
// }       
//}


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
            <form action="#" method="post"  enctype="multipart/form-data">
                <input type="file" name="input_file">
                <input type="submit" name ="btn_teste"value="Carregar">
            </form>
        </div>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>