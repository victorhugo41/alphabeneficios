<!DOCTYPE html >
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
    <script language="JavaScript" src="JQuery/jquery11.js" type="text/javascript"></script>
	<script language="JavaScript" src="JQuery/Jcycle.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/png" href="img/alpha-logo.png" />
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="_bPrl2yAalWQuW67KMxpvypVsehoLhCjhu3CPPTGVRI" />
    <meta name="description" content="Alpha beneficios facebook https://www.facebook.com/AlphaBeneficios/" />
    
    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Alpha beneficios - Os melhores planos de saúde e seguros de saúde </title>
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
    	<header>
            <?php include_once("includes/menu.php");?>
        </header>
        
        <div class="main">
            <div id="base-slider">
                <div id="slider">
                    <ul >
                        <li><a href="#"><img alt="anuncio" title="anuncio"  src="img/banner-sulamerica.jpg" /></a></li>
                        <li><a href="#"><img alt="anuncio" title="anuncio"  src="img/One-Health.jpg" /></a></li>
                        <li><a href="#"><img alt="anuncio" title="anuncio"  src="img/banner-bradesco.jpg" /></a></li>
                        
                    </ul>
                </div>
            </div>
            <div id="conteudo-home">
                <div id="box-sobre-a-empresa" >
                    <div class="conteudo-sobre">
                        <h1 ><strong>Alpha benefícios </strong></h1>
                        <h2 >Os fundadores da <strong>Alpha Benefícios</strong> estão no mercado de seguros á mais de
                        20 anos, e desde 2002 atuam na criação, adequação e gestão de políticas de
                        benefícios, tendo como foco os objetivos de seus clientes. Hoje, estamos entre as
                        maiores consultorias brasileiras na área de benefícios, atendendo a mais de 200
                        empresas dos mais variados segmentos e oferecendo soluções customizadas de
                        acordo com o perfil, porte e necessidades de cada cliente.
                        </h2>
                    </div>
            
                </div>
                <div id="box-bem-vindo">
                    <div id="titulo">O melhor custo benefício</div>
                    <div id="base-img">
                        <img src="img/Melhor-Custo-Benef%C3%ADcio.png">
                    </div>
                    <div id="texto">
                        Nossos especialistas são qualificados para encontrar o plano de saúde mais adequado a sua necessidade. Através da nossa consultoria encontraremos o produto perfeito para seu orçamento, visando também qualidade de atendimento na rede credenciada da operadora escolhida.
                    </div>
                </div>
                <div id="base-fale-conosco">
                    <div id="space"></div>
                    <form action="home.php" method="post">
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
            
        </div>
        <footer class="rodape">
            <?php include("includes/rodape.php") ?>
        </footer>
    </body>
</html>
