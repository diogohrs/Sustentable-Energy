<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $cpf = filter_input(INPUT_POST, "txtCpf", FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING);
        if(!empty(filter_input(INPUT_POST, "txtSenha")))
            $senha = md5(filter_input(INPUT_POST, "txtSenha"));
        $cidade = filter_input(INPUT_POST, "txtCidade", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_STRING);

        
        if(!empty($cpf) && !empty($nome) && !empty($senha) && !empty($cidade) && !empty($email)) {
            
            $conexao = mysqli_connect("localhost", "id17666827_user", "Ounr2YE&Lv#NtmKN",
                                "id17666827_sustentable_enery", 3306);

            if($conexao) {
                echo"conectou";

                $query = "INSERT INTO Usuario (PK_cpf, nome, cidade, email, senha) VALUES ('$cpf', '$nome','$cidade', 
                                                                                            '$email', '$senha');";
                
                $insert = mysqli_query($conexao, $query);

                if($insert) {
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Usuario cadastrado com sucesso!');
                    window.location.href='../view/cadastro_banco.php'</script>";

                    session_start();

                    $_SESSION['logado']= "true";

                } else {
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Problema ao cadastrar usuario');
                    window.location.href='../view/cadastro_banco.php'</script>;
                    ";
                }
            }
            else{
                echo "<script language='javascript' type='text/javascript'>
                    alert('Ops, nao foi possivel conectar ao BD.');</script>";
            }
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Campos vazios!');
            window.location.href='../view/cadastro_banco.php'</script>";
        }
    }
?>