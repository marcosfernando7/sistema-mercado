<?php

/* proteção url */
if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__)){
    header("Location: ../404.php");
    die();
}
/* end */

    class Produto{

        private $produto;
        private $valor;
        private $table_produtos = 'produtos';
        private $table_tipos = 'tipos';

        // inserir tipo no banco
        public function inserir($pdo, $id){

            $sql = "INSERT into mercado.{$this->table_produtos} (produto, valor, tipo_id)
                            values (:produto, :valor, :tipo_id)";

            $dados = array(
                'produto'         => $this->produto,
                'valor'           => $this->valor,
                'tipo_id'         => $id
            );

            $pdo->create($sql, $dados);
        }

        // listar tipos do banco
        public function listar($pdo){

            $sql = "SELECT id_produto,
                           produto,
                           valor,
                           tipo
                                from mercado.{$this->table_produtos} as p
                                    inner join mercado.{$this->table_tipos} as t
                                        on p.tipo_id = t.id_tipo
                                    order By id_produto Desc";

            $lista = $pdo->select($sql);

            return $lista;
        }

        // editar o tipo
        public function editar($pdo, $id){

            $sql = "SELECT id_produto,
                        produto,
                        valor,
                        t.id_tipo
                            from mercado.{$this->table_produtos} as p
                                inner join mercado.{$this->table_tipos} as t
                                    on p.tipo_id = t.id_tipo
                                where id_produto = :id";

            $editar = $pdo->edit($sql, $id);

            return $editar;
        }



        // alterar tipo no banco
        public function alterar($pdo, $id){

            $sql = "UPDATE mercado.{$this->table_produtos}
                        set produto = :produto,
                            valor = :valor
                                where id_produto = :id";

            $dados = array(
                'produto'   => $this->produto,
                'valor'     => $this->valor,
                'id'        => $id
            );

            $pdo->update($sql, $dados);
        }

         // excluir tipo no banco
         public function excluir($pdo, $id){

            $sql = "DELETE from mercado.{$this->table_produtos}
                        where id_produto = :id";

            $pdo->delete($sql, $id);
        }



        public function setProduto($produto){
            $this->produto = $produto;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

    }

