const leitores = [
    { nome: "", telefone: "", email: "", endereco: "" },
    { nome: "", telefone: "", email: "", endereco: "" },
    { nome: "", telefone: "", email: "", endereco: "" },
    { nome: "", telefone: "", email: "", endereco: "" },
    { nome: "", telefone: "", email: "", endereco: "" }
];

function applyFilters() {
  const nomeCheckboxes = document.querySelectorAll('input[name="nome"]');
  const generoCheckboxes = document.querySelectorAll('input[name="genero"]');

  const filtrosNome = Array.from(nomeCheckboxes)
    .filter(cb => cb.checked)
    .map(cb => cb.value);

  const filtrosGenero = Array.from(generoCheckboxes)
    .filter(cb => cb.checked)
    .map(cb => cb.value);

  let filtrados = leitores;

  if (filtrosNome.length > 0 && !filtrosNome.includes('todos')) {
    filtrados = filtrados.filter(leitor => {
      const inicial = leitor.nome.charAt(0).toLowerCase();
      return filtrosNome.some(filtro => {
        switch (filtro) {
          case 'a-f': return inicial >= 'a' && inicial <= 'f';
          case 'g-l': return inicial >= 'g' && inicial <= 'l';
          case 'm-r': return inicial >= 'm' && inicial <= 'r';
          case 's-z': return inicial >= 's' && inicial <= 'z';
          default: return true;
        }
      });
    });
  }
  
    renderTable(filtrados);
}
  
    function renderTable(lista) {
    const tbody = document.querySelector(".tabela-produtos tbody");
    tbody.innerHTML = "";
  
    if (lista.length === 0) {
      tbody.innerHTML = `<tr><td colspan="6">Nenhum leitor encontrado.</td></tr>`;
      return;
    }
  
    lista.forEach(leitor => {
      const row = `
        <tr>
          <td><div class="produto-imagem">150x115</div></td>
          <td>${leitor.nome}</td>
          <td>${leitor.telefone}</td>
          <td>${leitor.email}</td>
          <td>${leitor.endereco}</td>
          <td>
            <button class="btnEditar"><a href="#">Editar</a></button>
            <button class="btnExcluir">Excluir</button>
          </td>
        </tr>
      `;
      tbody.innerHTML += row;
    });
  }
  
  document.querySelectorAll('.filter-group input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
      const groupName = this.name;
      const groupCheckboxes = document.querySelectorAll(`input[name="${groupName}"]`);
  
      if (this.value === 'todos' && this.checked) {
        groupCheckboxes.forEach(cb => {
          if (cb !== this) cb.checked = false;
        });
      } else if (this.value !== 'todos' && this.checked) {
        const todosCheckbox = document.querySelector(`input[name="${groupName}"][value="todos"]`);
        todosCheckbox.checked = false;
      }
  
      applyFilters();
    });
  });

  document.querySelectorAll('.filter-title').forEach(title => {
    title.addEventListener('click', (e) => {
      e.preventDefault();
  
      const targetId = title.getAttribute('data-target');
      const section = document.getElementById(targetId);
  
      if (!section) return;
  
      // Alternar visibilidade da seção
      section.classList.toggle('hidden');
  
      // Alternar classe para girar seta
      title.classList.toggle('open');
    });
  });
  

  function cleanFilters() {
    const inputs = document.querySelectorAll('.filter-group input[type="checkbox"]');
    inputs.forEach(input => input.checked = false);
  }