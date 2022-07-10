import ApiGouv from "./Api.js";

export const apiGouv = () => {
    // Variables
    const regionsSelect = document.getElementById('regions');
    const departementSelect = document.getElementById('departements');
    const citySelect = document.getElementById('city');
    const api = new ApiGouv();

    // Fonctions
    async function createCities() {
        const cities = await api.getCities(departementSelect.value);
        citySelect.innerHTML = ''
        for (let city of cities) {
            const option = document.createElement('option');
            option.setAttribute('value', city.code);
            option.textContent = `${city.nom}`;
            citySelect.appendChild(option);
        }

        return cities;
    }

    async function createDepartements() {
        const departements = await api.getDepartements(regionsSelect.value);
        departementSelect.innerHTML = '';
        for (let departement of departements) {
            const option = document.createElement('option');
            option.setAttribute('value', departement.code);
            option.textContent = `${departement.nom} (${departement.code})`;
            departementSelect.appendChild(option);
        }

        return departements;
    }

    async function createRegions() {
        const regions = await api.getRegions();
        regions.sort((a, b) => a.nom.localeCompare(b.nom));
        for (let region of regions) {
            const option = document.createElement('option');
            option.setAttribute('value', region.code);
            option.textContent = `${region.nom}`;
            regionsSelect.appendChild(option);
        }

        return regions;
    }

    // Events
    departementSelect.addEventListener('change', (event) => {
        createCities();
    });

    regionsSelect.addEventListener('change', (event) => {
        createDepartements().then((departements) => createCities());
    });

    // Au chargement de la page
    createRegions().then((regions) => createDepartements()).then((departements) => createCities());
}