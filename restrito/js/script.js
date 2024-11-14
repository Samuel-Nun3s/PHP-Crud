// Função principal que inicializa o modal
function initModal() {
    // Seleciona os elementos do modal
    const modal = document.querySelector("#modal");
    const fade = document.querySelector("#fade");
    const closeModalButton = document.querySelector("#close-modal");
    const openModalButtons = document.querySelectorAll(".open-modal");

    // Verifica se os elementos necessários estão presentes
    if (!modal || !fade || !closeModalButton || openModalButtons.length === 0) {
        console.error("Um ou mais elementos do modal não foram encontrados no DOM.");
        return;
    }

    // Função para alternar o estado de visibilidade do modal
    const toggleModal = () => {
        [modal, fade].forEach((el) => el.classList.toggle("hide"));
    };

    // Adiciona o evento para abrir o modal em cada botão
    openModalButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            toggleModal();
        });
    });

    // Adiciona o evento para fechar o modal
    [closeModalButton, fade].forEach((el) => {
        el.addEventListener("click", (event) => {
            event.preventDefault();
            if (!modal.classList.contains("hide")) {
                toggleModal();
            }
        });
    });
}

// Função global para pegar os dados e exibir no modal
function pegar_dados(id, nome) {
    const nome_modal = document.getElementById("nome_pessoa");
    const nome_pessoa = document.getElementById("nome_pessoa_1");
    const id_modal = document.getElementById("cod_pessoa");

    if (nome_modal && id_modal) {
        nome_modal.innerHTML = nome;
        nome_pessoa.value = nome;
        id_modal.value = id;
    } else {
        console.error("Elementos do modal para exibir dados não foram encontrados.");
    }
}

// Inicializa o modal após o carregamento completo do DOM
document.addEventListener("DOMContentLoaded", initModal);