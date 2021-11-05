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
    
    <title>Other Simulations</title>
</head>

<body>

    <br/>

    <form action="../index.php">
        <button type="submit" class="btn btn-success">Home</button>
    </form>

    <br/>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        include('../controller/conexao.php');

            if($conexao) {
?>
                <h2>Table Of Outhers Simulations</h2>
                <p>This table contains information about simulations made on our WebSite.</p>
                
                <br/>
                
                <center><table id="table_simulacoes" class="display">
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
                            pontuacao, valor_economia_energia FROM Simulacao";

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
                </table></center>
                <?php
            }
            else{
                echo "<script language='javascript' type='text/javascript'>
                    alert('Ops, nao foi possivel conectar ao BD.');
                    window.location.href='..index.php'</script>";
            }
        }?>

</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_simulacoes').DataTable()
    });
</script>

</html>