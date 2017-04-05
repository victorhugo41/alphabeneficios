<?php 
$id_estado=0;
    if(isset($_POST['btn_salvar'])){
            $nome=$_POST['txt_nome'];
            $telefone=$_POST['txt_telefone'];
            $email=$_POST['txt_email'];
            $cpf_cnpj=$_POST['txt_cpf'];
            $vidas=$_POST['txt_vidas'];
            $observacao=$_POST['txt_obs'];
            $data_contato=$_POST['date_contato'];
            $tipo_produto=$_POST['slc_tipo_produto'];
            $estado=$_GET['ide'];
            $cidade=$_POST['slc_cidade'];
            $ocupacao=$_POST['slc_ocupacao'];
            $produto=$_POST['slc_produto'];
            $corretor=$_POST['slc_corretor'];
            $telefone_1=$_POST['txt_telefone_1'];
            $telefone_2=$_POST['txt_telefone_2'];
            $telefone_3=$_POST['txt_telefone_3'];
        
            if($data_contato==""){
                $data_contato="0000-00-00";
            }
        
            $query="INSERT INTO cliente (nome,email,cpf_cnpj,total_vidas,observacao,data_contato,id_tipo_produto,estado,cidade,id_ocupacao,id_produto,id_corretor,id_status,telefone_1,telefone_2,telefone_3)values('".$nome."','".$email."','".$cpf_cnpj."','".$vidas."','".$observacao."','".$data_contato."','".$tipo_produto."','".$estado."','".$cidade."','".$ocupacao."','".$produto."','".$corretor."','3','".$telefone_1."','".$telefone_2."','".$telefone_3."')";
            
           
            mysql_query($query);
            header('location:cadastro.php');
        
    }
?>