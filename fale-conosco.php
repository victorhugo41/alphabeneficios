<!DOCTYPE html >
<?php 
    include_once('includes/connection.php');
    // Inclui o arquivo class.phpmailer.php localizado na pasta class
    require_once("class/class.phpmailer.php");

    // Inicia a classe PHPMailer
    $mail = new PHPMailer(true);

    // Define os dados do servidor e tipo de conexão
    // 

    $mail->IsSMTP(); // Define que a mensagem será SMTP

    
    if (isset($_POST['btn_enviar'])){
        
        $nome=$_POST['txt_nome'];
        $telefone=$_POST['telefone'];
        $email= $_POST['txt_email'];
        
        $query="INSERT into cadastro (nome,email,telefone)values('".$nome."','".$email."','".$telefone."')";
        
        mysql_query($query);
        
        
        try {
         $mail->Host = 'smtp.alphabeneficios.com.br'; 
        
         $mail->SMTPAuth   = true;  
         $mail->Port       = 587; //  Usar 587 porta SMTP
         $mail->Username = 'victor@alphabeneficios.com.br'; // Usuário do servidor SMTP (endereço de email)
         $mail->Password = 'Mc200199#'; // Senha do servidor SMTP (senha do email usado)

         //Define o remetente
         // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
         $mail->SetFrom('victor@alphabeneficios.com.br', 'Lead teste'); //Seu e-mail
         $mail->AddReplyTo('victor@alphabeneficios.com.br', 'Lead teste'); //Seu e-mail
         $mail->Subject = 'Novo cadastro !';//Assunto do e-mail


         //Define os destinatário(s)
         //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
         $mail->AddAddress('joao@maktubplanosdesaude.com.br');
         $mail->AddCC('victor@alphabeneficios.com.br');
         $mail->AddCC('jcralo@maktubplanosdesaude.com.br');
         $mail->AddCC('diego@maktubplanosdesaude.com.br');
        
         //Campos abaixo são opcionais 
         //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
         //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
         //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
         //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


         //Define o corpo do email
         $mail->MsgHTML("Nome :".$nome."|| Telefone : ".$telefone." || email : ".$email); 

         ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
         //$mail->MsgHTML(file_get_contents('arquivo.html'));

         $mail->Send();
         echo "Mensagem enviada com sucesso</p>\n";

        //caso apresente algum erro é apresentado abaixo com essa exceção.
        }catch (phpmailerException $e) {
          echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
        }
        header("location:home.php");
    }

?>
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="mtel.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Fale conosco</title>
    <link rel="icon" type="image/png" href="img/alpha-logo.png" />
</head>
    <body>
    	<header>
            <?php include_once("includes/menu.php");?>
        </header>
        
        <div class="main" id="pagina-contato">
            <div id="dados-empresa">
                <div id="titulo-dados">
                    Fale conosco 
                </div>          
                <div id="endereco-telefone">
                    <div id="contato">
                        Email :
                        Atendimento@alphabeneficios.com.br<br>
                        Telefone : (11)3500-6379<br>
                        Whatsapp: (11)96025-0082
                    </div>
                
                </div>
            </div>
            <div id="base-containner-cadastro">
                <form action="fale-conosco.php" method="post">
                    <div id="containner-cadastro">
                        <div id="titulo-cadastro">
                            Preencha os dados abaixo para uma consultoria personalizada 
                        </div>

                        <div class="lbl" >Nome :</div>
                        <div class="input">
                            <input type="text" name="txt_nome" placeholder="Nome">
                        </div>
                        <div class="lbl" >Email :</div>
                        <div class="input">
                            <input type="text" name="txt_email" placeholder="Ex : nome@example.com">
                        </div>
                        <div class="lbl" >Telefone :</div>
                        <div class="input">
                            <input type="text" name="telefone" onkeyup="mascara( this, mtel );" maxlength="15" placeholder="Ex :(11) 91231-1234" required />
                        </div>

                        <div id="btn-salvar">
                            <input type="submit" value="Enviar" name="btn_enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="rodape">
            <?php include("includes/rodape.php") ?>
        </footer>
    </body>
</html>
