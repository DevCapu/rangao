(function () {
    const httpClient = new HttpClient();
    httpClient.get('/foods')
        .then(json => {
            const foodOptions = json.map(food => (
                `<option value="${food.id}">${food.name}</option>`
            ))

            const foodDropdown = $('#alimentos');
            foodDropdown.append(foodOptions.join(''))
            $("#alimentos").trigger('contentChanged');
        });
})()
