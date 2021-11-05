<!DOCTYPE html>

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if(!isset ($_SESSION['logado'])) {
        $logado = "false";
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

    <title>Sustentable Energy</title>
</head>

<body>

<!--<form id="menu">
    <button type="button" onclick="Navegar('home')"> Home</button>
    
    <button type="button" onclick="Navegar('simulacao')"> Simulacao</button>
    
    <button style="float:right" type="button" onclick="Navegar('login/cadastro')"> Login/Cadastro</button>
</form>-->

<div id="navigation">
    <form action="index.php">
        <button type="submit" class="btn btn-success">Home</button>
    </form>
    
    <br/>

    <form action="view/simulacao.php">
        <button type="submit" class="btn btn-success">Simulação</button>
    </form>

    <br/>

    <form action="view/cadastro_banco.php">
        <button type="submit" class="btn btn-success">Login/Cadastro</button>
    </form>
</div>

<div id="Ranking" style="float:right;" id="ranking">
    <h3>Ranking</h3>

<table id="table_id" class="display">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Pontuação</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $conexao = mysqli_connect("localhost", "id17666827_user", "Ounr2YE&Lv#NtmKN",
            "id17666827_sustentable_enery", 3306);

            $query = "SELECT Fk_usario, pontuacao_usuario FROM Registro";

            $ranking = mysqli_query($conexao, $query);

            while ($linha = $ranking-> fetch_array()) {
                echo "<tr>";
                echo "<td>" . $linha["Fk_usario"] . "</td>";
                echo "<td>" . $linha["pontuacao_usuario"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
</table>

</div>

<div id="interface">

    <header style="float:center" id="cabecalho">
        <hgroup>
            <h1>Sustentable Energy</h1>
            <h2>"Clean Energy"</h2>
        </hgroup>
    </header>

    <section id='corpoSite'>

            <h3>Noticias:</h3>

            <h4>UFU instala usina para geração de energia a partir da luz solar</h4>
			
            <p>Quem passar em frente à Universidade Federal de Uberlândia (UFU), na avenida João Naves de Ávila, 
                vai se deparar com uma novidade no gramado do Campus Santa Mônica: painéis de captação de luz solar 
                para geração de energia elétrica.</p> 
            <p>A usina ainda está sendo finalizada, mas a instalação das 992 placas 
                fotovoltaicas medindo, cada uma, 1.979 x 996 mm², já foram concluídas. Elas podem gerar até 525.360 kWh 
                por ano, o que representa R$ 262.680,00 de redução da conta de energia.</p>

            <h4>Amazonas ganha usina solar fotovoltaica com 2.880 painéis</h4>

            <p>A Cooperativa de Energia Renovável do Amazonas (CooperSol) anunciou formalmente, no domingo (11), 
                uma nova usina solar com nada menos do que 2.880 painéis fotovoltaicos. A construção, que constitui 
                o maior investimento no setor de energia solar na região, está localizada no quilômetro 23 da rodovia 
                AM-010 e alimenta 86 cooperados, além de outras empresas.</p>

            <p>Diante do aparente sucesso da usina, a empresa pretende construir até setembro deste ano outras duas 
                estações com mais de 4.656 painéis de energia solar. A segunda instalação da usina solar deve ser 
                levantada na BR 174 no quilômetro 14, enquanto a terceira ficará ao lado da atual, na rodovia AM-010. 
                Caso o plano se concretize, serão instalados 7.536 painéis de energia solar fotovoltaica no total.</p>

            <h4>Bateria infinita: Urbanista cria 1º fone com recarga solar</h4>

            <p>A Urbanista apresentou nesta quarta-feira (14) seus novos fones de ouvido Los Angeles. O diferencial 
                do produto, segundo a empresa, está na célula solar Powerfoyle, que pode recarregar a bateria do aparelho 
                ao entrar em contato com qualquer tipo de luz, não apenas a solar. O objetivo da tecnologia é garantir 
                carga infinita para o usuário.</p>

            <h4>Pela 1ª vez, energia solar é considerada a mais barata do mundo</h4>

            <p>Se antes as chamadas energias limpas eram consideradas caras, isso tende a mudar no futuro. 
                Isso porque, após uma longa queda de preço ao decorrer dos anos, a energia solar se tornou a opção 
                mais barata de eletricidade na história.</p>
            <p>O resultado, no entanto, não significa que a energia solar seja a mais barata em todas as regiões do mundo.
                 Ainda assim, nos Estados Unidos, os custos médios dos módulos solares caíram drasticamente 
                 nos últimos 15 anos.</p>

            <h4>Eternit inicia produção em massa de telha solar em breve</h4>

            <p>Depois de vender telhas de amianto por quase 80 anos, a Eternit está preparando a sua grande virada,
                 apostando pesadamente no seu projeto de telhas solares. Após receber a certificação do Inmetro para 
                 o produto, a empresa concluiu, somente nos dois primeiros meses deste ano, mais quatro instalações 
                 dos equipamentos, além dos dois projetos concluídos em 2020.</p>
            <p>Os novos projetos fotovoltaicos foram instalados nos estados de São Paulo, (Ourinhos e Marília), 
                Rio de Janeiro (Itaipava) e na cidade de Cambé, no Paraná. O menor deles, em Ourinhos, utilizou apenas 
                72 telhas na instalação, mas projetou uma economia mensal de R$ 50 na conta de luz, com uma capacidade 
                de 70 kWh por mês.</p>

            <p>Cada telha solar mede 36,5 cm por 47,5 cm e tem uma potência de 9,16 watts, o que indica uma capacidade 
                média mensal de produção de 1,15 Quilowatts-hora (kWh). Com isso, o maior projeto da Eternit, 
                o de Marília com 560 telhas, aponta uma capacidade de produção de 550 kWh/mês, 
                o suficiente para um abatimento de R$ 390 na conta.</p>

	</section>
</div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable()
    });
</script>

<!--<script type="text/javascript">
	
	function Navegar(el){

		if (el == "home")
            window.locatoin.href="..index.php";
		else if (el == "simulacao")
            window.locatoin.href="view/simulacao.php";
        else if (el == "login/cadastro")
            window.locatoin.href="../view/cadastro_banco.php";
	}
</script>-->

</html>