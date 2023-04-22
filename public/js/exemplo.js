$(document).ready(function() {
    $('#myForm').submit(function(e) {
      e.preventDefault();
      var email = $('#email').val();
      var password = $('#password').val();
      var valid = true;
  
      // Validação do campo de e-mail
      if (!email) {
        $('#email-error').text('Por favor, informe um e-mail válido');
        valid = false;
      } else {
        $('#email-error').text('');
      }
  
      // Validação do campo de senha
      if (!password) {
        $('#password-error').text('Por favor, informe sua senha');
        valid = false;
      } else {
        $('#password-error').text('');
      }
  
      // Envia a requisição AJAX caso os campos estejam validados
      if (valid) {
        $.ajax({
          url: 'process.php',
          type: 'POST',
          data: {
            email: email,
            password: password
          },
          success: function(response) {
            // Manipula a resposta do servidor
            console.log(response);
          },
          error: function(error) {
            // Manipula erros
            console.log(error);
          }
        });
      }
    });
  });
  ==========================================================
  <form id="myForm">
  <label for="email">E-mail:</label>
  <input type="email" name="email" id="email">
  <span id="email-error"></span>

  <label for="password">Senha:</label>
  <input type="password" name="password" id="password">
  <span id="password-error"></span>

  <button type="submit">Enviar</button>
</form>
=============================================================
$email = $_POST['email'];
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // Campo de e-mail inválido
  $response = array('status' => 'error', 'message' => 'Por favor, informe um e-mail válido');
  echo json_encode($response);
} elseif (!$password) {
  // Campo de senha inválido
  $response = array('status' => 'error', 'message' => 'Por favor, informe sua senha');
  echo json_encode($response);
} else {
  // Campos válidos, faça o processamento necessário
  $response = array('status' => 'success');
  echo json_encode($response);
}
===============================================================
validações
if (!is_numeric($_POST['campo'])) {
  // o campo não contém somente números
}
if (!ctype_alpha($_POST['campo'])) {
  // o campo não contém somente letras
}
$opcoes = array('valor1', 'valor2', 'valor3');

if (!in_array($_POST['campo'], $opcoes)) {
  // o valor do campo não está em $opcoes
}

  