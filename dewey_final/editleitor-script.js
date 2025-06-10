document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.nome, .telefone, .email, .endereco');

    const suggestions = {
        nome: ['Lais', 'Wanessa', 'Yasmin'],
        telefone: ['(11) 91111-1111', '(22) 92222-2222', '(33) 93333-3333'],
        email: ['lais@gmail.com', 'wanessa@gmail.com', 'yasmin@gmail.com'],
        endereco: ['Rua Logo ali, nº 3', 'Rua Por ali, nº 8', 'Rua Sei la, nº 16']
    };

    inputs.forEach(input => {
        const wrapper = input.parentElement;
        const ul = document.createElement('ul');
        ul.classList.add('sugestoes');
        wrapper.appendChild(ul);

        input.addEventListener('focus', () => {
            document.querySelectorAll('.sugestoes').forEach(otherUl => {
                otherUl.style.display = 'none';
            });
            const fieldType = input.classList[0];
            showSuggestions(input, ul, suggestions[fieldType]);
        });

        input.addEventListener('click', e => e.stopPropagation());
        ul.addEventListener('click', e => e.stopPropagation());

        input.addEventListener('input', () => {
            ul.style.display = 'none';
        });
    });

    function showSuggestions(input, ulElement, items) {
        ulElement.innerHTML = '';
        items.forEach(item => {
            const li = document.createElement('li');
            li.textContent = item;
            li.addEventListener('click', () => {
                input.value = item;
                ulElement.style.display = 'none';
            });
            ulElement.appendChild(li);
        });
        ulElement.style.display = 'block';
    }

    document.addEventListener('click', () => {
        document.querySelectorAll('.sugestoes').forEach(ul => {
            ul.style.display = 'none';
        });
    });

    const editButton = document.querySelector('#dados-direita button');
    editButton.addEventListener('click', (event) => {
        event.preventDefault();
        alert('Leitor editado com sucesso!');
    });

});