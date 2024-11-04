let SIZE = 200

function populate() {
    const dados = Array.from({length:SIZE}).map((_,i) => '<li><a href="#"> <div id="post"><p id="autor-data">Michael • 10/10/2010</p><p id="titulo"><br>Título aqui</p><img src="../../../gumball.jpg" alt=""></div></a></li>')
    const list = document.querySelector('.posts-div #list')
    list.innerHTML = dados.join('')
    return dados
}
const data = populate()

let postPorPag = 3
if (window.innerWidth > 768){
    postPorPag = 6
}
const state = {
    page: 1, // em que pagina estamos
    postPorPag, // quantos posts por pag
    totalPag: Math.ceil(data.length / postPorPag), // total de paginas
    max_botoes:5
}

// console.log(state.totalPag)
const html = {
    get(element) {
        return document.querySelector(element)
    }
}
const controls = {
    next() {
        state.page++
        if(state.page > state.totalPag){
            state.page = state.totalPag
        }
    },
    prev() {
        state.page--
        if(state.page < 1){
            state.page = 1
        }
    },
    irPara(page) {
        if(page > state.totalPag){
            page = state.totalPag
        }
        if(page < 1){
            page = 1
        }
        state.page = +page
    },
    createListeners(){
        html.get('.first').addEventListener('click', () => {
            controls.irPara(1)
            update()
        })
        html.get('.last').addEventListener('click', () => {
            controls.irPara(state.totalPag)
            update()
        })
        html.get('.prox').addEventListener('click', () => {
            controls.next()
            update()
        })
        html.get('.prev').addEventListener('click', () => {
            controls.prev()
            update()
        })
    }
}

const list = {
    create (item){
        console.log(item)
        const li = document.createElement('li')
        li.innerHTML = item
        html.get('#list').appendChild(li)

    },
    update(){
        html.get("#list").innerHTML = ''

        let page = state.page - 1
        let start = page * state.postPorPag
        let fim = start + state.postPorPag

        let itensNaPag = data.slice(start, fim)
        
        itensNaPag.forEach(list.create)
    }
}

const buttons = {
    create (num) {
        const button = document.createElement('div')
        button.innerHTML = num;
        html.get('.numero').appendChild(button)

        if(num == state.page){
            button.classList.add('active')
        }

        button.addEventListener('click', (event) => {
            const page = event.target.innerText
            controls.irPara(page)
            update()
        })
    },
    update () {
        html.get('.div-botao-pagina .numero').innerHTML = ''
        const {maxLeft, maxRight} = buttons.quantosBotoes()
        console.log(maxRight)

        for(let page = maxLeft; page <= maxRight; page++){ // cria cada botao
            buttons.create(page)
        }
    },
    quantosBotoes(){ 
        let maxLeft = state.page - Math.floor(state.max_botoes / 2) // 5 botoes, 2 lados
        let maxRight = state.page + Math.floor(state.max_botoes / 2)
        
        if (maxLeft < 1){
            maxLeft = 1
            maxRight = state.max_botoes
        }
        if (maxRight > state.totalPag) {
            maxLeft = state.totalPag - state.max_botoes - 1
            maxRight = state.totalPag
            if (maxLeft < 1) maxLeft = 1
        }
        // console.log(`left = $(maxLeft) right = $(maxRight)`)
        // console.log(maxLeft)
        // console.log(maxRight)
        return {maxLeft, maxRight}
        
    }
}
function update() {
    console.log(state.page)
    list.update()
    buttons.update()
}
function init(){
    update()
    controls.createListeners()
}

init()