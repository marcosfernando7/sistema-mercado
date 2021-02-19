<?php

/* proteção url */
if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__)){
    header("Location: ../404.php");
    die();
}
/* end */

    require_once '../Class/ConnQuery.php';
    require_once '../Class/Produto.php';


    /***** inserir dados no sistema ******/
    if(isset($_POST['cadastrar'])) :

        $id = $_POST['tipo_id'];

        $insert = new Produto();
        $insert->setProduto($_POST['produto']);
        $insert->setValor($_POST['valor']);
        $insert->inserir($pdo, $id);

        header('Location: ../produtos/index.php');
    endif;

    /***** editar tipo ******/
    if(isset($_GET['id'])) :
        $id = $_GET['id'];
        $edit = new Produto();
        $editar = $edit->editar($pdo, $id);
    endif;

    /****** alterar tipo *****/
    if(isset($_POST['alterar'])) :
        $id = $_POST['id'];

        $insert = new Produto();
        $insert->setProduto($_POST['produto']);
        $insert->setValor($_POST['valor']);
        $insert->alterar($pdo, $id);

        header('Location: ../produtos/index.php');
    endif;

    /******* delete tipo ****/
    if(isset($_POST['deletar'])) :

        $id = $_POST['id'];

        $del = new Produto();
        $del->excluir($pdo, $id);

        header('Location: ../produtos/index.php');
    endif;
?>