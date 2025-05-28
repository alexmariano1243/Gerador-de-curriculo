window.onload = function() {
    var form = document.getElementById('formulario');

    form.onsubmit = function(e) {
        var nome = document.getElementById('nome').value;
        var telefone = document.getElementById('telefone').value;
        var cidade = document.getElementById('cidade').value;
        var estado = document.getElementById('estado').value;
        var rua = document.getElementById('endereco').value;
        var email = document.getElementById('email').value;
        var dataNascimento = document.getElementById('dataNascimento').value;
        var objetivos = document.getElementById('objetivos').value;

        if (nome === '' || telefone === '' || cidade === '' || estado === '' || rua === '' || email === '' || dataNascimento === '' || objetivos.trim() === '') {
            alert('Por favor, preencha todos os campos obrigatórios, incluindo os Objetivos!');
            e.preventDefault();
        }
    }
}
