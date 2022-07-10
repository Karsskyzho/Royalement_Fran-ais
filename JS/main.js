import {responsiveNavBar} from './navbar.js';
import {API} from './scroll.js';
import {removeClass} from './scroll.js';
import {apiGouv} from './apiGouv.js';
import {Basket} from "./basket.js";

// ---------- Media Queries JavaScript-------------

const SCREENWIDTH = {
    EXTRALARGE: 1440,
    LARGE: 1312,
    MEDIUM: 800,
    SMALL: 600,
    EXTRASMALL: 414,
};

let larg = (window.innerWidth);


function getPath() {
    let path = location.pathname;

    if (path === '/') {
        return path;
    }

    return path.substring('/index.php'.length, path.length);
}

const main = () => {
    responsiveNavBar();
    console.log(larg);
    const route = getPath();
    //console.log(route);
    switch (route) {
        case '/':
            $(document).ready(function () {
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 28,
                    autoplay: true,
                    autoplayTimeout: 1800,
                    items: 4,
                })
            });
            if (larg > SCREENWIDTH.LARGE) {
                API();
            } else {
                removeClass();
            }
            break;

        case '/inscription':
            apiGouv();
            break;

        case '/layoutProduct':
            let addbasket = new Basket();
            break;

        case '/basket':
            let getbasket = new Basket();
            break;

        case '/products':
            let getNumberProducts = new Basket();
    }
};

addEventListener('load', main);