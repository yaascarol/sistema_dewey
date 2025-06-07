const inputGenero = document.querySelector('.genero');
const listaOpcoes = document.querySelector('.opcoes-genero');

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
