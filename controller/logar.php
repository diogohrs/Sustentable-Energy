<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));

    $conexao = mysqli_connect("localhost", "id17666827_user", "Ounr2YE&Lv#NtmKN",
                                "id17666827_sustentable_enery", 3306);

    if ($conexao) {
        $query = "SELECT PK_cpf, senha FROM Usuario where Pk_cpf =  '$cpf'
                    and senha = '$senha';";

        $usuarios = mysqli_query($conexao, $query);

        if (mysqli_num_rows($usuarios)>0) {
            echo "<script language='javascript' type='text/javascript'>
                    alert('Login efetuado com sucesso!');
                    window.location.href='../index.php'</script>";

                    session_start();

                    $cpf_session = $cpf;
        }
        else{
            echo "<script language='javascript' type='text/javascript'>
                    alert('ERROR: CPF ou Senha incorreto(s)!');
                    window.location.href='../view/cadastro_banco.php'</script>";
        }
    }
}
?>
