document.addEventListener('DOMContentLoaded', function() {
    const btnMenuMobile = document.querySelector('.btn-menu-mobile');
    const cabecalho = document.querySelector('.cabecalho');
    const submenus = document.querySelectorAll('.tem-submenu');

    btnMenuMobile.addEventListener('click', function() {
        cabecalho.classList.toggle('menu-aberto');
        btnMenuMobile.classList.toggle('aberto'); 
    });

    submenus.forEach(function(item) {
        item.addEventListener('click', function(e) {
            if (window.innerWidth < 992 && !item.contains(e.target.closest('.submenu-lista'))) {
                e.preventDefault();
                item.classList.toggle('aberto');
            }
        });
    });
});