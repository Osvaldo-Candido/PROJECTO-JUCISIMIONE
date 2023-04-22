//PESQUISAR FINANÇAS
$('#pesquisarData').submit(function(e){
  e.preventDefault();

  var dataInicial = $('#data-inicial').val();
  var dataFinal = $('#data-final').val();

  $.ajax({
     url:'http://localhost/JUCI-IEIA-SIMIONE/financas/pesquisarFinancas',
     method: 'POST',
     data: {dataInicial: dataInicial, dataFinal: dataFinal},
     success:function(dados){
        $('.dados-financas').empty().html(dados);
     }
  });
})
//=======================================================
$('#formFinancas').submit(function(e){
    e.preventDefault();
    var id = $('#id').val();
    var tipoReceita = $('#tipoReceita').val();
    var entrada = $('#entrada').val();
    var saida = $('#saida').val();
    var departamento = $('#departamento').val();
    var observacao = $('#observacao').val();
    $('.erro-text').text(''); // Limpa todas as mensagens de erro antes da validação

    if (!entrada || entrada.trim() === '') {
      $('.erro-text').css('display', 'block').text('Por favor, preencha o campo entrada.');
      return;
    }
    if (!saida || saida.trim() === '') {
      $('.erro-text').css('display', 'block').text('Por favor, preencha o campo saida.');
      return;
    }
    $.ajax({
        url:'http://localhost/JUCI-IEIA-SIMIONE/financas/addReceitas',
        method: 'POST',
        data:{id:id, 
              tipoReceita: tipoReceita,
              entrada: entrada,
              saida: saida,
              departamento: departamento,
              observacao: observacao},
              success: function(mensagem) {
                // Se o membro foi adicionado com sucesso, exibe uma mensagem de alerta
                if(mensagem == "Inserido com sucesso") {
                  window.alert('Inserido');
                  resetForm();
                  fecharModal();
                  buscarFinancas();
                }
                if(mensagem == "Editado com sucesso"){
                  window.alert('Editado com sucesso');
                  resetForm();
                  fecharModal();
                  buscarFinancas();
                } 
                if(mensagem == "Apenas são permitido valores númericos"){
                  // Se houve algum erro, exibe a mensagem de erro na tela
                  $('.erro-text').css('display', 'block');
                  $('.erro-text').html(mensagem);
                }else{
                  // Se houve algum erro, exibe a mensagem de erro na tela
                  $('.erro-text').css('display', 'block');
                  $('.erro-text').html(mensagem);
                }
        }
    })
})
  // Função para exibir e fechar o modal
  function buscarFinancas()
  {
      $.ajax({
        
          url:'http://localhost/JUCI-IEIA-SIMIONE/financas/apresentaReceitas',
          method:'GET',
          dataType: 'html',
          success:function(dados) {
              $('.dados-financas').html(dados);
          }
      });
  }
  function apresentarReport()
  {
      $.ajax({
         url:'http://localhost/JUCI-IEIA-SIMIONE/financas/reportFinacas',
         method:'GET',
         dataType:'html',
         success:function(dados){
          $('.financa-cabecalho').html(dados);
         }
      })
  } 
  
  buscarFinancas();
  apresentarReport();
  setInterval(apresentarReport,5000);
  
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
        $('#formFinancas')[0].reset();
        $('.erro-text').css('display', 'none');
    }
    // Função para fechar o modal após a adição do membro
    function fecharModal() {
            const modal = document.getElementById('caixa-informacao');
            modal.classList.remove('mostrar');
            resetForm();
        
    }
    $('.fechar-form-actividade').click(function() {
      fecharModal();
    }); 
    const botaoAdicionar = document.querySelector('.add-plano-fin');
 
    botaoAdicionar.addEventListener('click', () =>{ 
      mostrarModal('caixa-informacao')});

      $(document).on('click','a[data-role]',function(e){
        e.preventDefault();
        var id = ($(this).data('id'));
        var tipoReceita = $('#'+id).children('td[data-target=tipoReceita]').text();
        var entrada = $('#'+id).children('td[data-target=entrada]').text();
        var saida = $('#'+id).children('td[data-target=saida]').text();
        var departamento = $('#'+id).children('td[data-target=departamento]').text();
        var observacao = $('#'+id).children('td[data-target=observacao]').text();

        $("#id").val(id);
        $("#tipoReceita").val(tipoReceita);
        $('#entrada').val(entrada);
        $('#saida').val(saida);
        $('#departamento').val(departamento);
        $('#observacao').val(observacao);
        
        mostrarModal('caixa-informacao');
      });
      