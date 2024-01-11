document.addEventListener("DOMContentLoaded", function() {

    exibirAlert();

});

function exibirAlert() {
    const alert = document.querySelector('.alert');
    const conteudoAlert = document.querySelector('.conteudo-alert');

    if(conteudoAlert.textContent.trim() != "") {
        alert.style.display = 'flex';
        setTimeout(function () {
            alert.style.display = 'none';
        }, 5000);
        return;
    }
}

function verificaInput() {

    const form = document.querySelector("#form-cadastro"); 
    const inputUsuario = document.querySelector('#usuario-cadastro');
    const inputSenha = document.querySelector('#senha-cadastro');
    const alert = document.querySelector('.alert');

    if(inputUsuario.value.trim() === "") {
        alert.style.display = 'flex';
        alert.innerHTML = '<p><i class="fa-solid fa-triangle-exclamation"></i>  Informe um Usuário!</p>';
        setTimeout(function () {
            alert.style.display = 'none';
            alert.innerHTML = '';
        }, 5000);
        return;
    } else if(inputSenha.value.trim() === "") {
        alert.style.display = 'flex';
        alert.innerHTML = '<p><i class="fa-solid fa-triangle-exclamation"></i>  Informe uma Senha!</p>';
        setTimeout(function () {
            alert.style.display = 'none';
            alert.innerHTML = '';
        }, 5000);
        return;
    }
    else{
        form.submit();
    }
}
