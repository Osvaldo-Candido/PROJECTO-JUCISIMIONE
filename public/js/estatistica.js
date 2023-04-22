function reporteEstatistica()
{
    $.ajax({
        url:'http://localhost/JUCI-IEIA-SIMIONE/estatistica/reporte',
        method:'GET',
        success:function(dados){
           $('.itens-estatistica').html(dados);
        }
       });
}

reporteEstatistica();
setInterval(reporteEstatistica,5000);