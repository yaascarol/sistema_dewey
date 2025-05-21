document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.usuario, .email, .senha');

    const suggestions = {
        usuario: ['Lais', 'Wanessa', 'Yasmin'],
        senha: ['1234', '5678', '91011'],
        email: ['lais@gmail.com', 'wanessa@gmail.com', 'yasmin@gmail.com'],
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
        alert('Administrador editado com sucesso!');
    });

});