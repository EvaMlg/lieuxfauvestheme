jQuery(document).ready(function(){

document.addEventListener('DOMContentLoaded', function () {

    //met a jour le background color du menu et les elements de la navbar
    if (document.querySelector('.single-post')) {
        document.querySelector('.pictoCloseSingle').style.display = "block";
        document.querySelector('.pictoBurguer').style.display = "none";
        document.querySelector('.loupe').style.display = "none";
        
    } else if (document.querySelector('.single-explorations')) {
        document.querySelector('.pictoCloseSingle').style.display = "block";
        document.querySelector('.pictoBurguer').style.display = "none";
        document.querySelector('.loupe').style.display = "none";
        document.querySelector('.pictoCloseSingle').href = "/explorations";
        document.querySelector('.pictoCloseSingle').display = "block";

    } else {
        document.querySelector('.pictoCloseActu').style.display = "none";

    }
    

})


document.addEventListener('DOMContentLoaded', function () {

    //met a jour le background color du menu et les elements de la navbar
    if (document.querySelector('.single-post')) {
        document.querySelector('.pictoCloseSingleMobile').style.display = "block";
        document.querySelector('.responsiveBurger').style.display = "none";
        document.querySelector('.loupeMobile').style.display = "none";
        
    } else if (document.querySelector('.single-explorations')) {
        document.querySelector('.pictoCloseSingleMobile').style.display = "block";
        document.querySelector('.responsiveBurger').style.display = "none";
        document.querySelector('.loupeMobile').style.display = "none";
        document.querySelector('.pictoCloseSingleMobile').href = "/explorations";

    } else if (document.querySelector('.single-projets')) {
        document.querySelector('.logoResponsive').style.display = "none";
        document.querySelector('.loupeMobile').style.display = "none";

    } 
    
    else {
        document.querySelector('.pictoCloseSingleMobile').style.display = "none";

    }
    

})

});