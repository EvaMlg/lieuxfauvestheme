
element = document.querySelector('.logoOuvrirL');
console.log (element);
cross = document.querySelector('.logoOuvrirL img');
element.addEventListener('click', function() { 
    if ( document.querySelector('.ficheTechniqueL').style.display === "none") {
        document.querySelector('.ficheTechniqueL').style.display = "flex"; 
        document.querySelector('.ficheTechniqueL').style.animation = "windowDown 0.2s ease"
        cross.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_burguer-fermer.svg";
    }
    else {
        document.querySelector('.ficheTechniqueL').style.display = "none";
        cross.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir.svg";

    }

 }, false);





element = document.querySelector('.logoOuvrirM');
console.log (element);
crossM = document.querySelector('.logoOuvrirM img');
element.addEventListener('click', function() { 
    if ( document.querySelector('.ficheTechniqueM').style.display === "none") {
        document.querySelector('.ficheTechniqueM').style.display = "flex"; 
        document.querySelector('.ficheTechniqueM').style.animation = "windowDown 0.2s ease"
        crossM.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_menu_burguer-fermer.svg";
    }
    else {
        document.querySelector('.ficheTechniqueM').style.display = "none";
        crossM.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir.svg";

    }

 }, false);


