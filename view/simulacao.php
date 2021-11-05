<?php
    if (!isset($_SESSION)){ 
        session_start();
        $_SESSION['mostra_tabela'] = "false";
    }
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
    
    <title>Simulacao</title>
</head>
<body>

    <?php  
        if (!isset($_SESSION))
            session_start();

        if(!isset($_SESSION['logado']) || $_SESSION['logado'] != "true") {
            echo "<script language='javascript' type='text/javascript'>
                    alert('Necessario fazer Login');
                    window.location.href='../view/cadastro_banco.php'</script>";
        }
        else{
            
            ?>

            <div id="dvi1">

            <form action="../index.php">
                <button type="submit" class="btn btn-success">Home</button>
            </form>

            <br/>

            <section id='calculation_explanation'>

            <h4>How does the calculus work:</h4>
            
            <p>Each card generates an average of 400 W per day.
                Avoiding approximately 600 kg of carbon released into the atmosphere per year.
                Every company in the photovoltaic sector plants 0.2 trees per year
                to each installed board. And finally, each plate avoids spending approximately 30 l/s per day. </p>
            
            </section>

            <br/>

            <form action="../model/calculo_simulacao.php" method="POST">
                <div class="row">
                    <div class="col-auto">
                        <input type="number" name="txtConsumo" class="form-control" placeholder="monthly consumption in Kw/h"></input>
                    </div>
                    <div class="col-auto">
                        <input type="submit" value="calculate" class="btn btn-success">
                    </div>
                </div>
            </form>

            <br/>

            <form action="mostrar_simulacoes.php" method="POST">
                <button type="submit" class="btn btn-success">Show Simulations</button>
            </form>
            <?php
                if($_SESSION['mostra_tabela'] == "true"){
            ?>
            
            <br/>
                
            <center><table id="table_simulacao" class="display">
        <thead>
            <tr>
                <th>CPF/SSN USER</th>
                <th>Number of plates</th>
                <th>Spared trees</th>
                <th>Water economy</th>
                <th>Avoided Pollutants</th>
                <th>Energy saved</th>
                <th>Generated Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            include('../controller/conexao.php');

            if(isset ($_SESSION['cpf_session']))
                $cpf = ($_SESSION['cpf_session']);

            $query = "SELECT FK_cpf, quant_placas, arvores_poupadas, economia_agua, poluentes_evitados,
            pontuacao, valor_economia_energia FROM Simulacao WHERE PK_id=(SELECT max(PK_id) FROM Simulacao)";

            $usuarios = mysqli_query($conexao, $query);

            while ($linha = $usuarios-> fetch_array()) {
                echo "<tr>";
                echo "<td>" . substr($linha["FK_cpf"], 4,3) . "</td>";
                echo "<td>" . $linha["quant_placas"] . "</td>";
                echo "<td>" . $linha["arvores_poupadas"] . "</td>";
                echo "<td>" . $linha["economia_agua"] . "</td>";
                echo "<td>" . $linha["poluentes_evitados"] . "</td>";
                echo "<td>" . $linha["valor_economia_energia"] . "</td>";
                echo "<td>" . $linha["pontuacao"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        <?php }
        ?>
</table></center>
    </div>
    <?php
        }
    ?>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_simulacao').DataTable()
    });
</script>

</html>