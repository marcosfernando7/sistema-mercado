<?php

/* proteção url */
if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__)){
    header("Location: ../404.php");
    die();
}
/* end */

    require_once '../Class/ConnQuery.php';
    require_once '../Class/Tipo.php';

    /***** inserir dados no sistema ******/
    if(isset($_POST['cadastrar'])) :

        $insert = new Tipo();
        $insert->setTipo($_POST['tipo']);
        $insert->setImposto($_POST['imposto']);
        $insert->inserir($pdo);

        header('Location: ../tipos_produtos/index.php?inserido=true');
    endif;

    /***** editar tipo ******/
    if(isset($_GET['id'])) :
        $id = $_GET['id'];
        $edit = new Tipo();
        $editar = $edit->editar($pdo, $id);
    endif;

    /****** alterar tipo *****/
    if(isset($_POST['alterar'])) :
        $id = $_POST['id'];

        $insert = new Tipo();
        $insert->setTipo($_POST['tipo']);
        $insert->setImposto($_POST['imposto']);
        $insert->alterar($pdo, $id);

        header('Location: ../tipos_produtos/index.php?alterado=true');
    endif;

    /******* delete tipo ****/
    if(isset($_POST['deletar'])) :

        $id = $_POST['id'];

        $del = new Tipo();
        $del->excluir($pdo, $id);

        header('Location: ../tipos_produtos/index.php?excluid=true');
    endif;
?>