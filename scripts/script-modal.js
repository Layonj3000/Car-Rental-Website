document.addEventListener('DOMContentLoaded', () => {

    // ===== FUNÇÕES GLOBAIS PARA REUTILIZAÇÃO =====

    /**
     * Abre um modal adicionando a classe 'mostrar'.
     * @param {HTMLElement} modal O elemento do modal a ser aberto.
     */
    const abrirModal = (modal) => {
        if (!modal) return; // Não faz nada se o modal não existir
        modal.style.display = 'block';
        setTimeout(() => {
            modal.classList.add('mostrar');
        }, 10); // Pequeno delay para a transição CSS funcionar
    };

    /**
     * Fecha um modal removendo a classe 'mostrar'.
     * @param {HTMLElement} modal O elemento do modal a ser fechado.
     */
    const fecharModal = (modal) => {
        if (!modal) return; // Não faz nada se o modal não existir
        modal.classList.remove('mostrar');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 200); // O tempo (200ms) deve ser igual à duração da sua transição no CSS
    };


    // ===== CONTROLE DO MODAL DE SAIR (#modalSair) =====

    const modalSair = document.getElementById('modalSair');
    
    // ATENÇÃO: Você precisa de um botão ou link para ABRIR este modal.
    // Adicione este atributo `data-modal-target="#modalSair"` ao seu botão de "Sair".
    // Exemplo: <a href="#" data-modal-target="#modalSair">Sair do Sistema</a>
    const btnAbrirModalSair = document.querySelector('[data-modal-target="#modalSair"]');

    // Este `if` garante que o código só rode se o modal de sair existir na página
    if (modalSair) {
        const fecharModalSairX = document.getElementById('fecharModalSairX');
        const fecharModalSairBtn = document.getElementById('fecharModalSairBtn');

        // Evento para abrir o modal
        if (btnAbrirModalSair) {
            btnAbrirModalSair.addEventListener('click', (event) => {
                event.preventDefault(); // Previne o comportamento padrão do link/botão
                abrirModal(modalSair);
            });
        }

        // Eventos para fechar o modal
        fecharModalSairX.addEventListener('click', () => fecharModal(modalSair));
        fecharModalSairBtn.addEventListener('click', () => fecharModal(modalSair));
    }


    // ===== CONTROLE DO MODAL DE VEÍCULO (#modalVeiculo) =====

    const modalVeiculo = document.getElementById('modalVeiculo');

    // Este `if` garante que o código só rode se o modal de veículo existir
    if (modalVeiculo) {
        const fecharModalVeiculoX = document.getElementById('fecharModalVeiculoX');
        
        // Evento para fechar o modal (ele já abre sozinho via PHP com a classe 'mostrar')
        fecharModalVeiculoX.addEventListener('click', () => fecharModal(modalVeiculo));
    }
    
    // ===== BÔNUS: FECHAR QUALQUER MODAL AO CLICAR FORA DELE =====
    
    const todosModais = document.querySelectorAll('.modal-custom');
    todosModais.forEach(modal => {
        modal.addEventListener('click', (event) => {
            // Se o alvo do clique for o próprio fundo do modal...
            if (event.target === modal) {
                fecharModal(modal); // ...fecha o modal.
            }
        });
    });

});