const barMenu = document.querySelector('.sideNavWrapper');
console.log(barMenu);


window.addEventListener('scroll', function () {
    if (window.scrollY < splitRight) {
        devise.classList.add("deviseOn");
    } else {
        devise.classList.remove("deviseOn");
    }
}, false);
        document.body.style.backgroundColor = 'green';
