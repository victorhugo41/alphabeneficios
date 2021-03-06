<?php
    require_once('../model/conection.php');

    if(isset($_GET['id_cliente'])){
        $select="SELECT c.* , p.titulo FROM cliente c,produto_interesse p where c.id_produto = p.id_produto and id_cliente = ".$_GET['id_cliente'];
        $query=mysql_query($select);
        $rs=mysql_fetch_array($query);
    }
?>
<!DOCTYPE html >
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head >
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name ="viewport"content="width=device-width, initial scale=1,user-scale=no">
	<title>Maktub leads</title>
    <script type="text/javascript">

    function exibir() {
        document.getElementById("base_sim_plano").style.display = "block";
    }
    function ocultar() {
        document.getElementById("base_sim_plano").style.display = "none";
    }
    function exibir_hosp() {
        document.getElementById("base_sim_hospital").style.display = "block";
    }
    function ocultar_hosp() {
        document.getElementById("base_sim_hospital").style.display = "none";
    }
    function exibir_CNPJ() {
        document.getElementById("base_sim_empresa").style.display = "block";
    }
    function ocultar_CNPJ() {
        document.getElementById("base_sim_empresa").style.display = "none";
    }
    
</script>
</head>
    <body>
    	<header>
            <?php require_once('includes/menu.php')?>
        </header>
        <form action="inf_add_adesao.php<??>" method="post">
            <div id="base_inf_add">
                <div id="texto-inicial">
                    -Olá bom dia , o senhor <?php echo($rs['nome']); ?> .<br>
                    -Muito prazer meu nome é <?php echo($_SESSION['nome'])?> e eu sou consultor da <?php echo($rs['titulo']) ?> <br>
                    -Eu verifiquei aqui em meu sistema que o senhor solicitou uma cotação , correto ?<br>
                    -Pois bem, eu preciso fazer algumas perguntas para o senhor, e assim elaborar uma consultoria, o senhor tem um momento?<br>
                    (Se sim , prosseguir com as perguntas).
                </div>
                
                <label  class="input-label-adicionais">O senhor já possui plano de saude ?</label><br>
                <input type="radio" onclick="exibir();" name="rdo_possui_plano" class="input-radio" value ="S"/>sim
                <input onclick="ocultar();" type="radio" class="input-radio" name="rdo_possui_plano" checked value="N"/>não

                <div id="base_sim_plano">
                    <label  class="input-label-adicionais-a"> Qual operadora ?</label><br>
                    <input type="text" class="input-add-a" placeholder="Operadora" name="categoria_plano" />

                    <label  class="input-label-adicionais-a"> Qual a categoria do plano ?</label><br>
                    <input type="text" class="input-add-a" placeholder="digite a categoria do plano" name="categoria_plano" />
                    <label  class="input-label-adicionais-a"> Enfermaria ou apartamento</label><br>
                    <input type="radio"  name="rdo_e_a" class="input-radio" checked/>Enfermaria 
                    <input type="radio" class="input-radio" name="rdo_e_a" /> Apartamento

                    <label  class="input-label-adicionais-a"> Valor ?</label><br>
                    <input type="text" class="input-add-a" placeholder="R$ 00,00" name="categoria_plano" />
                </div>

                <label  class="input-label-adicionais"> O senhor possui alguma empresa aberta no nome do senhor ?(caso o cliente questione esta pergunta , explicar que podemos fazer um plano empresarial com custo reduzido)</label><br>
                <input type="radio" onclick="exibir_CNPJ();" name="rdo_possui_plano" class="input-radio" value ="S"/>sim
                <input onclick="ocultar_CNPJ();" type="radio" class="input-radio" name="rdo_possui_plano" checked value="N"/>não
                
                <div id="base_sim_empresa">
                    <label  class="input-label-adicionais-a"> Informe o CNPJ :</label><br>
                    <input type="text" class="input-add-a" placeholder="ex : XX.XXX.XXX/0001-XX" name="categoria_plano" />
                </div>
                <label  class="input-label-adicionais">O senhor possui formação acadêmica , qual sua profissâo ?(caso o cliente questione explicar que na adesão  é preciso saber a profissão para saber em qual categoria se enquadra). </label><br>
                <input type="text" class="input-add" placeholder="ex : Advogado , engenheiro , etc..." name="idade_vidas" />
                
                <label  class="input-label-adicionais">Quantas pessoas entrarão no plano ?</label><br>
                <input type="text" class="input-add" placeholder="Ex : 10" name="idade_vidas" />
                
                <label  class="input-label-adicionais"> Qual a idade dessas pessoas ?</label><br>
                <input type="text" class="input-add" placeholder="ex : 50, 40, 10 ,..." name="idade_vidas" />
                <label  class="input-label-adicionais">Qual a relaçao das vidas com a empresa?</label><br>
                <input type="radio" class="input-radio" name="rdo_relacao" />CLT - Registro na carteira  de trabalho Incluso no FGTS .<br>
                <input type="radio" class="input-radio" name="rdo_relacao2" />PJ - Contrato de trabalho com a empresa .<br>
                <input type="radio" class="input-radio" name="rdo_relacao3" />Sem CLT .
                <label  class="input-label-adicionais">Tem CNPJ no interior ?</label><br>
                <input type="radio"  name="rdo_possui_plano" class="input-radio" value ="S"/>sim
                <input  type="radio" class="input-radio" name="rdo_possui_plano" checked value="N"/>não

                <label  class="input-label-adicionais">O senhor tem algum hospital, laboratorio de preferência ?</label><br>
                <input type="radio" onclick="exibir_hosp();" name="rdo_h_l" class="input-radio" value ="S" />sim
                <input onclick="ocultar_hosp();" type="radio" class="input-radio" name="rdo_h_l" checked value="N"/>não
                <div id="base_sim_hospital">
                    <label  class="input-label-adicionais-a"> Qual ?</label><br>
                    <input type="text" class="input-add-a" placeholder="Ex : São Luis ,Delboni" name="categoria_plano" />
                </div>

                <label  class="input-label-adicionais">Agora, preciso saber como esta a saúde do grupo, existe alguma doença pré-existente, todos gozam de boa saúde, </label><br>
                <input type="text" class="input-add" placeholder="Digite o nome da doença pré-existente" name="categoria_plano" />
                <label  class="input-label-adicionais"> Alguma gestante ? (caso o cliente perguntar o porquê, informa-lo a respeito das carencias da operadora).</label><br>
                <input type="radio"  name="rdo_gestante" class="input-radio" value ="S" />sim
                <input  type="radio" class="input-radio" name="rdo_gestante" checked value="N"/>não
                
                <input type="submit" id="submit-inf-add"  name="btn_salvar" value="salvar"/>
                <div id="esc"></div>
               
            </div>
        </form>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>