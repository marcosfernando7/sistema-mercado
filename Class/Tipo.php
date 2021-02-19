<?php

/* proteção url */
if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__)){
    header("Location: ../404.php");
    die();
}
/* end */

    class Tipo{

        private $tipo;
        private $imposto;
        private $table_tipos = 'tipos';

        // inserir tipo no banco
        public function inserir($pdo){

            $sql = "INSERT into mercado.{$this->table_tipos} (tipo, imposto, data_cadastro)
                            values (:tipo, :imposto, :data_cadastro)";

            $dados = array(
                'tipo'              => $this->tipo,
                'imposto'           => $this->imposto,
                'data_cadastro'     => date('Y-m-d H:i:s')
            );

            $pdo->create($sql, $dados);
        }

        // listar tipos do banco
        public function listar($pdo){

            $sql = "SELECT id_tipo,
                           data_cadastro,
                           tipo,
                           imposto
                                from mercado.{$this->table_tipos}
                                    order By data_cadastro DESC";

            $lista = $pdo->select($sql);

            return $lista;
        }

        // editar o tipo
        public function editar($pdo, $id){

            $sql = "SELECT id_tipo,
                        data_cadastro,
                        tipo,
                        imposto
                            from mercado.{$this->table_tipos}
                                where id_tipo = :id";

            $editar = $pdo->edit($sql, $id);

            return $editar;
        }



        // alterar tipo no banco
        public function alterar($pdo, $id){

            $sql = "UPDATE mercado.{$this->table_tipos}
                        set tipo = :tipo,
                            imposto = :imposto
                                where id_tipo = :id";

            $dados = array(
                'tipo'    => $this->tipo,
                'imposto' => $this->imposto,
                'id'      => $id
            );

            $pdo->update($sql, $dados);
        }

         // excluir tipo no banco
         public function excluir($pdo, $id){

            $sql = "DELETE from mercado.{$this->table_tipos}
                        where id_tipo = :id";

            $pdo->delete($sql, $id);
        }



        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function setImposto($imposto){
            $this->imposto = $imposto;
        }

    }

