document.addEventListener('DOMContentLoaded', () => {
    const inputGenero = document.querySelector('.genero');
    const listaOpcoes = document.querySelector('.opcoes-genero');

    // Lista de gêneros (você pode puxar do PHP depois se quiser)
    const generos = ['Ficção', 'Romance', 'Terror', 'Aventura', 'Mistério'];

    // Mostra todas as opções ao clicar
    inputGenero.addEventListener('click', (e) => {
        e.stopPropagation();
        mostrarOpcoes(generos);
        listaOpcoes.classList.remove('escondido');
    });

    // Filtra sugestões ao digitar
    inputGenero.addEventListener('input', () => {
        const termo = inputGenero.value.toLowerCase();
        const filtrados = generos.filter(genero =>
            genero.toLowerCase().includes(termo)
        );
        mostrarOpcoes(filtrados);
        listaOpcoes.classList.remove('escondido');
    });

    // Insere opção clicada no input
    listaOpcoes.addEventListener('click', (e) => {
        if (e.target.tagName === 'LI') {
            inputGenero.value = e.target.textContent;
            listaOpcoes.classList.add('escondido');
        }
    });

    // Fecha dropdown se clicar fora
    document.addEventListener('click', () => {
        listaOpcoes.classList.add('escondido');
    });

    function mostrarOpcoes(lista) {
        listaOpcoes.innerHTML = '';
        if (lista.length === 0) {
            const li = document.createElement('li');
            li.textContent = 'Nenhum resultado';
            li.style.color = 'gray';
            listaOpcoes.appendChild(li);
            return;
        }
        lista.forEach(genero => {
            const li = document.createElement('li');
            li.textContent = genero;
            listaOpcoes.appendChild(li);
        });
    }
});