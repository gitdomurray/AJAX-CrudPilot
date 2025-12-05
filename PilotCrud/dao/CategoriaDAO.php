<?php
class CategoriaDAO {
    private $pdo;
    public function __construct($pdo){$this->pdo=$pdo;}
    public function listar(){
        return $this->pdo->query("SELECT * FROM categoria")->fetchAll(PDO::FETCH_ASSOC);
    }
}