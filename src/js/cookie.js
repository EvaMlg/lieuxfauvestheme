jQuery(document).ready(function(){
    let cookieBanner = jQuery('<div/>').attr('id', 'cookie-container');
    if(!getCookie('user_consent')){
        jQuery('body').append(
            cookieBanner.append(
                jQuery('<p>Utilisation de cookies</p>'),
                jQuery('<p>Nous utilisons des cookies nécessaires au bon fonctionnement de notre site internet. Vous pouvez les retirer depuis les paramètres de votre navigateur, mais le site internet risque de ne plus fonctionner correctement.</p>'),
                jQuery('<button/>').text('Accepter').click(function(){
                    setCookie('user_consent', true, 60);
                    cookieBanner.remove();
                })
            )
        );
    }
})

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}