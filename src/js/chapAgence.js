jQuery(document).ready(function(){
const secAgence = document.querySelector(".sec-agence");
const secValeurs = document.querySelector(".sec-valeurs");
const secExpertises = document.querySelector(".sec-expertises");
const secEquipe = document.querySelector(".sec-equipe");
const secRejoindre = document.querySelector(".sec-rejoindre");

const listChapterAgence = document.querySelector(".list-chapter-agence");

const agenceSpan = document.querySelector('.spanAgence');
const valeursSpan = document.querySelector('.spanValeurs');
const expertisesSpan = document.querySelector('.spanExpertises');
const equipeSpan = document.querySelector('.spanEquipe');

let heightSecAgence = secAgence.clientHeight;
let heightSecValeurs = secValeurs.clientHeight;
let heightSecExpertises = secExpertises.clientHeight;
let heightSecEquipe = secEquipe.clientHeight;
let heightSecRejoindre = secRejoindre.clientHeight;

let section1 = (heightSecAgence -10);
let section2 = (heightSecAgence + heightSecValeurs -10);
let section3 = (heightSecAgence + heightSecValeurs + heightSecExpertises -10);
let section4 = (heightSecAgence + heightSecValeurs + heightSecExpertises + heightSecEquipe -10);


window.addEventListener('scroll', function () {
    if (window.scrollY < 0) {
        valeursSpan.classList.remove("scroll");
        expertisesSpan.classList.remove("scroll");
        equipeSpan.classList.remove("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";

    } else if (window.scrollY < section2) {
        valeursSpan.classList.add("scroll");
        expertisesSpan.classList.remove("scroll");
        equipeSpan.classList.remove("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";
       
    } else if (window.scrollY < section3) {
        valeursSpan.classList.remove("scroll");
        expertisesSpan.classList.add("scroll");
        equipeSpan.classList.remove("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";
       
    } else if (window.scrollY < section4  ) {
        valeursSpan.classList.remove("scroll");
        expertisesSpan.classList.remove("scroll");
        equipeSpan.classList.add("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";
    }
    
}, false); 


window.addEventListener('scroll', function () { 
    if (window.scrollY >  section4) {
        listChapterAgence.style.display="none";
        document.querySelector('.page-template-template-agence .logoFrontpage').classList.remove("scroll");
        document.querySelector('.page-template-template-agence .logoFrontpage').classList.add("scroll-off");
       
    }
    else {
        listChapterAgence.style.display="block";
        document.querySelector('.page-template-template-agence .logoFrontpage').classList.remove("scroll-off");
        document.querySelector('.page-template-template-agence .logoFrontpage').classList.add("scroll");

    }
});


// const arrowAgence = document.querySelector('.flecheBas')
// window.addEventListener('scroll', function () {
//     if (window.scrollY >  section3) {
//         arrow.style.display = "block";

//     }
//     else if (window.scrollY <  section3) {
//         arrow.style.display = "none";

//     }
// }, false);

});