class TableManager {
    addFood(food, selectedMeal) {
        const table = $(`#tabela-${selectedMeal}`)
        const tableRow = $('<tr></tr>')
        const tableCellId = $('<td></td>')
        const tableCellName = $('<td></td>')
        const tableCellQuantity = $('<td></td>')

        this.insertCellTexts(tableCellId, tableCellName, tableCellQuantity, food);

        tableRow.append(tableCellId, tableCellName, tableCellQuantity)
        table.append(tableRow);
    }

    /**
     * @private
     * @param tableCellId
     * @param food
     * @param tableCellName
     * @param tableCellQuantity
     */
    insertCellTexts(tableCellId, tableCellName, tableCellQuantity, food) {
        tableCellId.text(food.id);
        tableCellId.addClass('hidden');
        tableCellName.text(food.name)
        tableCellQuantity.text(food.quantity)
    }
}
