<?php 
    require_once('../model/conection.php');
    $alerta="";
    if(isset($_POST['btn_login'])){
        $email = $_POST['txt_email'];
        $senha = $_POST['txt_senha'];
        
        $sql="SELECT u.* ,n.titulo FROM usuario u ,nivel_usuario n where email='".$email."' and senha = '".$senha."' and u.id_nivel = n.id_nivel ;" ;
        
        
        $select = mysql_query($sql);
        
        if($rs=mysql_fetch_array($select)){
			
            $nome = Explode(" ",$rs['nome']);
            $primeiro_nome = $nome[0];
            
            $_SESSION['nivel']=$rs['titulo'];
			$_SESSION['nome']=$primeiro_nome;
            $_SESSION['id_nivel']=$rs['id_nivel'];
            $_SESSION['id_corretor']=$rs['id_usuario'];
            header("location:home.php");
		}else{
		  $alerta = "Usuario ou senha invalidos";
		}
        
    }
?>