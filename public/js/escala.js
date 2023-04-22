$('#pesquisarData').submit(function(e){
      e.preventDefault();

      var dataInicial = $('#data-inicial').val();
      var dataFinal = $('#data-final').val();

      $.ajax({
         url:'http://localhost/JUCI-IEIA-SIMIONE/planos/pesquisarEscala',
         method: 'POST',
         data: {dataInicial: dataInicial, dataFinal: dataFinal},
         success:function(dados){
            $('.dados-escala').empty().html(dados);
         }
      });
})
$('#formPlano').submit(function(e){
e.preventDefault();
    var id =  $("#id").val();
    var ministro = $("#ministro").val();
    var liturgista =  $('#liturgista').val();
    var suplenteMinistro =  $('#suplenteMinistro').val();
    var suplenteLiturgista =  $('#suplenteLiturgista').val();
    var tipoACtividade =  $('#tipoACtividade').val();
    var departamento =  $('#departamento').val();
    var textoBiblico =  $('#textoBiblico').val();
    var data =  $('#data').val();
    var observacao =  $('#observacao').val();

    $('.erro-text').text(''); // Limpa todas as mensagens de erro antes da validação

    if (!ministro || ministro.trim() === '') {
      $('.erro-text').css('display', 'block').text('Por favor, preencha o campo ministro.');
      return;
    }
    if (!liturgista || liturgista.trim() === '') {
      $('.erro-text').css('display', 'block').text('Por favor, preencha o campo liturgista.');
      return;
    }
    $.ajax({
      url:'http://localhost/JUCI-IEIA-SIMIONE/planos/addEscala',
      method:'POST',
      data: {id: id, 
             ministro: ministro, 
             liturgista: liturgista,
             suplenteMinistro: suplenteMinistro,
             suplenteLiturgista: suplenteLiturgista,
             suplenteLiturgista: suplenteLiturgista,
             tipoACtividade: tipoACtividade,
             departamento: departamento,
             textoBiblico: textoBiblico,
             data: data,
             observacao:observacao
            },
            success: function(mensagem) {
              // Se o membro foi adicionado com sucesso, exibe uma mensagem de alerta
              if(mensagem == "Inserido com sucesso") {
                window.alert('Inserido');
                resetForm();
                fecharModal();
                getEscala();
              }
              if(mensagem == "Editado com sucesso"){
                window.alert('Editado com sucesso');
                resetForm();
                fecharModal();
                getEscala();
              } else {
                // Se houve algum erro, exibe a mensagem de erro na tela
                $('.erro-text').css('display', 'block');
                $('.erro-text').html(mensagem);
              }
      }
    })

});
function getEscala(){
    
    $.ajax({
         url:'http://localhost/JUCI-IEIA-SIMIONE/planos/apresentarEscala',
         method:'GET',
         success:function(dados){
            $('.dados-escala').html(dados);
         }
        });
}

getEscala();

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
   // Função para limpar os campos do formulário após a adição do membro
   function resetForm() {
       $('#formPlano')[0].reset();
       $('.erro-text').css('display', 'none');
   }
   // Função para fechar o modal após a adição do membro
   function fecharModal() {
           const modal = document.getElementById('caixa-informacao');
           modal.classList.remove('mostrar');
           resetForm();
       
   }
   const botaoAdicionar = document.querySelector('.add-plano');

   botaoAdicionar.addEventListener('click', () =>{ 
     mostrarModal('caixa-informacao')});
     $('.fechar-form-actividade').click(function() {
       fecharModal();
     }); 

     $(document).on('click','a[data-role]',function(e){
      e.preventDefault();
      var id = ($(this).data('id'));
      var ministro = $('#'+id).children('td[data-target=ministro]').text();
      var liturgista = $('#'+id).children('td[data-target=liturgista]').text();
      var suplenteMinistro = $('#'+id).children('td[data-target=suplenteMinistro]').text();
      var suplenteLiturgista = $('#'+id).children('td[data-target=suplenteLiturgista]').text();
      var tipoACtividade = $('#'+id).children('td[data-target=tipoACtividade]').text();
      var departamento = $('#'+id).children('td[data-target=departamento]').text();
      var textoBiblico = $('#'+id).children('td[data-target=textoBiblico]').text();
      var data = $('#'+id).children('td[data-target=data]').text();
      var observacao = $('#'+id).children('td[data-target=observacao]').text();

      
      $("#id").val(id);
      $("#ministro").val(ministro);
      $('#liturgista').val(liturgista);
      $('#suplenteMinistro').val(suplenteMinistro);
      $('#suplenteLiturgista').val(suplenteLiturgista);
      $('#tipoACtividade').val(tipoACtividade);
      $('#departamento').val(departamento);
      $('#textoBiblico').val(textoBiblico);
      $('#data').val(data);
      $('#observacao').val(observacao);
      
      mostrarModal('caixa-informacao');
    });