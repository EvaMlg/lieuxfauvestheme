const secAgence = document.querySelector(".sec-agence");
const secValeurs = document.querySelector(".sec-valeurs");
const secExpertises = document.querySelector(".sec-expertises");
const secEquipe = document.querySelector(".sec-equipe");
const secRejoindre = document.querySelector(".sec-rejoindre");

const listChapterAgence =document.querySelector(".list-chapter-agence");


console.log(secAgence);
console.log(secValeurs);
console.log(secExpertises);
console.log(secEquipe);
console.log(secRejoindre);

const agenceSpan = document.querySelector('.spanAgence');
const valeursSpan = document.querySelector('.spanValeurs');
const expertisesSpan = document.querySelector('.spanExpertises');
const equipeSpan = document.querySelector('.spanEquipe');

let heightSecAgence = secAgence.clientHeight;
let heightSecValeurs = secValeurs.clientHeight;
let heightSecExpertises = secExpertises.clientHeight;
let heightSecEquipe = secEquipe.clientHeight;
let heightSecRejoindre = secRejoindre.clientHeight;

let section1 = heightSecAgence;
let section2 = heightSecAgence + heightSecValeurs;
let section3 = heightSecAgence + heightSecValeurs + heightSecExpertises;
let section4 = heightSecAgence + heightSecValeurs + heightSecExpertises + heightSecEquipe;
let section5 =  heightSecAgence + heightSecValeurs + heightSecExpertises + heightSecEquipe + heightSecRejoindre ;

window.addEventListener('scroll', function () {
    if (window.scrollY < section1) {
        valeursSpan.classList.remove("scroll");
        expertisesSpan.classList.remove("scroll");
        equipeSpan.classList.remove("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";
        devise.classList.remove("deviseOn");
    } else if (window.scrollY < section2) {
        valeursSpan.classList.add("scroll");
        expertisesSpan.classList.remove("scroll");
        equipeSpan.classList.remove("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";
        devise.classList.remove("deviseOn");
    } else if (window.scrollY < section3) {
        valeursSpan.classList.remove("scroll");
        expertisesSpan.classList.add("scroll");
        equipeSpan.classList.remove("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";
        devise.classList.remove("deviseOn");
    } else if (window.scrollY < section4) {
        valeursSpan.classList.remove("scroll");
        expertisesSpan.classList.remove("scroll");
        equipeSpan.classList.add("scroll");
        listChapterAgence.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        listChapterAgence.style.display="block";
        devise.classList.remove("deviseOn"); 
    } else if (window.scrollY < section4) {
        valeursSpan.classList.remove("scroll");
        expertisesSpan.classList.remove("scroll");
        equipeSpan.classList.add("scroll");
        listChapterAgence.classList.add("scroll-off");
        listChapterAgence.style.display="none";
        logoFrontpage.classList.add("scroll-off");
        devise.classList.add("deviseOn");
    }
    
}, false); 