document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('meuModal');
    const btnAbrir = document.getElementById('abrirModal');
    const btnFecharX = document.getElementById('fecharModalX');
    const btnFechar = document.getElementById('fecharModalBtn');

    if (!modal || !btnAbrir || !btnFecharX || !btnFechar) {
        return;
    }

    const abrirModal = () => {
        modal.style.display = 'block';
        setTimeout(() => {
            modal.classList.add('mostrar');
        }, 10); 
    };

    const fecharModal = () => {
        modal.classList.remove('mostrar');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 200); 
    };

    btnAbrir.addEventListener('click', abrirModal);
    btnFecharX.addEventListener('click', fecharModal);
    btnFechar.addEventListener('click', fecharModal);

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            fecharModal();
        }
    });
});