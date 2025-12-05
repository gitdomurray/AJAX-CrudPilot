<?php
require_once __DIR__ . "/../util/Conexao.php";
require_once __DIR__ . "/../service/PilotoService.php";

class PilotoController
{
    private $service;

    public function __construct()
    {
        $this->service = new PilotoService(Conexao::getConexao());
    }

    public function index()
    {
        $pilotos = $this->service->listarPilotos();
        include __DIR__ . "/../view/pilotos/index.php";
    }

    public function create($dados = [])
    {
        $categorias = $this->service->listarCategorias();
        $equipes = $dados['equipes'] ?? [];
        $erros = $dados['erros'] ?? [];
        $old = $dados['old'] ?? [];
        include __DIR__ . "/../view/pilotos/create.php";
    }

    public function store($post)
    {
        $erros = $this->service->salvar($post);
        if ($erros) {
            $this->create(['erros' => $erros, 'old' => $post]);
        } else {
            header("Location: index.php");
        }
    }

    public function edit($id, $dados = [])
    {
        $piloto = $this->service->buscarPiloto($id);
        $categorias = $this->service->listarCategorias();
        $equipes = $dados['equipes'] ?? $this->service->listarEquipes();
        $erros = $dados['erros'] ?? [];
        include __DIR__ . "/../view/pilotos/edit.php";
    }

    public function update($id, $post)
    {
        $post['id'] = $id;
        $erros = $this->service->salvar($post);
        if ($erros) {
            $this->edit($id, ['erros' => $erros]);
        } else {
            header("Location: index.php");
        }
    }

    public function delete($id)
    {
        $this->service->deletar($id);
        header("Location: index.php");
    }

    public function buscarPorId($idPiloto)
    {
        return $this->service->buscarPiloto($idPiloto);
    }

    public function listarEquipesPorCategoria($categoria_id) {
    return $this->service->listarEquipesPorCategoria($categoria_id);
}

}
