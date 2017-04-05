<?php
    require_once('../model/conection.php');
    if(isset($_GET['id_cliente'])){
        $id_cliente=$_GET['id_cliente'];
        $select="SELECT c.* , p.titulo FROM cliente c,produto_interesse p where c.id_produto = p.id_produto and id_cliente = ".$id_cliente;
        $query=mysql_query($select);
        $rs=mysql_fetch_array($query);
    }
    $chk_clt="";
    
    $chk_pj="";
    
    $chk_s_clt="";
    $hospital_preferencia="";

    if(isset($_POST['btn_salvar'])){
        
        $possui_plano=$_POST['rdo_possui_plano'];
        
        $operadora_plano=$_POST['qual_operadora'];
        
        $categoria_plano=$_POST['categoria_plano'];
        
        $enfermaria_apartamento=$_POST['rdo_e_a'];
        
        $valor_plano=$_POST['valor_plano'];
        
        $quantidade_vidas=$_POST['quantidade_vidas'];
        
        $idade_vidas=$_POST['quantidade_vidas'];
        
        if(isset($_POST['chk_clt']))$chk_clt=$_POST['chk_clt']."/";
        
        if(isset($_POST['chk_pj']))$chk_pj=$_POST['chk_pj']."/";
        
        if(isset($_POST['chk_s_clt']))$chk_s_clt=$_POST['chk_s_clt'];
        
        $relacao=$chk_clt.$chk_pj.$chk_s_clt;
        
        $cnpj_interior=$_POST['cnpj_interior'];
        $cnpj=$_POST['cnpj'];
        $hospital_preferencia=$_POST['hospital_preferencia'];
        $doenca_pre_ext=$_POST['doenca_pre_ext'];
        $gestante=$_POST['rdo_gestante'];
        
        $sql="insert into inf_add(possui_plano,qual_operadora,inf_ou_apartamento,valor_plano,categoria_plano,quantidade_vidas,idade_vidas,cnpj_interior,relacao_vidas,laboratorio_preferencia,observacao,emp_aberta,cnpj,form_academica,doenca_pre_existente,ext_gestante)values()"
        
        
        
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
    
</script>
</head>
    <body>
    	<header>
            <?php require_once('includes/menu.php')?>
        </header>
        <form action="inf_add_pme.php?id_cliente=<?php echo $_GET['id_cliente'];?>" method="post">
            <div id="base_inf_add">
                <div id="texto-inicial">
                    -Olá bom dia , o senhor <?php echo($rs['nome']); ?> .<br>
                    -Muito prazer meu nome é <?php echo($_SESSION['nome'])?> e eu sou consultor da <?php echo($rs['titulo']) ?> <br>
                    -Eu verifiquei aqui em meu sistema que o senhor solicitou uma cotação , correto ?<br>
                    -Pois bem, eu preciso fazer algumas perguntas para o senhor, e assim elaborar uma consultoria, o senhor tem um momento?<br>
                    (Se sim , prosseguir com as perguntas).
                </div>
                
                <label  class="input-label-adicionais">senhor já possui plano de saude ?</label><br>
                <input type="radio" onclick="exibir();" name="rdo_possui_plano" class="input-radio" value ="Sim"/>sim
                <input onclick="ocultar();" type="radio" class="input-radio" name="rdo_possui_plano" checked value="Nâo"/>não

                <div id="base_sim_plano">
                    <label  class="input-label-adicionais-a"> Qual operadora ?</label><br>
                    <input type="text" class="input-add-a" placeholder="Operadora" name="qual_operadora" />

                    <label  class="input-label-adicionais-a"> Qual a categoria do plano ?</label><br>
                    <input type="text" class="input-add-a" placeholder="digite a categoria do plano" name="categoria_plano" />
                    <label  class="input-label-adicionais-a"> Enfermaria ou apartamento</label><br>
                    <input type="radio"  name="rdo_e_a" value="enfermaria" class="input-radio" checked/>Enfermaria 
                    <input type="radio" class="input-radio"value="apartamento" name="rdo_e_a" /> Apartamento

                    <label  class="input-label-adicionais-a"> Valor ?</label><br>
                    <input type="text" class="input-add-a" placeholder="R$ 00,00" name="valor_plano" />
                </div>

                <label  class="input-label-adicionais"> Quantas pessoas entrarão no plano ?</label><br>
                <input type="text" class="input-add" placeholder="" name="quantidade_vidas" />

                <label  class="input-label-adicionais"> Qual a idade dessas pessoas ?</label><br>
                <input type="text" class="input-add" placeholder="ex : 10 , 10 ,..." name="idade_vidas" />
                <label  class="input-label-adicionais">Qual a relaçao das vidas com a empresa?</label><br>
                
                    <input value="CLT - Registro na carteira  de trabalho Incluso no FGTS ." type="checkbox" class="input-radio" name="chk_clt" />CLT - Registro na carteira  de trabalho Incluso no FGTS .<br>
                    <input value="PJ - Contrato de trabalho com a empresa ."type="checkbox" class="input-radio" name="chk_pj" />PJ - Contrato de trabalho com a empresa .<br>
                    <input value="Sem CLT ." type="checkbox" class="input-radio" name="chk_s_clt" />Sem CLT .
               
                <label  class="input-label-adicionais">Tem CNPJ no interior ?</label><br>
                <input type="radio"  name="cnpj_interior" class="input-radio" value ="Sim"/>sim
                <input  type="radio" class="input-radio" name="cnpj_interior" checked value="Não"/>não
                <input type="text" class="input-add-a" placeholder="Informe o numero CNPJ" name="cnpj" />

                <label  class="input-label-adicionais">O senhor tem algum hospital, laboratorio de preferência ?</label><br>
                <input type="radio" onclick="exibir_hosp();" name="rdo_h_l" class="input-radio" value ="Sim" />sim
                <input onclick="ocultar_hosp();" type="radio" class="input-radio" name="rdo_h_l" checked value="Não"/>não
                <div id="base_sim_hospital">
                    <label  class="input-label-adicionais-a"> Qual ?</label><br>
                    <input type="text" class="input-add-a" placeholder="Ex : São Luis ,Delboni" name="hospital_preferencia" />
                </div>

                <label  class="input-label-adicionais">Agora, preciso saber como esta a saúde do grupo, existe alguma doença pré-existente, todos gozam de boa saúde, </label><br>
                <input type="text" class="input-add" placeholder="Digite o nome da doença pré-existente" name="doenca_pre_ext" />
                <label  class="input-label-adicionais"> Alguma gestante ? (caso o cliente perguntar o porquê, informa-lo a respeito das carencias da operadora).</label><br>
                <input type="radio" name="rdo_gestante" class="input-radio" value ="S" />sim
                <input type="radio" class="input-radio" name="rdo_gestante" checked value="N"/>não
                
                
                <input type="submit" id="submit-inf-add"  name="btn_salvar" value="salvar"/>
                <div id="esc"></div>
               
            </div>
        </form>
        <footer id="rodape">
        	<?php require_once('includes/rodape.php') ?>
        </footer>
    </body>
</html>