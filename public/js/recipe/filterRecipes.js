(function () {
    const categoryList = document.querySelector('#js-categoryList');
    const cardResults = document.querySelector('.js-results');
    categoryList.addEventListener('click', function (e) {
        const target = e.target;
        if (target.classList.contains('category__item')) {
            const httpClient = new HttpClient();
            const filteredFood = target.textContent;
            if (filteredFood === 'Todos') location.reload();
            httpClient.get(`/recipes?category=${filteredFood}`)
                .then(json => {
                    const cardsResultados = json.map(recipe => {
                        return `<a class="recipe__card" href="recipes/${recipe.id}">
                            <div class="recipe__header">
                                <img class="recipe__image"
                                     src="${recipe.photo}" width="300" height="300"
                                     alt="${recipe.name}">
                                <span class="recipe__title">${recipe.name}</span>
                            </div>
                            <div class="recipe__body">
                                <div class="recipe__calories">${recipe.calories} Kcal</div>
                                <div class="recipe__time">${recipe.timeToPrepare} minutos</div>
                                <div class="recipe__difficulty">${recipe.difficulty}</div>
                            </div>
                        </a>`;
                    }).join('');
                    const wrapper = document.createElement('div');
                    wrapper.innerHTML = cardsResultados;
                    cardResults.querySelector('.category__name').textContent = filteredFood;
                    cardResults.querySelectorAll('.recipe__card').forEach(element => {
                        cardResults.removeChild(element);
                    })
                    document.querySelectorAll('.js-results').forEach((el, index) => {
                        if (index !== 0) {
                            el.parentNode.removeChild(el);
                        }
                    })

                    cardResults.append(...wrapper.childNodes);
                    const oldActiveItem = document.querySelector('.category__item--active');
                    oldActiveItem.classList.remove('category__item--active');
                    target.classList.add('category__item--active');
                })
                .catch(error => console.log(error));
        }
    })
})();
