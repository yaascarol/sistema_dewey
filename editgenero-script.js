const inputGenero = document.querySelector('.genero');
const listaOpcoes = document.querySelector('.opcoes-genero');
const generoAlterado = document.querySelector('.alt-genero');
const editButton = document.querySelector('#editar-genero');

inputGenero.addEventListener('click', () => {
    listaOpcoes.classList.toggle('escondido');
});

function selecionarGenero(opcao) {
    inputGenero.value = opcao;
    listaOpcoes.classList.add('escondido');
}
window.selecionarGenero = selecionarGenero;

document.addEventListener('click', function (e) {
    if (!document.querySelector('.genero-dropdown').contains(e.target)) {
        listaOpcoes.classList.add('escondido');
    }
});

editButton.addEventListener('click', (event) => {
    event.preventDefault();

    const novoGenero = generoAlterado.value.trim();
    const generoAtual = inputGenero.value;

    if (!novoGenero) {
        alert('Digite um novo nome para o gênero.');
        return;
    }

    inputGenero.value = novoGenero;


    const opcoes = listaOpcoes.querySelectorAll('li');
    let generoAtualizado = false;

    opcoes.forEach(opcao => {
        if (opcao.textContent === generoAtual) {
            opcao.textContent = novoGenero;
            opcao.setAttribute('onclick', `selecionarGenero('${novoGenero}')`);
            generoAtualizado = true;
        }
    });

    if (!generoAtualizado) {
        const novaOpcao = document.createElement('li');
        novaOpcao.textContent = novoGenero;
        novaOpcao.setAttribute('onclick', `selecionarGenero('${novoGenero}')`);
        listaOpcoes.appendChild(novaOpcao);
    }

    alert(`Gênero atualizado para "${novoGenero}".`);
});