// show navbar

const showNavbar = (toggleId, navId, bodyId, headerId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId);


    //validar si las variables existen

    if (toggle && nav && bodypd && headerpd) {
        toggle.addEventListener('click', () => {
            //mostrar el navbar
            nav.classList.toggle('show');
            //cambiar el icono
            toggle.classList.toggle('bx-x');
            //añadir padding al body    
            bodypd.classList.toggle('body-pd');
            //añadir padding al header
            headerpd.classList.toggle('body-pd');
        });
    }
}

showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');


// link active

const linkColor = document.querySelectorAll('.nav_link');

function colorLink() {
    if (linkColor) {
        linkColor.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
    }
}

linkColor.forEach(l => l.addEventListener('click', colorLink))