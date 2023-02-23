const aside = document.querySelector('aside');
const btnAbrirmneu = document.querySelector('#abrir-menu');
const btnFecharmenu = document.querySelector('#fechar-menu');

btnAbrirmneu.addEventListener('click', ()=> {
    aside.style.display = 'block';
})

btnFecharmenu.addEventListener('click', () => {
    aside.style.display = 'none';
})