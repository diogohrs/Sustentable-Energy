<?php
    if (!isset($_SESSION)){ 
        session_start();
        $_SESSION['logado'] = "false";
        $_SESSION['mostra_tabela'] = "false";
    }

    $_SESSION['mostra_tabela'] = "false";
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <title>Sustentable Energy</title>
</head>

<body>

<div id="navigation">
    <form id="menu">

    <form action="index.php">
        <button type="submit" class="btn btn-success">Home</button>
    </form>
    
    <br/>

    <form action="view/simulacao.php">
        <button type="submit" class="btn btn-success">Simulation</button>
    </form>

    <br/>

    <form action="view/cadastro_banco.php">
        <button type="submit" class="btn btn-success">Login/Sigin-up</button>
    </form>
    
    <br/>

    <form action="controller/encerra_sessao.php" method="POST">
        <button type="submit" class="btn btn-success">logout</button>
    </form>

    </form>
</div>

<div id="Ranking" style="float:right;" id="ranking">
    <h3>Ranking</h3>

<table id="table_id" class="display">
        <thead>
            <tr>
                <th>CPF/SSN</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            include('controller/conexao.php');
            
            $query = "SELECT Fk_usuario, pontuacao_usuario FROM Registro";

            $ranking = mysqli_query($conexao, $query);

            while ($linha = $ranking-> fetch_array()) {
                echo "<tr>";
                echo "<td>" . substr($linha["Fk_usuario"], 4,3) . "</td>";
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

            <h3>NEWS:</h3>

            <h4>UFU Installs Plant to Generate Energy From Sunlight</h4>
			
            <p>Whoever passes in front of the Federal University of Uberlândia (UFU), on Avenida João Naves de Ávila,
                will come across a novelty on the lawn of the Santa Mônica Campus: panels for capturing sunlight
                for electricity generation.</p> 
            <p>The plant is still being completed, but the installation of the 992 plates
                photovoltaics measuring 1,979 x 996 mm² each have been completed. They can generate up to 525,360 kWh
                per year, which represents R$ 262,680.00 of energy bill reduction.</p>

            <h4>Amazon wins photovoltaic solar plant with 2,880 panels</h4>

            <p>The Amazonas Renewable Energy Cooperative (CooperSol) formally announced, on Sunday (11),
                a new solar plant with no less than 2,880 photovoltaic panels. The construction, which constitutes
                the largest investment in the solar energy sector in the region, it is located at kilometer 23 of the highway
                AM-010 and feeds 86 members, in addition to other companies.</p>

            <p>Given the plant's apparent success, the company plans to build another two by September this year
                stations with more than 4,656 solar energy panels. The second installation of the solar plant should be
                raised on the BR 174 at kilometer 14, while the third will be next to the current one, on the AM-010 highway.
                If the plan materializes, a total of 7,536 photovoltaic solar energy panels will be installed.</p>

            <h4>Infinite battery: Urbanist creates 1st phone with solar charge</h4>

            <p>The Urbanista presented this Wednesday (14) its new Los Angeles headphones. The differential
                of the product, according to the company, is in the Powerfoyle solar cell, which can recharge the device's battery
                when coming into contact with any type of light, not just solar. The purpose of technology is to ensure
                infinite load for the user.</p>

            <h4>For the 1st time, solar energy is considered the cheapest in the world</h4>

            <p>If previously the so-called clean energy was considered expensive, this tends to change in the future.
                That's because, after a long drop in price over the years, solar energy has become the option
                cheapest electricity in history.</p>
            <p>The result, however, does not mean that solar energy is the cheapest in all regions of the world.
                 Still, in the United States, the average cost of solar modules has dropped dramatically
                 in the last 15 years.</p>

            <h4>Eternit starts mass production of solar tile soon</h4>

            <p>After selling asbestos tiles for almost 80 years, Eternit is preparing its big turnaround,
                 betting heavily on its solar tile project. After receiving Inmetro certification for
                 the product, the company completed, only in the first two months of this year, four more installations
                 equipment, in addition to the two projects completed in 2020.</p>
            <p>The new photovoltaic projects were installed in the states of São Paulo, (Ourinhos and Marília),
                Rio de Janeiro (Itaipava) and in the city of Cambé, Paraná. The smallest of them, in Ourinhos, used only
                72 tiles in the installation, but projected a monthly savings of BRL 50 on the electricity bill, with a capacity
                70 kWh per month.</p>

            <p>Each solar tile measures 36.5 cm by 47.5 cm and has a power of 9.16 watts, which indicates a capacity
                monthly average production of 1.15 Kilowatt-hours (kWh). With this, Eternit's biggest project,
                the one in Marília, with 560 tiles, indicates a production capacity of 550 kWh/month,
                enough for a rebate of R$390 on the account.</p>

	</section>
</div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable()
    });
</script>

</html>