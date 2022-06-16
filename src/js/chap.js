jQuery(document).ready(function(){

const devise = document.querySelector('.devise');

const lieuxSpan = document.querySelector('.lieuxSpan');
const faireSpan = document.querySelector('.faireSpan');
const archiSpan = document.querySelector('.archiSpan');
const urbaSpan = document.querySelector('.urbaSpan');
const vivantSpan = document.querySelector('.vivantSpan');
const ethiqueSpan = document.querySelector('.ethiqueSpan');
const soutenableSpan = document.querySelector('.soutenableSpan');



const secLieux = document.querySelector('.sec-lieux');
const secFaire = document.querySelector('.sec-faire');
const secArchiUrba = document.querySelector('.sec-archiurba');
const secVes = document.querySelector('.sec-ves');
const secFooter = document.querySelector('.sec-footer');

const listChapter = document.querySelector('.list-chapter');

const logoFrontpage = document.querySelector('.logoFrontpage');

let heightSecLieux = secLieux.clientHeight;
let heightSecFaire = secFaire.clientHeight;
let heightSecArchiUrba = secArchiUrba.clientHeight;
let heightSecVes = secVes.clientHeight;

let sectionUn = heightSecLieux;
let sectionDeux = heightSecLieux + heightSecFaire;
let sectionTrois = heightSecLieux + heightSecFaire + heightSecArchiUrba;
let sectionQuatre = heightSecLieux + heightSecFaire + heightSecArchiUrba + heightSecVes;
let sectionCinq = heightSecLieux + heightSecFaire + heightSecArchiUrba + heightSecVes;


const splitRight = document.querySelector('.split-right');
let sectionSplit = splitRight.clientHeight;

console.log(sectionUn);
console.log(sectionDeux);
console.log(sectionTrois);
console.log(sectionQuatre);
console.log(sectionCinq);
console.log(sectionSplit);


// Flèche qui s'affiche à la moitié du main
const arrow = document.querySelector('.flecheBas')
const mainHeight = (document.querySelector('.main').clientHeight / 2)
window.addEventListener('scroll', function () {
    if (window.scrollY > mainHeight) {
        arrow.style.display = "block";

    }
    else if (window.scrollY < mainHeight) {
        arrow.style.display = "none";

    }
}, false);



window.addEventListener('scroll', function () {
    if (window.scrollY < sectionUn) {
        lieuxSpan.classList.add("scroll");
        lieuxSpan.classList.add("transition");
        faireSpan.classList.remove("scroll");
        archiSpan.classList.remove("scroll");
        urbaSpan.classList.remove("scroll");
        vivantSpan.classList.remove("scroll");
        ethiqueSpan.classList.remove("scroll");
        soutenableSpan.classList.remove("scroll");
        listChapter.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        devise.classList.remove("deviseOn");
    } else if (window.scrollY < sectionDeux) {
        lieuxSpan.classList.remove("scroll");
        faireSpan.classList.add("scroll");
        faireSpan.classList.add("transition");
        archiSpan.classList.remove("scroll");
        urbaSpan.classList.remove("scroll");
        vivantSpan.classList.remove("scroll");
        ethiqueSpan.classList.remove("scroll");
        soutenableSpan.classList.remove("scroll");
        listChapter.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        devise.classList.remove("deviseOn");
    } else if (window.scrollY < sectionTrois) {
        lieuxSpan.classList.remove("scroll");
        faireSpan.classList.remove("scroll");
        archiSpan.classList.add("scroll");
        urbaSpan.classList.add("scroll");
        archiSpan.classList.add("transition");
        urbaSpan.classList.add("transition");
        vivantSpan.classList.remove("scroll");
        ethiqueSpan.classList.remove("scroll");
        soutenableSpan.classList.remove("scroll");
        listChapter.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        devise.classList.remove("deviseOn");
    } else if (window.scrollY < sectionQuatre) {
        lieuxSpan.classList.remove("scroll");
        faireSpan.classList.remove("scroll");
        archiSpan.classList.remove("scroll");
        urbaSpan.classList.remove("scroll");
        vivantSpan.classList.add("scroll");
        ethiqueSpan.classList.add("scroll");
        vivantSpan.classList.add("transition");
        ethiqueSpan.classList.add("transition");
        soutenableSpan.classList.add("scroll");
        listChapter.classList.remove("scroll-off");
        logoFrontpage.classList.remove("scroll-off");
        devise.classList.remove("deviseOn");
    } else {
        listChapter.classList.add("scroll-off");
        lieuxSpan.classList.add("scroll");
        faireSpan.classList.add("scroll");
        archiSpan.classList.add("scroll");
        urbaSpan.classList.add("scroll");
        vivantSpan.classList.add("scroll");
        ethiqueSpan.classList.add("scroll");
        soutenableSpan.classList.add("scroll");
        lieuxSpan.classList.add("transition");
        faireSpan.classList.add("transition");
        archiSpan.classList.add("transition");
        urbaSpan.classList.add("transition");
        vivantSpan.classList.add("transition");
        ethiqueSpan.classList.add("transition");
        soutenableSpan.classList.add("transition");
        logoFrontpage.classList.add("scroll-off");
        devise.classList.add("deviseOn");
       
    }


}, false);

});