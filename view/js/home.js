// pesquisando/pegando o span mais opçoes, o filtro todo e os filtros escondidos 
let btnMore = document.querySelector('#filter .more span');
let filter = document.querySelector('#filter');
let inputs = document.querySelectorAll('.field-input');

// inicializando um contador
let count = 0;

// add um envento de click ao span mais opções
btnMore.addEventListener('click', () => {
    // se o contador for par aumente o tamanho do filtro
    if (count % 2 === 0) {
        inputs[1].classList.toggle('hidden');
        inputs[2].classList.toggle('hidden');
        filter.style.height = '330px';
        btnMore.innerHTML = '<i class="fas fa-search-minus"></i>Menos Opções';
        // se nao volte ao valor inicial, mesma coisa com o texto
    } else {
        inputs[1].classList.toggle('hidden');
        inputs[2].classList.toggle('hidden');
        filter.style.height = '200px';
        btnMore.innerHTML = '<i class="fas fa-search-plus"></i>Mais Opções';
    }
    // incrementando o contador
    count++;
});


//filtro
// pegando os 'selects' e as listas de 'options'
let selects = document.querySelectorAll('.select');
let listsOptions = document.querySelectorAll('.list-options');

// pegando cada lista de option de cada select no caso tem 9 selects
let optionsListType = document.querySelectorAll('.option.type');
let optionsListCidade = document.querySelectorAll('.option.cidade');
let optionsListBairro = document.querySelectorAll('.option.bairro');
let optionsListDormitorio = document.querySelectorAll('.option.dormitorio');
let optionsListSuite = document.querySelectorAll('.option.suite');
let optionsListGaragem = document.querySelectorAll('.option.garagem');
let optionsListValorI = document.querySelectorAll('.option.valorI');
let optionsListValorF = document.querySelectorAll('.option.valorF');
let optionsListArea = document.querySelectorAll('.option.area');

// add e removendo  a classe active cada vez q clicar no select
selects.forEach((select, index) => {
    select.addEventListener('click', () => {
        listsOptions[index].classList.toggle('active');
    });
});

// abrindo cada lista de options de acordo com cada select e alterando o valor do select de acordo com o option clicado
function editSelect(listOptions, index) {
    listOptions.forEach(option => {
        option.addEventListener('click', () => {
            selects[index].innerHTML = option.querySelector('span').innerHTML;
            listsOptions[index].classList.remove('active');
        });
    });
}

// cahamando a funcao para cada select
editSelect(optionsListType, 0);

editSelect(optionsListCidade, 1);

editSelect(optionsListBairro, 2);

editSelect(optionsListDormitorio, 3);

editSelect(optionsListSuite, 4);

editSelect(optionsListGaragem, 5);

editSelect(optionsListValorI, 6);

editSelect(optionsListValorF, 7);

editSelect(optionsListArea, 8);


//add evento de scroll ao objeto window, e add a classe sticky a section se o scroly da pagina for maior q 580
window.addEventListener('scroll', () => {
    let section = document.querySelector('section.oqProcura');
    section.classList.toggle('sticky', window.scrollY > 1180)
})


//recomendações
let btnProximo = document.querySelector('.icon-proximo');
let btnVoltar = document.querySelector('.icon-voltar');
let slider = document.querySelector('.list-card-slider');
let cont = 0;

btnProximo.addEventListener('click', () => {
    if (cont == 0) {
        slider.style.left = '-290px';
        cont++;
    } else if (cont == 1) {
        slider.style.left = '-577px';
        cont++;
    } else if (cont == 2) {
        slider.style.left = '-865px';
        cont++;
    } else if (cont == 3) {
        slider.style.left = '-1152px';
        cont++;
    } else if (cont == 4) {
        slider.style.left = '-1440px';
        cont++;
    } else if (cont == 5) {
        slider.style.left = '-1730px';
        cont++;
    } else {
        slider.style.left = '0';
        cont = 0;
    }

});

btnVoltar.addEventListener('click', () => {
    if (cont == 0) {
        slider.style.left = '-1730px';
        cont = 6;
    } else if (cont == 6) {
        slider.style.left = '-1440px'
        cont = 5;
    } else if (cont == 5) {
        slider.style.left = '-1152px'
        cont = 4;
    } else if (cont == 4) {
        slider.style.left = '-865px'
        cont = 3;
    } else if (cont == 3) {
        slider.style.left = '-577px'
        cont = 2;
    } else if (cont == 2) {
        slider.style.left = '-290px'
        cont = 1;
    } else if (cont == 1) {
        slider.style.left = '0'
        cont = 0;
    }
});