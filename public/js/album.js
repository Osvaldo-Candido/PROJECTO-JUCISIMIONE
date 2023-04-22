$(document).on('click','a[data-role]',function(e){
  e.preventDefault();
  var id = ($(this).data('id'));
  
  e.preventDefault(); // evita que o link execute a ação padrão
  var id = $(this).data('id');// pega a URL do link
  $.ajax({
    url: "http://localhost/JUCI-IEIA-SIMIONE/album/eliminarImagem",
    type: "POST",
    data:{id:id},
    success: function(data) {
     if(data == "Eliminado com sucesso"){
      getAlbum();
      window.alert('Eliminado com sucesso');
     } // exibe a mensagem retornada pela requisição AJAX
    }
  });

});
$("#formFotos").submit(function(e){
  e.preventDefault();
  var formData = new FormData($(this)[0]);

  $.ajax({
      url: "http://localhost/JUCI-IEIA-SIMIONE/album/adicionarImagem",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(mensagem) {
        // Se o membro foi adicionado com sucesso, exibe uma mensagem de alerta
        if(mensagem == "Inserido com sucesso") {
          resetForm();
          fecharModal();
          getAlbum();
        }
        if(mensagem == "Editado com sucesso"){
          resetForm();
          fecharModal();
          getAlbum();
        } else {
          // Se houve algum erro, exibe a mensagem de erro na tela
          $('.erro-text').css('display', 'block');
          $('.erro-text').html(mensagem);
        }
      }
  });
});

function getAlbum(){
    
    $.ajax({
         url:'http://localhost/JUCI-IEIA-SIMIONE/album/buscarImagens',
         method:'GET',
         dataType: 'html',
         success:function(dados){
            $('.imagens').html(dados);
         }
        });
}

getAlbum();
setInterval(getAlbum,5000);
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
   const botaoAdicionar = document.querySelector('.add-imagem');

   botaoAdicionar.addEventListener('click', () =>{ 
     mostrarModal('caixa-informacao')});
     $('.fechar-form-actividade').click(function() {
       fecharModal();
     }); 

