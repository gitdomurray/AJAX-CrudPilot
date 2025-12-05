<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Pilotos</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='public/css/style.css'>
</head>

<body class='container mt-5'>
    <h1>Pilotos de Corrida</h1>
    <a href='index.php?action=create' class='btn btn-primary mb-3'>Novo Piloto</a>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Nacionalidade</th>
                <th>Títulos</th>
                <th>Equipe</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pilotos as $p): ?><tr>
                    <td><?= htmlspecialchars($p['nome']) ?></td>
                    <td><?= $p['idade'] ?></td>
                    <td><?= htmlspecialchars($p['nacionalidade']) ?></td>
                    <td><?= $p['titulos'] ?></td>
                    <td><?= htmlspecialchars($p['equipe']) ?></td>
                    <td><?= htmlspecialchars($p['categoria']) ?></td>
                    <td><a href='index.php?action=edit&id=<?= $p['id'] ?>' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='index.php?action=delete&id=<?= $p['id'] ?>' class='btn btn-danger btn-sm' onclick='return confirm("Confirma excluir?")'>Excluir</a>
                        <button class='btn btn-success btn-sm' onclick='detalhar(<?= $p['id'] ?>);'>Detalhar</a>
                    </td>
                </tr><?php endforeach; ?></tbody>
    </table>

    <div>
        <div>
            <span style="font-weight: bold;">Nome: </span>
            <span id="card_nome"></span>
        </div>

        <div>
            <span style="font-weight: bold;">Idade: </span>
            <span id="card_idade"></span>
        </div>

        <div>
            <span style="font-weight: bold;">Nacionalidade: </span>
            <span id="card_nacionalidade"></span>
        </div>

        <div>
            <span style="font-weight: bold;">Titulos: </span>
            <span id="card_titulos"></span>
        </div>

        <div>
            <span style="font-weight: bold;">Equipe: </span>
            <span id="card_equipes"></span>
        </div>

        <div>
            <span style="font-weight: bold;">Categoria: </span>
            <span id="card_categoria"></span>
        </div>
    </div>

    <script src="/PilotCrud/PilotCrud/view/pilotos/piloto.js"></script>
</body>

</html>