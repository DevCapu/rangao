(function () {
    const buttonSalvar = document.querySelector("#salvarRefeições");

    buttonSalvar.addEventListener('click', () => {
        const tabelas = document.querySelectorAll('table');
        tabelas.forEach((tabela, index) => {
            console.log(tabela, index);

        })
        fetch('/api/refeicao',
            {
                method: "POST",
                body: JSON.stringify({refeicao: "Café da manhã"})
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                console.log(response)
                throw new Error("Não foi possível buscar os alimentos");
            })
            .then(json => {
                console.log(json);
            })
            .catch(error => console.error(error));
    });
})();
