document.querySelector('#loader .progressionBarInner').style.animation = "progressionBar 6s ease";
// window.onload = function () {
//     let imgs = ["/wp-content/themes/lieuxfauves/src/assets/img/lf_INTRO_image01.jpg","/wp-content/themes/lieuxfauves/src/assets/img/lf_INTRO_image03.jpg","/wp-content/themes/lieuxfauves/src/assets/img/lf_INTRO_image03.jpg","/wp-content/themes/lieuxfauves/src/assets/img/lf_INTRO_image04.jpg"],
//         image = document.querySelector('#loader img'),
//         index = 0;
//     function hop () {
//         image.src= imgs[(index++)%imgs.length];
//     };
//     cool = setInterval(hop,550);

// };

// setTimeout(function once() {

// clearInterval(cool); 
// }, 2500);






setTimeout(function once() {
    var state = document.readyState;
    if (state === "complete") {
        // Fully loaded!
        var element = document.getElementById("loader");
        // document.querySelector('#loader img').style.animation = "loaderOut 4s ease";
        document.querySelector('#loader video').style.animation = "loaderOut 3s ease";
        //document.querySelector('#loader .svg').style.animation = "loaderOut 4s ease";
        document.querySelector('#loader .progressionBar').style.animation = "loaderOut 3s ease";

        setTimeout(function () {
            document.querySelector('#loader video').style.display = "none";
        }, 3000)

        setTimeout(function () {
            element.parentNode.removeChild(element);
            document.querySelector('body').style.overflow = "visible";
        }, 3000)
    } else {
        window.addEventListener("load", () => {
            // Fully loaded!
            var element = document.getElementById("loader");
            // document.querySelector('#loader img').style.animation = "loaderOut 7s ease";
            document.querySelector('#loader video').style.animation = "loaderOut 3s ease";
            //document.querySelector('#loader .svg').style.animation = "loaderOut 7s ease";
            document.querySelector('#loader div').style.animation = "loaderOut 3s ease";

            setTimeout(function () {
                document.querySelector('#loader video').style.display = "none";
            }, 3000)


            setTimeout(function () {
                element.parentNode.removeChild(element);
                document.querySelector('body').style.overflow = "visible";
            }, 3000)
        });
    }
}, 6000);




setTimeout(function once() {
    var state = document.readyState;
    if (state === "complete") {
        // Fully loaded!
        var element = document.getElementById("loaderMobile");
        document.querySelector('#loaderMobile img').style.animation = "loaderOut 2s ease";
        document.querySelector('#loaderMobile .svgMobile').style.animation = "loaderOut 2s ease";

        setTimeout(function () {
            element.parentNode.removeChild(element);
            document.querySelector('body').style.overflow = "visible";
        }, 1900)
    } else {
        window.addEventListener("load", () => {
            // Fully loaded!
            var element = document.getElementById("loaderMobile");
            document.querySelector('#loaderMobile img').style.animation = "loaderOut 2s ease";
            document.querySelector('#loaderMobile .svgMobile').style.animation = "loaderOut 2s ease";
            document.querySelector('#loaderMobile div').style.animation = "loaderOut 2s ease";
            setTimeout(function () {
                element.parentNode.removeChild(element);
                document.querySelector('body').style.overflow = "visible";
            }, 1900)
        });
    }
}, 3000);

logoOpen = document.querySelector('.logo-open');
logoOpen.addEventListener('click', function () {
    if (document.querySelector('.projet-popup').style.display === "none") {
        document.querySelector('.projet-popup').style.display = "block";
        document.querySelector('.projet-popup').style.animation = "windowUp 0.2s ease"
    }
    else {
        document.querySelector('.projet-popup').style.display = "none";
    }
}, false);


logoClose = document.querySelector('.logo-close');
logoClose.addEventListener('click', function () {
    document.querySelector('.projet-popup').style.animation = "windowDown 0.2s ease"
    document.querySelector('.projet-popup').style.display = "none";
}, false);


jQuery(document).ready(function(){
    if(jQuery(window).width()>1024 && !getCookie('loaderViewed')){
        jQuery('body').css('overflow', 'hidden');
        jQuery('#loader').addClass('see');
        jQuery("#loaderMobile").addClass('see');
        setCookie('loaderViewed', true, 60);
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