(function () {
    const selectAlimentos = document.querySelector('#alimentos');
    fetch('/api/alimento')
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error("Não foi possível buscar os alimentos");
        })
        .then(json => {
            const opcoesDeAlimentos = json.map(opcao => {
                return (
                    `<option value="${opcao.id}">${opcao.nome}</option>`
                );
            });
            selectAlimentos.innerHTML = opcoesDeAlimentos.join('');
            $("#alimentos").trigger('contentChanged');
        })
        .catch(error => console.error(error));
})();
