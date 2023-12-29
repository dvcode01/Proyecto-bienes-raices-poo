document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
    darkMode();
});

function eventListeners(){
    const menuResponsive = document.querySelector('.mobile-menu');
    menuResponsive.addEventListener('click', showMenu);
}

function darkMode(){
    const btnMode = document.querySelector('.btn-mode');
    const preferensMode = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(preferensMode);

    if(preferensMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    btnMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });

    preferensMode.addEventListener('change', () => {
        if(preferensMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    });
}

function showMenu(){
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}



