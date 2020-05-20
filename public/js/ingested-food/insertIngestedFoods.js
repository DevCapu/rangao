(function () {
    $('#insertIngestedFoods').click(function () {
        let foods = [];
        let periods = ['BREAKFAST', 'LUNCH', 'AFTERNOON_COFFEE', 'DINNER'];

        $('table').each(function (index) {
            const rows = $(this).children('tbody').children('tr');
            period = periods[index];
            rows.each(function () {
                const id = $(this).children('td').eq(0).text();
                const quantity = $(this).children('td').eq(2).text();
                const ingestedFood = {id, quantity, period};
                foods = [...foods, ingestedFood];
            })
        })
        const requestBody = {ingestedFoods: foods, id};
        var httpClient = new HttpClient();
        httpClient.post('/meal', requestBody);
    });
})();
