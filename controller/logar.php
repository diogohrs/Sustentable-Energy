<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));

    include('../controller/conexao.php');
            
    if ($conexao) {
        $query = "SELECT PK_cpf, senha FROM Usuario where Pk_cpf =  '$cpf'
                    and senha = '$senha';";

        $usuarios = mysqli_query($conexao, $query);

        if (mysqli_num_rows($usuarios)>0) {
            if (!isset($_SESSION))
                session_start();

            $_SESSION['logado'] = "true";
            $_SESSION['cpf_session'] = $cpf;
            
            echo "<script language='javascript' type='text/javascript'>
                    alert('Login efetuado com sucesso!');
                    window.location.href='../index.php'</script>";
        }
        else{
            echo "<script language='javascript' type='text/javascript'>
                    alert('ERROR: CPF ou Senha incorreto(s)!');
                    window.location.href='../view/cadastro_banco.php'</script>";
        }
    }
}
?>
