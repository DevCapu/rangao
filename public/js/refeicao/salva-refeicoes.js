(function () {
    const buttonSalvar = document.querySelector("#salvarRefeições");
    buttonSalvar.addEventListener('click', () => {
        let requestBody = {};
        const tabelas = $('table');
        tabelas.each(function (index) {
            let alimentos = [];
            let periodo;

            meals = ['BREAKFAST', 'LUNCH', 'AFTERNOON_COFFEE', 'DINNER'];
            periodo = meals[index];
            const tr = $(this).children('tbody').children('tr');
                tr.each(function () {
                const tdId = $(this).children('td').eq(0);
                const tdQuantidade = $(this).children('td').eq(2);
                const alimento = {id: tdId.text(), quantity: tdQuantidade.text()};
                alimentos = [...alimentos, alimento];
            });
            requestBody = {"period": periodo, "foods": alimentos, "id": id};
            const body = JSON.stringify(requestBody);
            console.log(body);
            fetch('/api/meal',
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
                    throw new Error("Não foi possível buscar os alimentos");
                })
                .then(json => {
                    console.log(json);
                })
                .catch(error => console.error(error));
        });
    });
})();
