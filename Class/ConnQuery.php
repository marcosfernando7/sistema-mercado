<?php

/* proteção url */
if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__)){
    header("Location: ../404.php");
    die();
}
/* end */

// conexao com o banco parametros
    define('HOST', 'localhost');
    define('PORTA', '5432');
    define('DBNAME', 'mercado');
    define('USER', 'postgres');
    define('PASSWORD', 'root');


class ConnQuery{

    public function __construct(){
        //
    }

    private $conn;

    // conexao com o banco
    public function conn(){
        try{

            $this->conn = new PDO("pgsql:dbname=" . DBNAME . ";port=" . PORTA . ";host=" . HOST, USER, PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;

        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    }


    private function db_create($sql, $dados){

        try {

            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            $stmt->execute($dados);

            $lastid = $conn->lastInsertId();

            return $lastid;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage().$sql;
            exit();
        }

    }


    private function db_list($sql, $id){

        try{

            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            if($id != null) :
                $stmt->bindValue(':id', $id);
            endif;
            $stmt->execute();

            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $stmt;

        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
            }
    }

    private function db_edit($sql, $id){

        try {
            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            if($id != null) :
            $stmt->bindValue(':id', $id);
            endif;
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);

            if($stmt) :
                $stmt = $stmt[0];
                return $stmt;
            endif;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    private function db_show($sql, $id){

        try {
            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            if($id != null) :
                $stmt->bindValue(':id', $id);
            endif;
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);

            if($stmt) :
                $stmt = $stmt[0];
                return $stmt;
            endif;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }


    private function db_update($sql, $dados){

        try {

            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            $stmt->execute($dados);

            return $stmt;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            exit();
        }

    }

    private function db_delete($sql, $id){

        try {
            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt) :
                return $stmt;
            else :
                echo "Erro";
                exit();
            endif;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            // exit();
        }

    }

    private function db_login($sql, $dados){

        try {
            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            $stmt->execute($dados);
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);

            if($stmt) :
                $stmt = $stmt[0];
                return $stmt;
            endif;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

    }

    private function db_select($sql){

        try {
            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);

            if($stmt) :
                return $stmt;
            endif;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

    }

    public function create($sql, $dados){
        return $this->db_create($sql, $dados);
    }

    public function update($sql, $dados){
        return $this->db_update($sql, $dados);
    }

    public function list($sql, $id){
        return $this->db_list($sql, $id);
    }

    public function search($sql, $dados){
        return $this->db_search($sql, $dados);
    }

    public function delete($sql, $id){
        return $this->db_delete($sql, $id);
    }

    public function edit($sql, $id){
        return $this->db_edit($sql, $id);
    }

    public function show($sql, $id){
        return $this->db_show($sql, $id);
    }

    public function login($sql, $dados){
        return $this->db_login($sql, $dados);
    }

    public function select($sql){
        return $this->db_select($sql);
    }

}

$pdo = new ConnQuery();
?>