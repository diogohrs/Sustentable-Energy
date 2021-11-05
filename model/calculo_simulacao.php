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

            $conexao = mysqli_connect("localhost", "id17666827_user", "Ounr2YE&Lv#NtmKN",
                                "id17666827_sustentable_enery", 3306);

            if($conexao) {

                $query = "INSERT INTO Simulacao (arvores_poupadas, economia_agua, poluentes_evitados,
                                        pontuacao, valor_economia_energia, FK_cpf) VALUES ('$arvores_poupadas', '$economia_agua',
                                                                                    '$poluentes_evitados','$pontuacao',
                                                                                     '$valor_economia_energia',11111111111);";
                
                $insert = mysqli_query($conexao, $query);

                $queryUsuario = "UPDATE Usuario SET pontuacao=$pontuacao WHERE Usuario.PK_cpf=11111111111";
                
                $updateUsuario = mysqli_query($conexao, $queryUsuario);

                $queryRegistro = "INSERT INTO Registro (FK_usario, pontuacao_usuario) VALUES(11111111111, '$pontuacao') 
                            WHERE Usuario.PK_cpf=11111111111";

                
                $insertRegistro = mysqli_query($conexao, $queryRegistro);

                if($insert) {
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Simualção Efetuada Com Sucesso!');
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
            alert('Campos vazios!');
            window.location.href='../view/simulacao.php'</script>";
        }
    }
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable()
    });
</script>