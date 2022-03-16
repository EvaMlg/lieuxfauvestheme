z = document.querySelector('.logoDistinctions');

z.addEventListener('click', function() { 
    
    if ( document.querySelector('.distinctionsToggleWrapper').style.display === "none") {
        document.querySelector('.distinctionsToggleWrapper').style.display = "block"; 
        document.querySelector('.distinctionsToggleWrapper').style.animation = "windowDown 0.2s ease";
        z.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_trait_fermer_gris.svg";


    }
    else {
        document.querySelector('.distinctionsToggleWrapper').style.display = "none";
        z.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir_gris.svg";

    }

 }, false);



 x = document.querySelector('.logoDistinctionsClone');

 x.addEventListener('click', function() { 
     
     if ( document.querySelector('.distinctionsToggleWrapperClone').style.display === "none") {
         document.querySelector('.distinctionsToggleWrapperClone').style.display = "block"; 
         document.querySelector('.distinctionsToggleWrapperClone').style.animation = "windowDown 0.2s ease";
         x.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_trait_fermer_gris.svg";
 
 
     }
     else {
         document.querySelector('.distinctionsToggleWrapperClone').style.display = "none";
         x.src="/wp-content/themes/lieuxfauves/src/assets/img/LF_picto_plus_ouvrir_gris.svg";
 
     }
 
  }, false);
 
 