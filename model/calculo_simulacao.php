<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $consumo = filter_input(INPUT_POST, "txtConsumo", FILTER_SANITIZE_STRING);

        if(!empty($consumo)){
            $quant_placas = $consumo/400;

            $arvores_poupadas = $quant_placas * 0.2;
            $economia_agua = $quant_placas * 35.7;
            $poluentes_evitados = $quant_placas * 641;
            $valor_economia_energia = $quant_placas * 0.4;
            $pontuacao = $quant_placas * 100;

            include('../controller/conexao.php');

            if($conexao) {

                if (!isset($_SESSION))
                    session_start();

                if(isset ($_SESSION['cpf_session']))
                    $cpf = ($_SESSION['cpf_session']);

                $query = "INSERT INTO Simulacao (arvores_poupadas, economia_agua, poluentes_evitados,
                                        pontuacao, valor_economia_energia, FK_cpf, quant_placas) VALUES ('$arvores_poupadas', '$economia_agua',
                                                                                    '$poluentes_evitados','$pontuacao',
                                                                                     '$valor_economia_energia',$cpf, '$quant_placas')";
                
                $insert = mysqli_query($conexao, $query);

                $queryUsuario = "UPDATE Usuario SET pontuacao=$pontuacao WHERE Usuario.PK_cpf=$cpf";
                
                $updateUsuario = mysqli_query($conexao, $queryUsuario);

                $queryRegistro = "INSERT INTO Registro (FK_usuario, pontuacao_usuario) VALUES($cpf, '$pontuacao')";
                
                $insertRegistro = mysqli_query($conexao, $queryRegistro);

                if($insert) {

                    $_SESSION['mostra_tabela']="true";

                    echo "<script language='javascript' type='text/javascript'>
                    window.location.href='../view/simulacao.php'</script>";

                } else {
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Problema ao cadastrar Simulação');
                    window.location.href='../view/simulacao.php'</script>";
                }
            }
            else{
                echo "<script language='javascript' type='text/javascript'>
                    alert('Ops, nao foi possivel conectar ao BD.');
                    window.location.href='..index.php'</script>";
            }
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Campo vazio!');
            window.location.href='../view/simulacao.php'</script>";
        }
    }
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable()
    });
</script>