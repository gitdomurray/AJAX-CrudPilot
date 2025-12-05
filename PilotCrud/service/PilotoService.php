<?php
require_once __DIR__ . "/../dao/PilotoDAO.php";
require_once __DIR__ . "/../dao/EquipeDAO.php";
require_once __DIR__ . "/../dao/CategoriaDAO.php";
require_once __DIR__ . "/../model/Piloto.php";

class PilotoService
{
    private $dao;
    private $equipeDao;
    private $categoriaDao;

    public function __construct($pdo)
    {
        $this->dao = new PilotoDAO($pdo);
        $this->equipeDao = new EquipeDAO($pdo);
        $this->categoriaDao = new CategoriaDAO($pdo);
    }

    public function listarPilotos()
    {
        return $this->dao->listar();
    }

    public function buscarPiloto($id)
    {
        return $this->dao->buscarPorId($id);
    }

    public function listarEquipes()
    {
        return $this->equipeDao->listar();
    }

    public function listarCategorias()
    {
        return $this->categoriaDao->listar();
    }

    public function listarEquipesPorCategoria($categoria_id) {
    return $this->equipeDao->listarPorCategoria($categoria_id);
}


    public function salvar($dados)
    {
        $p = new Piloto();
        $p->id = $dados['id'] ?? null;
        $p->nome = trim($dados['nome']);
        $p->idade = (int)$dados['idade'];
        $p->nacionalidade = trim($dados['nacionalidade']);
        $p->titulos = (int)$dados['titulos'];
        $p->equipe_id = (int)$dados['equipe_id'];
        $p->categoria_id = (int)$dados['categoria_id'];

        $erros = $this->validar($p);
        if ($erros) return $erros;

        if ($p->id) {
            $this->dao->atualizar($p);
        } else {
            $this->dao->inserir($p);
        }

        return [];
    }

    public function deletar($id)
    {
        return $this->dao->deletar($id);
    }

    private function validar(Piloto $p)
    {
        $e = [];
        if ($p->nome === '') $e[] = "Nome obrigatório.";
        if ($p->idade < 18) $e[] = "Idade mínima 18.";
        if ($p->titulos < 0) $e[] = "Títulos >=0.";
        if (!$p->equipe_id) $e[] = "Equipe obrigatória.";
        if (!$p->categoria_id) $e[] = "Categoria obrigatória.";
        return $e;
    }
}
