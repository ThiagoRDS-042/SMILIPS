// pesquisando/pegando o span mais opçoes, o filtro todo e os filtros escondidos 
let btnMore = document.querySelector('#filter span');
let filter = document.querySelector('#filter');
let more = document.querySelectorAll('#filter .hide');

// inicializando um contador
let count = 0;

// add um envento de click ao span mais opções
btnMore.addEventListener('click', () => {
    // se o contador for par aumente o tamanho do filtro
    if (count % 2 === 0) {
        filter.style.height = '350px'
        btnMore.innerHTML = '<i class="fas fa-search-plus"></i>Menos Opções';
        // se nao volte ao valor inicial, mesma coisa com o texto
    } else {
        filter.style.height = '200px';
        btnMore.innerHTML = '<i class="fas fa-search-plus"></i>Mais Opções';
    }
    // incrementando o contador
    count++;
});