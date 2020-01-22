(function () {
    const buttonSalvar = document.querySelector("#salvarRefeições");
    buttonSalvar.addEventListener('click', () => {
        let requestBody = {};
        const tabelas = $('table');
        tabelas.each(function (index) {
            let alimentos = [];
            let periodo;
            console.log(index);
            switch (index) {
                case 0:
                    periodo = 'CAFÉ DA MANHÃ';
                    break;
                case 1:
                    periodo = 'ALMOÇO';
                    break;
                case 2:
                    periodo = 'CAFÉ DA TARDE';
                    break;
                case 3:
                    periodo = 'JANTAR';
                    break;
            }
            console.log(periodo);
            const tr = $(this).children('tbody').children('tr');
                tr.each(function () {
                const tdId = $(this).children('td').eq(0);
                const tdQuantidade = $(this).children('td').eq(2);
                const alimento = {id: tdId.text(), quantidade: tdQuantidade.text()};
                alimentos = [...alimentos, alimento];
            });
            requestBody = {periodo: periodo, alimentos: alimentos};
            const body = JSON.stringify(requestBody);

            fetch('/api/refeicao',
                {
                    method: 'POST',
                    body: body,
                    headers: new Headers({
                        "Content-Type": "application/json"
                    })
                }
            )
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    console.log(response);
                    throw new Error("Não foi possível buscar os alimentos");
                })
                .then(json => {
                    console.log(json);
                })
                .catch(error => console.error(error));
        });
    });
})();
