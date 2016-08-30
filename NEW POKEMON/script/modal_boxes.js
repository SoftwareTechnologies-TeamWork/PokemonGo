let loginModal = document.getElementById('login_modal');
let registerModal = document.getElementById('register_modal');
let login = document.getElementsByClassName('open_modal')[0];
let register = document.getElementsByClassName('open_modal')[1];
let loginClose = document.getElementsByClassName('close')[0];
let registerClose = document.getElementsByClassName('close')[1];

login.onclick = function() {
    loginModal.style.display = 'block';
    return false;
};

register.onclick = function() {
    registerModal.style.display = 'block';
    return false;
};

loginClose.onclick = function() {
    loginModal.style.display = 'none';
};

registerClose.onclick = function() {
    registerModal.style.display = 'none';
};

window.onclick = function (event) {
    if (event.target == loginModal) {
        loginModal.style.display = 'none';
    }

    if (event.target == registerModal) {
        registerModal.style.display = 'none';
    }
};


