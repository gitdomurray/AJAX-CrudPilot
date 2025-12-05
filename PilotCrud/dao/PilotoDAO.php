<?php
require_once __DIR__."/../model/Piloto.php";
class PilotoDAO {
    private $pdo;
    public function __construct($pdo){$this->pdo=$pdo;}
    public function listar(){
        return $this->pdo->query("SELECT p.*,e.nome AS equipe,c.nome AS categoria FROM piloto p JOIN equipe e ON p.equipe_id=e.id JOIN categoria c ON p.categoria_id=c.id")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPorId($id){
        $stmt=$this->pdo->prepare("SELECT p.*,e.nome AS equipe,c.nome AS categoria 
                                    FROM piloto p 
                                    JOIN equipe e ON p.equipe_id=e.id 
                                    JOIN categoria c ON p.categoria_id=c.id 
                                    WHERE p.id=?");
        $stmt->execute([$id]);
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function inserir(Piloto $p){
        $stmt=$this->pdo->prepare("INSERT INTO piloto (nome,idade,nacionalidade,titulos,equipe_id,categoria_id) VALUES (?,?,?,?,?,?)");
        return $stmt->execute([$p->nome,$p->idade,$p->nacionalidade,$p->titulos,$p->equipe_id,$p->categoria_id]);
    }
    public function atualizar(Piloto $p){
        $stmt=$this->pdo->prepare("UPDATE piloto SET nome=?,idade=?,nacionalidade=?,titulos=?,equipe_id=?,categoria_id=? WHERE id=?");
        return $stmt->execute([$p->nome,$p->idade,$p->nacionalidade,$p->titulos,$p->equipe_id,$p->categoria_id,$p->id]);
    }
    public function deletar($id){
        $stmt=$this->pdo->prepare("DELETE FROM piloto WHERE id=?");
        return $stmt->execute([$id]);
    }
}