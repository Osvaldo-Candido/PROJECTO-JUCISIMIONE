
//Evento para pesquisa de dados por fase (Crianças, Jovens, Adultos)

// Função para carregar os membros cadastrados
function getMembros() {
    $.ajax({
      url: 'http://localhost/JUCI-IEIA-SIMIONE/membro/escala',
      method: 'GET',
      dataType: "html",
      success:function (resultados) {
        $(".dados-escala").html(resultados);
      }
    });
  }
  getMembros();
  