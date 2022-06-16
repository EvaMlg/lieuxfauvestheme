jQuery(document).ready(function(){
logoOpen = document.querySelector('.logo-open');

logoOpen.addEventListener('mouseenter', function() { 
    if ( document.querySelector('.projet-popup').style.display === "none") {
        document.querySelector('.projet-popup').style.display = "block"; 
        document.querySelector('.projet-popup').style.animation = "windowUp 0.2s ease"
    }
    else {
        document.querySelector('.projet-popup').style.display = "none";
    }

 }, false);


 document.querySelector('.projet-popup').addEventListener('mouseleave', function () {
    document.querySelector('.projet-popup').style.display = "none";
    document.querySelector('.projet-popup').style.animation = "windowDown 0.2s ease"


 }, false);

//  logoOpen.addEventListener('click', function() { 
//     if ( document.querySelector('.projet-popup').style.display === "none") {
//         document.querySelector('.projet-popup').style.display = "block"; 
//         document.querySelector('.projet-popup').style.animation = "windowUp 0.2s ease"
//     }
//     else {
//         document.querySelector('.projet-popup').style.display = "none";
//     }

//  }, false);


//  document.querySelector('.projet-popup').addEventListener('click', function () {
//     document.querySelector('.projet-popup').style.display = "none";
//     document.querySelector('.projet-popup').style.animation = "windowDown 0.2s ease"


//  }, false);



logoOpenUrba = document.querySelector('.logo-open-urba');

logoOpenUrba.addEventListener('mouseenter', function() { 
    if ( document.querySelector('.projet-popup-urba').style.display === "none") {
        document.querySelector('.projet-popup-urba').style.display = "block"; 
        document.querySelector('.projet-popup-urba').style.animation = "windowUp 0.2s ease"
    }
    else {
        document.querySelector('.projet-popup-urba').style.display = "none";
    }

 }, false);
 document.querySelector('.projet-popup-urba').addEventListener('mouseleave', function () {
    document.querySelector('.projet-popup-urba').style.display = "none";
    document.querySelector('.projet-popup-urba').style.animation = "windowDown 0.2s ease"


 }, false);



/* logoOpenUrba.addEventListener('click', function() { 
    if ( document.querySelector('.projet-popup-urba').style.display === "none") {
        document.querySelector('.projet-popup-urba').style.display = "block"; 
        document.querySelector('.projet-popup-urba').style.animation = "windowUp 0.2s ease"
    }
    else {
        document.querySelector('.projet-popup-urba').style.display = "none";
    }

 }, false);
 document.querySelector('.projet-popup-urba').addEventListener('click', function () {
    document.querySelector('.projet-popup-urba').style.display = "none";
    document.querySelector('.projet-popup-urba').style.animation = "windowDown 0.2s ease"


 }, false);

 */


});