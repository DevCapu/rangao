(function () {
    const formAlimento = document.querySelector('#adicionaAlimento');
    formAlimento.addEventListener('submit', event => {
        event.preventDefault();
        const food = GetFieldValues.getFieldsValues();
        new TableManager().addFood(food, $('#refeicao').val())
    })
})()
