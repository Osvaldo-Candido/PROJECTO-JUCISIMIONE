
    function ActualizarMain(){

        $.ajax({
            url:'http://localhost/JUCI-IEIA-SIMIONE/home/carregarDadosMain',
            method:'GET',
            dataType:'html',
            success: function(dados) {
                    $(".dash-mae").html(dados);
            }

        })
    }
    function ActualizarNotificacoes(){

        $.ajax({
            url:'http://localhost/JUCI-IEIA-SIMIONE/home/carregarNotificacoes',
            method:'GET',
            dataType:'html',
            success: function(dados) {
                    $(".notificacoes").html(dados);
            }

        })
    }

  ActualizarMain();
  setInterval(ActualizarMain,5000);
  ActualizarNotificacoes();
  setInterval(ActualizarNotificacoes,5000);