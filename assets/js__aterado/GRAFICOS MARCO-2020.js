//--------------------------REQUERIMENTOS--------------------------------------------------------------
//carrega a api do google (só precisa ser chamado uma vez por arquivo)
google.charts.load('current', {'packages':['corechart']});

// define o callback que carrega a  API do google.
google.charts.setOnLoadCallback(graficoREQ);

// chama a função
function graficoREQ() {

   // opções de tamanho, titulo e legendas.
   var options = {
      chartArea:{width:"85%",height:"70%"},
    
      };
 
   // escolhe o modelo do gáfico.
   var chart = new google.visualization.PieChart(document.getElementById('grafico_REQ-MAR20'));
 
   (async () => {
    let chartData;
    chartData = await fetch("http://localhost/login_redecom_backup_30-07-2020/arquivo.json")
      .then(response => {
      return response.json();
      })
      .then(jsonBody => {
           const json = jsonBody;
           return json;
      })
 
        // Criar tabela
       var data = google.visualization.arrayToDataTable([
          ['Element', 'secretarias', { role: 'style' }],
 
             // barras
             ['SEMGOV', chartData['marco']['requerimentos'][0]['semgov'],'#ff0000'],
             ['SEMUS', chartData['marco']['requerimentos'][0]['semus'], '#9d2424' ],
             ['SEMAS', chartData['marco']['requerimentos'][0]['semas'],'#f5e70d'],
             ['SEMED', chartData['marco']['requerimentos'][0]['semed'], '#ada746' ],
             ['SEMSOPC', chartData['marco']['requerimentos'][0]['semsopc'],'#007eff'],
             ['SETRADE', chartData['marco']['requerimentos'][0]['setrade'], '#1c2e9a' ],
             ['GABINETE', chartData['marco']['requerimentos'][0]['gabineteDoPrefeito'],'#a588dc'],
             ['PROCON', chartData['marco']['requerimentos'][0]['procon'], '#60409f' ],
             ['FORUM', chartData['marco']['requerimentos'][0]['forum'], '#BFEB01' ],
             ['SEMCELT', chartData['marco']['requerimentos'][0]['semcelt'], '#F5980A' ],
             ['SEMEF', chartData['marco']['requerimentos'][0]['semef'],'#09DAEB'],
             ['SEMMURB', chartData['marco']['requerimentos'][0]['semmurb'], '#08EB36' ],
             ['DEFESA CIVIL', chartData['marco']['requerimentos'][0]['defesaCivil'], '#084A36' ]// título , valor, cor 
       ]);      
 
      chart.draw(data, options);
  })();
 
 }
//--------------------------IMPRENSA--------------------------------------------------------------

 // define o callback que carrega a  API do google.
     google.charts.setOnLoadCallback(graficoI);

     function graficoI() {

      // opções de tamanho, titulo e legendas.
           var options = {
            chartArea:{width:"85%",height:"70%"},
            legend: { position: 'none'},
                        };
                          
    
           // escolhe o modelo do gáfico.
           var chart = new google.visualization.BarChart(document.getElementById('grafico_I-MAR20'));
    
           (async () => {
             let chartData;
             chartData = await fetch("http://localhost/login_redecom_backup_30-07-2020/arquivo.json")
               .then(response => {
               return response.json();
               })
               .then(jsonBody => {
                    const json = jsonBody;
                    return json;
               })
    
               // Criar tabela
             var data = google.visualization.arrayToDataTable([
             ['Produto', 'Imp',  { role: 'style' }],
     
                // barras
             ['CONTEÚDOS', chartData['marco']['imprensa'][0]['conteudos'],'#ff0000'],
             ['CLIPPINGS', chartData['marco']['imprensa'][0]['clipings'], '#9d2424' ] // título , valor, cor 
          ]);            
         
               chart.draw(data, options);
           })();
    }



//---------------------------------DESIGNER GRÁFICO------------------------------------------------
// define o callback que carrega a  API do google.
google.charts.setOnLoadCallback(graficoDG);

// chama a função
      function graficoDG() {

        // Criar tabela
        var data = google.visualization.arrayToDataTable([
         ['Produto', 'DG', { role: 'style' }],

            // barras
         ['ARTES', 126,'#f5e70d'],
         ['IMPRESSÕES', 0, '#ada746' ] // título , valor, cor 
      ]);

     // opções de tamanho, titulo e legendas.
        var options = {
         chartArea:{width:"85%",height:"70%"},
         legend: { position: 'none'},
      };

        // escolhe o modelo do gáfico.
        var chart = new google.visualization.BarChart(document.getElementById('grafico_DG-MAR20'));

        (async () => {
         let chartData;
         chartData = await fetch("http://localhost/login_redecom_backup_30-07-2020/arquivo.json")
           .then(response => {
           return response.json();
           })
           .then(jsonBody => {
                const json = jsonBody;
                return json;
           })

           // Criar tabela
         var data = google.visualization.arrayToDataTable([
         ['Produto', 'Imp',  { role: 'style' }],
 
            // barras
         ['ARTES', chartData['marco']['design'][0]['artes'],'#f5e70d'],
         ['IMPRESSÕES', chartData['marco']['design'][0]['impressoes'], '#ada746' ] // título , valor, cor 
      ]);            
           chart.draw(data, options);
       })();

}


//-----------------------------FOTOGRAFIA E AUDIOVISUAL----------------------------------------------------------


// define o callback que carrega a  API do google.
 google.charts.setOnLoadCallback(graficoFA);

// chama a função
 function graficoFA() {

   // Criar tabela
   var data = google.visualization.arrayToDataTable([
    ['Produto', 'FA', { role: 'style' }],
    

       // barras
    ['COBERTURAS', 0.0,'#007eff'],
    ['MATERIAL', 0.0, '#1c2e9a' ] // título , valor, cor 
 ]);

  // opções de tamanho, titulo e legendas.
   var options = {
      chartArea:{width:"85%",height:"70%"},
      legend: { position: 'none'},
 };
   // escolhe o modelo do gáfico.
   var chart = new google.visualization.BarChart(document.getElementById('grafico_FA-MAR20'));

   (async () => {
      let chartData;
      chartData = await fetch("http://localhost/login_redecom_backup_30-07-2020/arquivo.json")
        .then(response => {
        return response.json();
        })
        .then(jsonBody => {
             const json = jsonBody;
             return json;
        })

        // Criar tabela
      var data = google.visualization.arrayToDataTable([
      ['Produto', 'Imp',  { role: 'style' }],

         // barras
      ['COBERTURAS', chartData['marco']['fotografia'][0]['cobertura'],'#007eff'],
      ['MATERIAL', chartData['marco']['fotografia'][0]['material'], '#1c2e9a' ] // título , valor, cor 
   ]);            
        chart.draw(data, options);
    })();
   
chart.draw(data, options);
}
//--------------------------------MIDIA SOCIAL ------------------------------------------------

// define o callback que carrega a  API do google.
 google.charts.setOnLoadCallback(graficoMS);

// chama a função
 function graficoMS() {

   // Criar tabela
   var data = google.visualization.arrayToDataTable([
    ['Produto', 'MS', { role: 'style' }],
       // barras
       
    ['SEGUIDORES', 28.369,'#a588dc'],
    ['ALCANCE', 390.980, '#60409f' ] // título , valor, cor 
 ]);

  // opções de tamanho, titulo e legendas.
   var options = {
      chartArea:{width:"85%",height:"70%"},
      legend: { position: 'none'},
    vAxis: {
      title: '115 POSTS'
    },
    hAxis: {
      title: '*Principal rede social utilizada no Brasil'
    },
 };

   // escolhe o modelo do gáfico.
   var chart = new google.visualization.BarChart(document.getElementById('grafico_MS-MAR20'));

   (async () => {
      let chartData;
      chartData = await fetch("http://localhost/login_redecom_backup_30-07-2020/arquivo.json")
        .then(response => {
        return response.json();
        })
        .then(jsonBody => {
             const json = jsonBody;
             return json;
        })

           // Criar tabela
       var data = google.visualization.arrayToDataTable([
         ['Produto', 'MS', { role: 'style' }],
            // barras
            
         ['SEGUIDORES', chartData['marco']['social'][0]['seguidores'] ,'#a588dc'],
         ['ALCANCE', chartData['marco']['social'][0]['alcance'] , '#60409f' ] // título , valor, cor 
      ]);
      
        chart.draw(data, options);
    })();

// finaliza e executa.
chart.draw(data, options);
}
//---------------------------------------------------------------------------------------------------
