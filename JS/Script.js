function confirmDelete() {
    return confirm('Are you sure you want to delete this book ?')
}

function revealToggle() {
    let password = document.getElementById('password');
    let icon = document.getElementById('reveal-toggle');

    if(password.type == 'password') {
        password.type = 'text';
        icon.src = './img/hide.png';
    }
    else {
        password.type = 'password';
        icon.src = './img/show.png';
    }
}

function passwordCheck() {
    let password = document.getElementById('password').value;
    let checkAgainst = document.getElementById('confirm').value;

    if (password == checkAgainst) {
        return true;
    }
    else{
        alert('Passwords do not match');
        return false;
    }
}