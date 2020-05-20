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

    /**
     * @param {string} resource
     * @param {json} requestBody
     */
    post(resource, requestBody) {
        const body = JSON.stringify(requestBody)
        console.log(body)
        return fetch(this.baseUrl + resource,
            {
                method: 'POST',
                body,
                headers: new Headers({"Content-Type": "application/json"})
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Não foi possível buscar o alimento')
            })
            .catch(error => console.log(error))
    }
}
