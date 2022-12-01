const logButton = document.getElementById('log');
const regisButton = document.getElementById('regis');
const container = document.getElementById('container');

regisButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

logButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');

toggle.addEventListener('click', function(){
    this.classList.toggle('bi-moon');
    if(this.classList.toggle('bi-brightness-high-fill')){
        body.style.background = '#cbc0d3';
        body.style.color = 'black';
        body.style.transition = '2s';
    }else{
        body.style.background = 'black';
        body.style.color = 'whitesmoke';
        body.style.transition = '2s';
    }
});

