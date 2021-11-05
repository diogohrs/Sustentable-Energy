<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        
        if (isset($_SESSION['logado']) && $_SESSION['logado'] == "true"){
            session_destroy();

            echo "<script language='javascript' type='text/javascript'>
                    alert('Sessão Finalizada com sucesso!');
                    window.location.href='../index.php'</script>";
        }
        else{
            echo "<script language='javascript' type='text/javascript'>
                    alert('Voce não está logado!');
                    window.location.href='../index.php'</script>";
        }
    }
?>