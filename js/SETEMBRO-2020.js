// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

var dataOne = {
  label: "6493 | Qualitativo ",
  lineTension: 0.3,
  borderColor: "rgba(240,38,27)",
  pointRadius: 3,
  pointBackgroundColor: "rgba(240,38,27)",
  pointBorderColor: "rgba(240,38,27)",
  pointHoverRadius: 3,
  pointHoverBackgroundColor: "rgba(240,38,27)",
  pointHoverBorderColor: "rgba(240,38,27)",
  pointHitRadius: 10,
  pointBorderWidth: 2,
  data: [301, 2520, 13, 3659],
};

var dataTwo = {
  label: "3120 | Quantitativo",
  lineTension: 0.3,
  borderColor: "rgba(62,39,106)",
  pointRadius: 3,
  pointBackgroundColor: "rgba(62,39,106)",
  pointBorderColor: "rgba(62,39,106)",
  pointHoverRadius: 3,
  pointHoverBackgroundColor: "rgba(62,39,106)",
  pointHoverBorderColor: "rgba(62,39,106)",
  pointHitRadius: 10,
  pointBorderWidth: 2,
  data: [60, 163, 61, 2863],
};





// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["IMP (CONT./CLIP.)", "DG (PEÇ./IMPR.)", "FAV (COBER./MAT.)", "MDS (POSTS./ALC.)"],
    datasets: [ dataOne, dataTwo]  
  },
  options: {
    
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true,
      labels: {
          fontColor: 'rgb(255, 99, 132)'
      }
  },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel  + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

//----------------------------------------------------------------------------------------------------

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["SEMGOV", "SEMUS", "SEMAS", "SEMIMSP", "SEMSOPC"],
    datasets: [{
      label: "Demandas",
      backgroundColor: "rgb(62,39,106)",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [2, 13, 6, 2, 1],
    }],
  },
  options: {
    
    title: {
      display: true,
      text: '24 requerimentos',
    },
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'Secretaria'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 5
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15,
          maxTicksLimit: 5,
          padding: 10,
          
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return  number_format(tooltipItem.yLabel)+" " + datasetLabel ;
        }
      }
    },
  }
});
