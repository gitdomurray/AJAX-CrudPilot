<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Editar Piloto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body class="container mt-5">

    <h1>Editar Piloto</h1>

    <!-- Exibe erros -->
    <?php if (!empty($erros)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($erros as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?action=update&id=<?= $piloto['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input name="nome" class="form-control" value="<?= $piloto['nome'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Idade</label>
            <input type="number" name="idade" class="form-control" value="<?= $piloto['idade'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nacionalidade</label>
            <input name="nacionalidade" class="form-control" value="<?= $piloto['nacionalidade'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Títulos</label>
            <input type="number" name="titulos" class="form-control" value="<?= $piloto['titulos'] ?>">
        </div>

        <!-- Select Categoria -->
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select id="categoria_id" name="categoria_id" class="form-select">
                <option value="">Selecione a categoria</option>
                <?php foreach ($categorias as $c): ?>
                    <option value="<?= $c['id'] ?>" <?= $piloto['categoria_id'] == $c['id'] ? "selected" : "" ?>>
                        <?= $c['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Select Equipe -->
        <div class="mb-3">
            <label class="form-label">Equipe</label>
            <select id="equipe_id" name="equipe_id" class="form-select">
                <option value="">Selecione a equipe</option>
                <?php foreach ($equipes as $e): ?>
                    <option value="<?= $e['id'] ?>" <?= $piloto['equipe_id'] == $e['id'] ? "selected" : "" ?>>
                        <?= $e['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button class="btn btn-success">Atualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>

    </form>

    <script>
        document.getElementById('categoria_id').addEventListener('change', function() {
            const categoriaId = this.value;
            fetch(`api/equipes_por_categoria.php?categoria_id=${categoriaId}`)
                .then(resp => resp.json())
                .then(data => {
                    const selectEquipes = document.getElementById('equipe_id');
                    selectEquipes.innerHTML = '<option value="">Selecione a equipe</option>';
                    data.forEach(equipe => {
                        const opt = document.createElement('option');
                        opt.value = equipe.id;
                        opt.textContent = equipe.nome;
                        selectEquipes.appendChild(opt);
                    });
                })
                .catch(err => console.error('Erro ao buscar equipes:', err));
        });
    </script>

</body>
</html>
