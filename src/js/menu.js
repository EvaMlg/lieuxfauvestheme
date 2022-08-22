jQuery(document).ready(function(){

const fullMenu = document.querySelector('.fullMenu');
const burgerButton = document.querySelector('.burgerButton');
const buttonOn = document.querySelector('.menuIcon');
const buttonOff = document.querySelector('.closeIcon');
const sideNavWrapper = document.querySelector('.sideNavWrapper');
const sideNav = document.querySelector('.sideNav');
const flecheBas = document.querySelector('.flecheBas');
const picto = document.querySelector('.pictoLogo');

const searchMenu = document.querySelector('#searchMenu');
const pictoBurguer = document.querySelector('.closeIcon');

// const allResults = document.getElementById('all_results');
// console.log (allResults)
// const total_result = document.getElementById('total_result');
// console.log (total_result)


const loupe = document.querySelector('.loupe');
const loupeMobile = document.querySelector('.loupeMobile');
const logoFrontpage = document.querySelector('.logoFrontpage');




loupe.addEventListener('click', function () {
    if (searchMenu.classList.contains('fullMenuOff')) {
        searchMenu.classList.remove("fullMenuOff");
        searchMenu.classList.add("fullMenuOn");
        searchMenu.style.animation = "transition 2s ease";
        document.querySelector('.responsiveBurger').style.display = "none";
        document.querySelector('.logoResponsive').src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_logo_blanc.svg";
        buttonOn.style.display = "none";
        sideNavWrapper.style.backgroundColor = "rgb(0,83,78)";
        buttonOff.style.display = "flex";
        sideNav.style.display = "none";
        flecheBas.style.display = "none";
        pictoBurguer.style.display = "none";
        loupe.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_menu_burguer-fermer.svg";
        picto.style.display = "none";
        logoFrontpage.style.display="none";

    } else if (document.querySelector('.single-explorations')) {
        document.querySelector('.responsiveBurger').style.display = "block";
        fullMenu.classList.remove("fullMenuOn");
        fullMenu.classList.add("fullMenuOff");
        searchMenu.classList.remove("fullMenuOn");
        searchMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "none";
        //loupe.src="/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";

        picto.style.display = "block";
        document.querySelector('div#sideNavWrapper').style.backgroundColor = "rgb(229, 238, 237)";
        document.querySelector('.menu-item-383 a').classList.add("inactivePage2");
        document.querySelector('.menu-item-382 a').classList.add("activePage");
        document.querySelector('.menu-item-381 a').classList.add("inactivePage2");
        document.querySelector('.menu-item-418 a').classList.add("inactivePage2");
        logoFrontpage.style.display="none";
    } else {
        document.querySelector('.responsiveBurger').style.display = "block";
        document.querySelector('.logoResponsive').src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_logo.svg";
        searchMenu.classList.remove("fullMenuOn");
        searchMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "none";
        loupe.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";
        picto.style.display = "block";
        logoFrontpage.style.display="block";

    }
}, false);


loupeMobile.addEventListener('click', function () {
    if (searchMenu.classList.contains('fullMenuOff')) {
        searchMenu.classList.remove("fullMenuOff");
        searchMenu.classList.add("fullMenuOn");
        searchMenu.style.animation = "transition 2s ease";
        document.querySelector('.responsiveBurger').style.display = "none";
        document.querySelector('.logoResponsive').src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_logo_blanc.svg";
        buttonOn.style.display = "none";
        sideNavWrapper.style.backgroundColor = "rgb(0,83,78)";
        buttonOff.style.display = "flex";
        sideNav.style.display = "none";
        flecheBas.style.display = "none";
        pictoBurguer.style.display = "none";
        loupeMobile.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_menu_burguer-fermer.svg";
        picto.style.display = "none";

    } else if (document.querySelector('.single-explorations')) {
        document.querySelector('.responsiveBurger').style.display = "block";
        fullMenu.classList.remove("fullMenuOn");
        fullMenu.classList.add("fullMenuOff");
        searchMenu.classList.remove("fullMenuOn");
        searchMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "block";
        //loupe.src="/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";

        picto.style.display = "block";
        document.querySelector('div#sideNavWrapper').style.backgroundColor = "rgb(229, 238, 237)";
        document.querySelector('.menu-item-383 a').classList.add("inactivePage2");
        document.querySelector('.menu-item-382 a').classList.add("activePage");
        document.querySelector('.menu-item-381 a').classList.add("inactivePage2");
        document.querySelector('.menu-item-418 a').classList.add("inactivePage2");
    } else {
        document.querySelector('.responsiveBurger').style.display = "block";
        document.querySelector('.logoResponsive').src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_logo.svg";
        searchMenu.classList.remove("fullMenuOn");
        searchMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "block";
        loupeMobile.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";
        picto.style.display = "block";




    }
}, false);





burgerButton.addEventListener('click', function () {
    if (fullMenu.classList.contains('fullMenuOff')) {
        fullMenu.classList.remove("fullMenuOff");
        fullMenu.classList.add("fullMenuOn");
        fullMenu.style.animation = "transition 2s ease";
        buttonOn.style.display = "none";
        buttonOff.style.display = "flex";
        sideNavWrapper.style.backgroundColor = "rgb(0,83,78)";
        sideNav.style.display = "none";
        flecheBas.style.display = "none";
        loupe.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_menu_loupe.svg";
        picto.style.display = "none";
        logoFrontpage.style.display="none";
    } else if (document.querySelector('.single-explorations')) {
        fullMenu.classList.remove("fullMenuOn");
        fullMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "none";
        loupe.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";
        picto.style.display = "block";
        logoFrontpage.style.display="block";
        document.querySelector('div#sideNavWrapper').style.backgroundColor = "#f4f4f4";
        document.querySelector('.menu-item-383 a').classList.add("inactivePage2");
        document.querySelector('.menu-item-382 a').classList.add("activePage");
        document.querySelector('.menu-item-381 a').classList.add("inactivePage2");
        document.querySelector('.menu-item-418 a').classList.add("inactivePage2");
    } else if (document.querySelector('.single-post')) {
        fullMenu.classList.remove("fullMenuOn");
        fullMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "none";
        loupe.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";
        picto.style.display = "block";
        logoFrontpage.style.display="block";
        document.querySelector('div#sideNavWrapper').style.backgroundColor = "#f4f4f4";
        document.querySelector('.menu-item-383 a').classList.add("inactivePage");
        document.querySelector('.menu-item-382 a').classList.add("inactivePage");
        document.querySelector('.menu-item-381 a').classList.add("inactivePage");
        document.querySelector('.menu-item-418 a').classList.add("activePage");
    } else if (document.querySelector('.single-projets div#sideNavWrapper')) {
        fullMenu.classList.remove("fullMenuOn");
        fullMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "none";
        loupe.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";
        picto.style.display = "block";
        logoFrontpage.style.display="block";
        document.querySelector('div#sideNavWrapper').style.backgroundColor = "transparent";
        document.querySelector('.menu-item-383 a').classList.add("inactivePage3");
        document.querySelector('.menu-item-382 a').classList.add("inactivePage3");
        document.querySelector('.menu-item-381 a').classList.add("inactivePage4");
        document.querySelector('.menu-item-418 a').classList.add("inactivePage3");}
    
    else {
        fullMenu.classList.remove("fullMenuOn");
        fullMenu.classList.add("fullMenuOff");
        buttonOn.style.display = "flex";
        buttonOff.style.display = "none";
        sideNavWrapper.style.backgroundColor = "white";
        sideNav.style.display = "block";
        flecheBas.style.display = "none";
        loupe.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";
        picto.style.display = "block";
        logoFrontpage.style.display="block";
    }
}, false);







const responsiveBurger = document.querySelector('.responsiveBurger');
const logoResponsive = document.querySelector('.logoResponsive');
const responsiveBurgerImg = document.querySelector('.responsiveBurgerImg');



responsiveBurger.addEventListener('click', function () {
    if (fullMenu.classList.contains('fullMenuOff')) {
        fullMenu.classList.remove("fullMenuOff");
        fullMenu.classList.add("fullMenuOn");
        logoResponsive.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_logo_blanc.svg";
        loupeMobile.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_menu_loupe.svg";
        responsiveBurgerImg.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_menu_burguer-fermer.svg";
        fullMenu.style.animation = "transition 2s ease";
    } else {
        fullMenu.classList.remove("fullMenuOn");
        fullMenu.classList.add("fullMenuOff");
        logoResponsive.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_logo.svg";
        responsiveBurgerImg.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_menu-burguer.svg";
        loupeMobile.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_loupe.svg";


    }
}, false);


const responsiveCatLogo = document.querySelector('.responsiveCatLogo');
const responsiveCat = document.querySelector('.reponsiveCat');
const catHeader = document.querySelector('.categoryHeader');
const titleProjResponsive = document.querySelector('.projPageNameResponsive');
const titleProjLaptop = document.querySelector('.projPageName');
const pictoValider = document.querySelector('.pictoValider');
const responsiveBurgerImgCat = document.querySelector('.responsiveBurgerImg');
const pictofiltres = document.querySelector('.pictoFiltres');

const responsiveMenu = document.querySelector('.responsive-menu');



responsiveCatLogo.addEventListener('click', function () {
    if (catHeader.classList.contains('catHeaderOff')) {
        document.querySelector('.pictoResponsive').display = "none";
        catHeader.classList.add("catHeaderOn");
        catHeader.classList.remove("catHeaderOff");
        catHeader.style.animation = "transition 2s ease";
        pictoValider.style.display = "block";
        titleProjResponsive.style.display = "block";
        titleProjLaptop.style.display = "none";
        responsiveMenu.style.display="none";
        pictofiltres.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_mobile_picto-filtres-fermer_gris.svg";
        responsiveCat.style.backgroundColor = "transparent";
    } else {
        catHeader.classList.remove("catHeaderOn");
        catHeader.classList.add("catHeaderOff");
        pictoValider.style.display = "none";
        titleProjResponsive.style.display = "none";
        titleProjLaptop.style.display = "block";
        loupeMobile.style.display = "block";
        responsiveMenu.style.display="flex";
        pictofiltres.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_mobile_picto-filtres.svg";
        responsiveBurgerImgCat.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_nav_menu-burguer.svg";
        responsiveCat.style.backgroundColor = "#00534e";

    }
}, false);

pictoValider.addEventListener('click', function () {
    if ( catHeader.classList.contains("catHeaderOn")){
    catHeader.classList.remove("catHeaderOn");
    catHeader.classList.add("catHeaderOff");
    titleProjResponsive.style.display = "none";
    titleProjLaptop.style.display = "block";
    pictoValider.style.display = "none";
    loupeMobile.style.display = "none";
    responsiveCat.style.backgroundColor = "#00534e";
    pictofiltres.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_mobile_picto-filtres.svg";

    }
    else {
        catHeader.classList.remove("catHeaderOff");
        catHeader.classList.add("catHeaderOn");
        titleProjResponsive.style.display = "none";
        titleProjLaptop.style.display = "block";
        pictoValider.style.display = "none";
        loupeMobile.style.display = "none";
        responsiveCat.style.backgroundColor = "#00534e";
        pictofiltres.src = "/wp-content/themes/lieuxfauves/src/assets/img/lf_mobile_picto-filtres.svg";

    }
}, false);

});