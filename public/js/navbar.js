function toggleMenu(){
    const menu = document.querySelector('.hamb-menu');
    const offScreen = document.querySelector('.off-screen-hamb-menu');
    menu.addEventListener('click', () => {
        menu.classList.toggle('active');
        offScreen.classList.toggle('active');
    })
}