
//Evento para pesquisa de dados
$('#procurar').keyup(function (e) {

  $('#formPesquisa').submit(function(e){
    e.preventDefault();
    var pesquisa = $('#procurar').val();

    $.ajax({
      url:'http://localhost/JUCI-IEIA-SIMIONE/user/procurarUsuario',
      method:'POST',
      dataType:'html',
      data: {procurar: pesquisa},
      success:function(data){
          $('.membros-cadastrados').empty().html(data);
      }
    });
    return false;
  })
$('form').trigger('submit');
})
//Evento para pesquisa de dados por fase (Crianças, Jovens, Adultos)

// Função para carregar os membros cadastrados
function getMembros() {
    $.ajax({
      url: 'http://localhost/JUCI-IEIA-SIMIONE/user/carregarMembros',
      method: 'GET',
      dataType: "html",
      success:function (resultados) {
        $(".membros-cadastrados").html(resultados);
      }
    });
  }
  getMembros();
  
  // Evento de envio do formulário de adição de membro
  $('#formMembro').submit(function(event) {
  event.preventDefault();

   var id = $("#idMembro").val();
   var nome = $("#nome").val();
   var pai = $('#pai').val();
   var mae = $('#mae').val();
   var nascimento = $('#nascimento').val();
   var nacionalidade = $('#nacionalidade').val();
   var provincia = $('#provincia').val();
   var municipio = $('#municipio').val();
   var documento = $('#documento').val();
   var numDocumento = $('#numDocumento').val();
   var sexo = $('#sexo').val();
   var contacto = $('#contacto').val();
   var estado = $('#estado').val();
   var local = $('#local').val();
   var cargo = $('#cargo').val();
   var funcao = $('#funcao').val();
   var batismo = $('#batismo').val();
   var categoria = $('#categoria').val();
   var email = $('#email').val();
   var senha = $('#senha').val();
   var id_unico = $('#id_unico').val();
   var formacao = $('#formacao').val();
   var biografia = $('#biografia').val();
  
   //Validações
   $('.erro-text').text(''); // Limpa todas as mensagens de erro antes da validação

   if (!nome || nome.trim() === '') {
     $('.erro-text').css('display', 'block').text('Por favor, preencha o campo nome.');
     return;
   }
   
   if (!pai || pai.trim() === '') {
     $('.erro-text').css('display', 'block').text('Por favor, preencha o campo pai.');
     return;
   }
   
   if (!mae || mae.trim() === '') {
     $('.erro-text').css('display', 'block').text('Por favor, preencha o campo mãe.');
     return;
   }
   
   if (!nascimento || nascimento.trim() === '') {
     $('.erro-text').css('display', 'block').text('Por favor, preencha o campo de data de nascimento.');
     return;
   }
   
   if (!nacionalidade || nacionalidade.trim() === '') {
     $('.erro-text').css('display', 'block').text('Por favor, preencha o campo nacionalidade.');
     return;
   }
   
   if (!provincia || provincia.trim() === '') {
     $('.erro-text').css('display', 'block').text('Por favor, preencha o campo província.');
     return;
   }
   
   if (!municipio || municipio.trim() === '') {
     $('.erro-text').css('display', 'block').text('Por favor, preencha o campo município.');
     return;
   }
    // Faz uma requisição AJAX para adicionar um membro
    $.ajax({
      url: 'http://localhost/JUCI-IEIA-SIMIONE/user/adicionarMembro',
      method: 'POST',
      data: {
            idMembro: id,
            nome: nome,
            pai: pai,
            mae: mae,
            nascimento: nascimento,
            nacionalidade: nacionalidade,
            provincia: provincia,
            municipio: municipio,
            documento: documento,
            numDocumento: numDocumento,
            sexo: sexo,
            contacto: contacto,
            estado: estado,
            local: local,
            cargo: cargo,
            funcao: funcao,
            batismo: batismo,
            categoria: categoria,
            email: email,
            senha: senha,
            id_unico: id_unico,
            formacao: formacao,
            biografia: biografia
          },
      success: function(mensagem) {
        // Se o membro foi adicionado com sucesso, exibe uma mensagem de alerta
        if(mensagem == "Inserido com sucesso") {
          window.alert('Inserido');
          resetForm();
          fecharModal();
          getMembros();
        }else{
          $('.erro-text').css('display', 'block');
          $('.erro-text').html(mensagem);
        }
        if(mensagem == "Editado com sucesso"){
          resetForm();
          fecharModal();
          getMembros();
        }
        if(mensagem == "A Senha deve ter no mínimo 8 Carácteres"){
          // Se houve algum erro, exibe a mensagem de erro na tela
          $('.erro-text').css('display', 'block');
          $('.erro-text').html(mensagem);
        }
        if(mensagem == "Preencha os campos obrigatórios"){
          // Se houve algum erro, exibe a mensagem de erro na tela
          $('.erro-text').css('display', 'block');
          $('.erro-text').html(mensagem);
        }
      }
    });
  });

  // Função para limpar os campos do formulário após a adição do membro
  function resetForm() {
    $('#formMembro')[0].reset();
    $('.erro-text').css('display', 'none');
  }
  $(document).on('click','a[data-role]',function(e){
    e.preventDefault();
    var id = ($(this).data('id'));
    var nome = $('#'+id).children('td[data-target=nome]').text();
    var pai = $('#'+id).children('td[data-target=pai]').text();
    var mae = $('#'+id).children('td[data-target=mae]').text();
    var nascimento = $('#'+id).children('td[data-target=nascimento]').text();
    var nacionalidade = $('#'+id).children('td[data-target=nacionalidade]').text();
    var provincia = $('#'+id).children('td[data-target=provincia]').text();
    var municipio = $('#'+id).children('td[data-target=municipio]').text();
    var documento = $('#'+id).children('td[data-target=documento]').text();
    var numDocumento = $('#'+id).children('td[data-target=numDocumento]').text();
    var sexo = $('#'+id).children('td[data-target=sexo]').text();
    var contacto = $('#'+id).children('td[data-target=contacto]').text();
    var estado = $('#'+id).children('td[data-target=estado]').text();
    var local = $('#'+id).children('td[data-target=local]').text();
    var cargo = $('#'+id).children('td[data-target=cargo]').text();
    var batismo = $('#'+id).children('td[data-target=batismo]').text();
    var funcao = $('#'+id).children('td[data-target=funcao]').text();
    var categoria = $('#'+id).children('td[data-target=categoria]').text();
    var email = $('#'+id).children('td[data-target=email]').text();
    var id_unico = $('#'+id).children('td[data-target=id_unico]').text();
    var formacao = $('#'+id).children('td[data-target=formacao]').text();
    var biografia = $('#'+id).children('td[data-target=biografia]').text();
    
    $("#idMembro").val(id);
    $("#nome").val(nome);
    $('#pai').val(pai);
    $('#mae').val(mae);
    $('#nascimento').val(nascimento);
    $('#nacionalidade').val(nacionalidade);
    $('#provincia').val(provincia);
    $('#municipio').val(municipio);
    $('#documento').val(documento);
    $('#numDocumento').val(numDocumento);
    $('#sexo').val(sexo);
    $('#contacto').val(contacto);
    $('#estado').val(estado);
    $('#local').val(local);
    $('#cargo').val(cargo);
    $('#funcao').val(funcao);
    $('#batismo').val(batismo);
    $('#categoria').val(categoria);
    $('#email').val(email);
    $('#id_unico').val(id_unico);
    $('#formacao').val(formacao);
    $('#biografia').val(biografia);

    mostrarModal('caixa-informacao');
  });
  
  // Função para fechar o modal após a adição do membro
  function fecharModal() {
    const modal = document.getElementById('caixa-informacao');
    modal.classList.remove('mostrar');
    resetForm();
 
  }
  
  $('.fechar-form-actividade').click(function() {
    resetForm();
    fecharModal();
  
  }); 
  // Evento de clique no botão de adição de membro
  const botaoAdicionar = document.querySelector('.add-membro');
  botaoAdicionar.addEventListener('click', () =>{ 
    resetForm();
    mostrarModal('caixa-informacao');
  
  });
  
  // Chama a função para carregar os membros cadastrados a cada 5 segundos

    // Função para exibir e fechar o modal
    function mostrarModal(modalId) {
      const modal = document.getElementById(modalId);
      modal.classList.add('mostrar');
      modal.addEventListener('click', (e) => {
        if(e.target.className == modalId || e.target.className === 'botao-fechar') {
          modal.classList.remove('mostrar')
        }
      })
    }