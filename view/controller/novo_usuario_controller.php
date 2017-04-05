<?php
    require_once('../../includes/connection.php');    
    $alerta="";
    $txt_nome = "";
    $txt_nick_name="";
    $txt_senha="";
    $txt_confirmar="";
    $slc_nivel="";
    $valor_botao="Cadastrar";
    
    if(isset($_GET['m'])){$modo=$_GET['m'];}else{$modo="";} 
 
    $id_select=0;
    if(isset($_GET['id']))$id=$_GET['id'];
    

    if ($modo=="a"){
        
    }else if(isset($_GET['m'])=="e"){
        $valor_botao = "Salvar" ;
    
        $sql="SELECT * FROM tbl_usuario where id_usuario=".$id;
        $executar = mysql_query($sql);
        $rs=mysql_fetch_array($executar);
        
        $id_select=$rs['id_nivel'];
        
        $txt_nome = $rs['nome'];
        $txt_nick_name=$rs['nick_name'];
        $txt_senha=$rs['senha'];
        $txt_confirmar=$rs['senha'];
        $slc_nivel=$rs['id_nivel'];
    }
    if(isset($_POST['btn_cadastrar'])){
        $verificar_botao=$_POST['btn_cadastrar'];
        
        $nome = $_POST['txt_nome'];
        $txt_nickname = $_POST['txt_nickname'] ;
        $senha=$_POST['txt_senha'];
        $confirmar=$_POST['txt_confirmar'];
        $nivel=$_POST['slc_nivel'];
        
        if($senha==$confirmar){
            if($verificar_botao=="Cadastrar"){
                    $insert="insert into tbl_usuario( nome , nick_name,senha, id_nivel )values ('".$nome."' ,'".$txt_nickname."' ,'".$senha."','".$nivel."')";
                    
                    
                }else if($verificar_botao=="Salvar"){
                    $insert="UPDATE tbl_usuario SET nome ='".$nome."', nick_name='".$txt_nickname."', senha='".$senha."', id_nivel='".$nivel."' WHERE id_usuario='".$id."';";

                }
                mysql_query($insert);
                
                header('location:usuarios.php');
        }else{
            $alerta="As senhas não coincidem";
        }
    }
    
    ?>