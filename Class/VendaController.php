<?php

/* proteção url */
if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__)){
    header("Location: ../404.php");
    die();
}
/* end */

    require_once '../Class/ConnQuery.php';
    require_once '../Class/Venda.php';

    /******* realiazar a venda ****/
    if(isset($_POST['realizar_venda'])) :

        $id = $_POST['id_produto'];

        $venda = new Venda();
        $venda->setQuantidade($_POST['valor_quantidade']);
        $venda->realizar_venda($pdo, $id);

        header('Location: ../venda/index.php');
    endif;
?>