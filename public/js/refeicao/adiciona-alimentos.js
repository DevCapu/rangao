(function () {
    const formAlimento = document.querySelector('#adicionaAlimento');

    formAlimento.addEventListener('submit', (event) => {
        event.preventDefault();
        const refeicaoEscolhida = document.querySelector('#refeicao').value;
        const selectAlimentoEscolhido = document.querySelector('#alimentos');
        const alimentoEscolhido = selectAlimentoEscolhido.value;
        const optionAlimentoEscolhido = selectAlimentoEscolhido.querySelector(`option[value="${alimentoEscolhido}"]`);
        const optionAlimentoEscolhidoTexto = optionAlimentoEscolhido.textContent;
        const quantidade = document.querySelector('#quantidade').value;
        const tabela = document.querySelector(`#tabela-${refeicaoEscolhida} tbody`);
        const novaTr = document.createElement('tr');
        const tdId = document.createElement('td');
        const tdNome = document.createElement("td");
        const tdQuantidade = document.createElement("td");
        tdId.textContent = alimentoEscolhido;
        tdId.classList.add('hidden');
        tdNome.textContent = optionAlimentoEscolhidoTexto;
        tdQuantidade.textContent = quantidade;
        novaTr.appendChild(tdId);
        novaTr.appendChild(tdNome);
        novaTr.appendChild(tdQuantidade);
        tabela.appendChild(novaTr);
    })
})();
