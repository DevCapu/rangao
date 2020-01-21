(function () {
    const buttonSalvar = document.querySelector("#salvarRefeições");

    buttonSalvar.addEventListener('click', () => {
        const tabelas = document.querySelectorAll('table');
        tabelas.forEach((tabela, index) => {
            console.log(tabela, index);

        })
    });
})();
