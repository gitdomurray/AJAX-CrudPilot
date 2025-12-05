<?php
class EquipeDAO {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // listagem
    public function listar() {
        return $this->pdo->query("SELECT * FROM equipe")->fetchAll(PDO::FETCH_ASSOC);
    }

    // listagem por categorias 
    public function listarPorCategoria($categoria_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM equipe WHERE categoria_id = :categoria_id");
        $stmt->execute(['categoria_id' => $categoria_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
