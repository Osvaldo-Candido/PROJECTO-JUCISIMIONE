//Evento para pesquisa de dados
$('#procurar').keyup(function (e) {
  e.preventDefault();

    var pesquisa = $('#procurar').val();

    $.ajax({
      url:'http://localhost/JUCI-IEIA-SIMIONE/actividades/pesquisarActividade',
      method:'POST',
      dataType:'html',
      data: {procurar: pesquisa},
      success:function(data){
          $('.dados-tabela').empty().html(data);
      }
    });
    return false;

$('form').trigger('submit');
})
    
    $('#formActividade').submit(function(e){
        e.preventDefault();
        
        id = $("#id").val();
        actividade = $("#actividade").val();
        responsavel = $('#responsavel').val();
        objectivo = $('#objectivo').val();
        data = $('#data').val();
        lugar = $('#lugar').val();
        duracao = $('#duracao').val();
        observacao = $('#observacao').val();
        estado = $('#estado').val();
        departamento = $('#departamento').val();
        
        $('.erro-text').text(''); // Limpa todas as mensagens de erro antes da validação

        if (!actividade || actividade.trim() === '') {
          $('.erro-text').css('display', 'block').text('Por favor, preencha o campo actividade.');
          return;
        }
        if (!responsavel || responsavel.trim() === '') {
          $('.erro-text').css('display', 'block').text('Por favor, preencha o campo responsavel.');
          return;
        }
        if (!objectivo || objectivo.trim() === '') {
          $('.erro-text').css('display', 'block').text('Por favor, preencha o campo objectivo.');
          return;
        }
        if (!lugar || lugar.trim() === '') {
          $('.erro-text').css('display', 'block').text('Por favor, preencha o campo lugar.');
          return;
        }
        if (!duracao || duracao.trim() === '') {
          $('.erro-text').css('display', 'block').text('Por favor, preencha o campo duracao.');
          return;
        }
        if (!observacao || observacao.trim() === '') {
          $('.erro-text').css('display', 'block').text('Por favor, preencha o campo observacao.');
          return;
        }
        $.ajax({
            url:'http://localhost/JUCI-IEIA-SIMIONE/actividades/inserirActividade',
            method:'POST',
            data:{id:id,
                  actividade: actividade,
                  responsavel: responsavel,
                  objectivo: objectivo,
                  data: data,
                  lugar: lugar,
                  duracao: duracao,
                  observacao: observacao,
                  estado: estado,
                  departamento: departamento
                },
                success: function(mensagem) {
                  // Se o membro foi adicionado com sucesso, exibe uma mensagem de alerta
                  if(mensagem == "Inserido com sucesso") {
                    window.alert('Inserido');
                    resetForm();
                    fecharModal();
                    buscarActividades();
                  }
                  if(mensagem == "Editado com sucesso"){
                    window.alert('Editado com sucesso');
                    resetForm();
                    fecharModal();
                    buscarActividades();
                  } else {
                    // Se houve algum erro, exibe a mensagem de erro na tela
                    $('.erro-text').css('display', 'block');
                    $('.erro-text').html(mensagem);
                  }
            }
        })
    });

function buscarActividades()
{
    $.ajax({
        url:'http://localhost/JUCI-IEIA-SIMIONE/actividades/apresentarActividades',
        method:'GET',
        dataType: 'html',
        success:function(dados) {
            $('.dados-tabela').html(dados);
        }
    });
}
function apresentarReport()
{
    $.ajax({
       url:'http://localhost/JUCI-IEIA-SIMIONE/actividades/apresentarReport',
       method:'GET',
       dataType:'html',
       success:function(dados){
        $('.dashboard-actividades-central').html(dados);
       }
    })
} 

buscarActividades();
apresentarReport();
setInterval(apresentarReport,5000);


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
        $('#formActividade')[0].reset();
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
      // Evento de clique no botão de adição de membro
      
      
      // Chama a função para carregar os membros cadastrados a cada 5 segundos
    

    $(document).on('click','a[data-role]',function(e){
        e.preventDefault();
        var id = ($(this).data('id'));
        var actividade = $('#'+id).children('td[data-target=actividade]').text();
        var responsavel = $('#'+id).children('td[data-target=responsavel]').text();
        var objectivo = $('#'+id).children('td[data-target=objectivo]').text();
        var data = $('#'+id).children('td[data-target=data]').text();
        var lugar = $('#'+id).children('td[data-target=lugar]').text();
        var duracao = $('#'+id).children('td[data-target=duracao]').text();
        var observacao = $('#'+id).children('td[data-target=observacao]').text();
        var estado = $('#'+id).children('td[data-target=estado]').text();
        var departamento = $('#'+id).children('td[data-target=departamento]').text();

        
        $("#id").val(id);
        $("#actividade").val(actividade);
        $('#responsavel').val(responsavel);
        $('#objectivo').val(objectivo);
        $('#data').val(data);
        $('#lugar').val(lugar);
        $('#duracao').val(duracao);
        $('#observacao').val(observacao);
        $('#estado').val(estado);
        $('#departamento').val(departamento);
        
        mostrarModal('caixa-informacao');
      });
      
