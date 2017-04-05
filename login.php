<?php 
    $alerta="";
    include_once("includes/connection.php");

    if(isset($_POST['btn_login'])){
        $nickname=$_POST['txt_nickname'];
        $senha=$_POST['txt_senha'];
        $sql="SELECT u.* , n.* FROM tbl_usuario u, nivel_usuario n where nick_name ='".$nickname."' and senha ='".$senha."' and u.id_nivel = n.id_nivel ";
        echo($sql);
        $select=mysql_query($sql);
        if($rs=mysql_fetch_array($select)){
            $_SESSION['nome-usuario']=$rs['nome'];
            $_SESSION['nivel-titulo']=$rs['titulo'];
            $_SESSION['nivel-usuario']=$rs['id_nivel'];
            $_SESSION['nickname']=$rs['nick_name'];
            header("location:view/cms/home.php");
            
        }
        
    }

?>
<!DOCTYPE html >
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
    <script language="JavaScript" src="JQuery/jquery11.js" type="text/javascript"></script>
	<script language="JavaScript" src="JQuery/Jcycle.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Maktub leads</title>
    <script type="text/javascript">
		$(function(){
			$("#slider ul").cycle ({
				fx:'fade',
				speed : 1000 ,
				timeout : 2000 , 
				prev :'#anterior',
				next:'#proxima',
			})
		})
	</script>
</head>
    <body>
         <div id="container_login">
            <div id="container_img_login">
                <img alt="logo" title="logo"src="imagens/logo_corretora.jpg";>
            </div>
            <div id="container_form_login">
                
                 <form name="frm_login" action="#" method="post">
                        
                     <p class="lbl_login">Nickname : <input class="input" type="text" name="txt_nickname" required placeholder="Nickname cadastrado">
                     </p>
                     <p class="lbl_login">
                     Senha :      <input class="input" type="password" name="txt_senha" required placeholder="********" >
                     </p>
                     <p  class="lbl_login"><input id="btn_login" type="submit" value="Entrar" name="btn_login"  ></p>
                </form>
            </div>
            <div id="alert">
                <?php echo ($alerta); ?>
            </div>
        </div>
    </body>
</html>