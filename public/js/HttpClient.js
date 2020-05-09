class HttpClient {
    constructor() {
        this.baseUrl = "http://localhost:8000/api";
    }

    /**
     * @param {string} resource
     */
    get(resource) {
        return fetch(this.baseUrl + resource)
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Não foi possível buscar o alimento')
            })
            .catch(error => console.log(error))
    }
}
