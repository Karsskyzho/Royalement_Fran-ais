export default class ApiGouv {
    constructor() {
        this.baseUrl = 'https://geo.api.gouv.fr';
    }

    getRegions() {
        return fetch(`${this.baseUrl}/regions`).then(response => response.json());
    }

    getDepartements(region) {
        return fetch(`${this.baseUrl}/regions/${region}/departements`).then(response => response.json());
    }

    getCities(departement) {
        return fetch(`${this.baseUrl}/departements/${departement}/communes`).then(response => response.json());
    }
}