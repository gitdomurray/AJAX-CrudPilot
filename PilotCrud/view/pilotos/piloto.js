function detalhar(idPiloto) {
    var url = "/PilotCrud/PilotCrud/api/detalhar_piloto.php?idPiloto=" + idPiloto;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.onload = function() {
        var piloto = JSON.parse(xhttp.responseText);

        document.querySelector("#card_nome").innerHTML = piloto.nome;
        document.querySelector("#card_idade").innerHTML = piloto.idade;
        document.querySelector("#card_nacionalidade").innerHTML = piloto.nacionalidade;
        document.querySelector("#card_titulos").innerHTML = piloto.titulos;
        document.querySelector("#card_equipes").innerHTML = piloto.equipe;
        document.querySelector("#card_categoria").innerHTML = piloto.categoria;
    };
    xhttp.send();
}

function filtrarEquipes(categoriaSelect, equipeSelect) {
    var categoria_id = categoriaSelect.value;
    if (!categoria_id) {
        equipeSelect.innerHTML = "<option value=''>Selecione a equipe</option>";
        return;
    }

    var url = "/PilotCrud/PilotCrud/api/equipes_por_categoria.php?categoria_id=" + categoria_id;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);
    xhttp.onload = function() {
        var equipes = JSON.parse(xhttp.responseText);
        equipeSelect.innerHTML = "";

        equipes.forEach(function(e) {
            var option = document.createElement("option");
            option.value = e.id;
            option.text = e.nome;
            equipeSelect.add(option);
        });
    };
    xhttp.send();
}
