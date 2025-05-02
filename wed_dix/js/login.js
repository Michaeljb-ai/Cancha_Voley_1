const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

document.getElementById('boton-regreso').addEventListener('click', function() {
    window.location.href = "index.html"; // O la URL de tu página principal
});