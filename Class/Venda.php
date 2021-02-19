<?php

/* proteção url */
if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__)){
    header("Location: ../404.php");
    die();
}
/* end */

    class Venda{

        private $quantidade;

        public function realizar_venda($pdo, $id){

            /**** Valor do imposto */
            $sql = "SELECT imposto from mercado.tipos t
                        inner join mercado.produtos p
                            on p.tipo_id = t.id_tipo
                                where p.id_produto = :id";

            $i = $pdo->edit($sql, $id);
            $imposto = $i->imposto;


            /**** valor  */
            $sql = "SELECT valor from mercado.produtos
                        where id_produto = :id";

            $v = $pdo->edit($sql, $id);
            $valor = $v->valor;

            /* regra de quantidade valor */
            $valor_quantidade = $valor * $this->quantidade;

            /* regra de imposto no total da quantidade */
            $valor_imposto = $valor_quantidade * ($imposto / 100);

            /* insere os dados no banco de dados */
            $sql = "INSERT into mercado.vendas (valor_quantidade, valor_imposto, quantidade)
                            values(:valor_quantidade, :valor_imposto, :quantidade)";

            $dados = array(
                'valor_quantidade' => $valor_quantidade,
                'valor_imposto'    => $valor_imposto,
                'quantidade'       => $this->quantidade
            );

            $inserir_venda_id = $pdo->create($sql, $dados);

            /* produtos vendas */
            $sql = "INSERT into mercado.produtos_vendas (produto_id, venda_id)
                            values (:produto_id, :venda_id)";

            $dados = array(
                'produto_id' => $id,
                'venda_id'   => $inserir_venda_id,
            );

            $pdo->create($sql, $dados);

        }

        public function vendas_realizadas($pdo){

            $sql = "SELECT p.produto, v.valor_quantidade, v.valor_imposto, v.quantidade
                        from mercado.produtos p
                        inner join mercado.produtos_vendas pv
                            on p.id_produto = pv.produto_id
                        inner join mercado.vendas v
                            on pv.venda_id = v.id_venda
                                order by v.id_venda DESC";

            $list = $pdo->select($sql);
            return $list;
        }


        public function totalizador($pdo){

            $sql = "SELECT sum(quantidade) as qt,
                           sum(valor_quantidade) as vq,
                           sum(valor_imposto) as vi
                                    from mercado.vendas";

            $total = $pdo->show($sql, null);
            return $total;
        }


        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

    }
