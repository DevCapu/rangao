class GetFieldValues {
    static getFieldsValues() {
        const selectedFoodId = $('#alimentos').val();

        return {
            id: selectedFoodId,
            name: $(`option[value="${selectedFoodId}"]`).text(),
            quantity: $('#quantidade').val()
        };
    }
}
