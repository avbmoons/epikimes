import Chart from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels';

Chart.register(ChartDataLabels);

let statusesCh = ['1', '2', '3'];
let statusesStr = ['Draft', 'Active', 'Close'];

let rolesStr = ['Guest', 'Admin'];

let myChartInstance = null;
let myChartInstance1 = null;
let myChartInstance2 = null;
let myChartInstance3 = null;
let myChartInstance4 = null;

const ctx = document.getElementById('testChart'); //ItemsByColors
//const ctx = document.querySelector('[name="chartItemsByColors"]');
const ctx1 = document.getElementById('testChart1'); //CategoriesByStatus
const ctx2 = document.getElementById('testChart2')?.getContext('2d'); //ItemsByStatus (round)
const ctx3 = document.getElementById('testChart3')?.getContext('2d'); //UsersByRole (round)
const ctx4 = document.getElementById('testChart4')?.getContext('2d'); //MailsByStatus (round)
//console.log('ctx4 = ', ctx4);

// chart ItemsByColors
if (ctx) {
  myChartInstance = Chart.getChart(ctx);
  if (myChartInstance) {
    myChartInstance.destroy();
  }

myChartInstance = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: colorsCh,
    datasets: [{
      label: 'Items by Colors',
      data: colorsItemsStr,
      backgroundColor: [
        'rgba(125, 121, 66, 0.7)',
        'rgba(66, 125, 107, 0.7)',
        'rgba(132, 117, 167, 0.7)',
        'rgba(167, 128, 117, 0.7)',
        'rgba(167,164,117, 0.7)',
      ], 
      borderColor: [
        'rgba(125, 121, 66, 0.7)',
        'rgba(66, 125, 107, 0.7)',
        'rgba(132, 117, 167, 0.7)',
        'rgba(167, 128, 117, 0.7)',
        'rgba(167,164,117, 0.7)',
      ],  
      borderWidth: 1               
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        ticks: {
          autoSkip: false,
          maxRotation: 45,
          minRotation: 0,
          font: {
            size: 10,
          }
        }
      },
      y: {
        beginAtZero: true,
        ticks: {
          maxRotation: 45,
          minRotation: 0,
          font: {
            size: 10,
          }
        }
      }
    },
    plugins: {
      datalabels: {
        display: false,
      },
      title: {
        display: true,
        text: 'Items by Colors',
        color: 'rgba(12, 51, 135, 1)',
        font: {
          size: 12,
          weight: 'bold',
          family: 'Roboto',
        },
        align: 'center',
      },
      legend: {
        display: false,
      },
      ticks: {
        font: {
          size: 10,
        },
        maxRotation: 45,
        minRotation: 0,
      },
    },
    layout: {
      padding: {
        left: 5,
        right: 5,
        top: 5,
        bottom: 5,
      },
    },
  }
});
}

// chart CategoriesByStatus
if (ctx1) {
  if (myChartInstance1) {
    myChartInstance1.destroy();
  }

myChartInstance1 = new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: categoriesCh,
    datasets: [{
      label: 'Categories',
      data: categoriesStr,
      backgroundColor: [
        'rgba(29, 57, 164, 0.7)',
        'rgba(132, 117, 167, 0.7)',
        'rgba(167, 128, 117, 0.7)',
        'rgba(167,164,117, 0.7)',
        'rgba(75, 116, 179, 0.7)',
      ],
      borderColor: [
        'rgba(29, 57, 164, 0.7)',
        'rgba(132, 117, 167, 0.7)',
        'rgba(167, 128, 117, 0.7)',
        'rgba(167,164,117, 0.7)',
        'rgba(75, 116, 179, 0.7)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        ticks: {
          autoSkip: false,
          maxRotation: 45,
          minRotation: 0,
          font: {
            size: 10,
          }
        }
      },
      y: {
        beginAtZero: true,
        ticks: {
          callback: function(value) {
            if (value === 1) {return 'Draft'};
            if (value === 2) {return 'Active'};
            if (value === 3) {return 'Close'};
            return '';
          },
          font: {
            size: 10,
          },
          maxRotation: 45,
          minRotation: 0,
        }
      }
    },
    plugins: {
      datalabels: {
        display: false,
      },
      title: {
        display: true,
        text: 'Categories',
        color: 'rgba(12, 51, 135, 1)',
        font: {
          size: 12,
          weight: 'bold',
          family: 'Roboto',
        },
        align: 'center',
      },
      legend: {
        display: false,
      },
    },
    layout: {
      padding: {
        left: 5,
        right: 5,
        top: 5,
        bottom: 5,
      },
    },
  },
});
}

// chart ItemsByStatus (round)
if (ctx2) {
  if (myChartInstance2) {
    myChartInstance2.destroy();
  }
myChartInstance2 = new Chart(ctx2, {
  type: 'pie',
  data: {
    labels: statusesStr,
    datasets: [{
      data: [sumItemsDraft, sumItemsActive, sumItemsClose],
      backgroundColor: [
        'rgba(252, 207, 194, 0.7)',
        'rgba(29, 57, 164, 0.7)',
        'rgba(125, 121, 66, 0.7)',
        'rgba(83, 56, 33, 0.7)',
      ],
      borderColor: [
        'rgba(252, 207, 194, 0.7)',
        'rgba(29, 57, 164, 0.7)',
        'rgba(125, 121, 66, 0.7)',
        'rgba(83, 56, 33, 0.7)',
      ],
      borderWidth: 1,
      hoverOffset: 4,
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      datalabels: {
        display: function(context) {
          return context.dataset.data[context.dataIndex] !== 0;
        },
        color: '#000',
        font: {
          weight: 'normal',
          size: 10,
        },
        anchor: 'right',
        align: 'left',
        offset: 10,
        formatter: (value, ctx2) => {
          let sum = ctx2.dataset.data.reduce((a, b) => a + b, 0);
          let percentage = ((value * 100) / sum).toFixed(0) + " %";
          let text = ctx2.chart.data.labels[ctx2.dataIndex] + ' ' + percentage;
          return text;    // percentage;  // value;
        },
        borderColor: 'grey',
        borderWidth: 1,
        borderRadius: 4,
        backgroundColor: 'white',
      },
      title: {
        display: true,
        text: 'Items',
        color: 'rgba(12, 51, 135, 1)',
        font: {
          size: 12,
          weight: 'bold',
          family: 'Roboto',
        },
        align: 'center',
      },
      legend: {
        display: false,
      },
    },
    layout: {
      padding: {
        left: 5,
        right: 5,
        top: 5,
        bottom: 5,
      },
    },
  },
});
}

// chart UsersByRole (round)
if (ctx3) {
  if (myChartInstance3) {
    myChartInstance3.destroy();
  }
myChartInstance3 = new Chart(ctx3, {
  type: 'pie',
  data: {
    labels: rolesStr,
    datasets: [{
      data: [sumUsersGuest, sumUsersAdmin],
      backgroundColor: [
        'rgba(252, 207, 194, 0.7)',
        'rgba(29, 57, 164, 0.7)',
        'rgba(125, 121, 66, 0.7)',
        'rgba(83, 56, 33, 0.7)',
      ],
      borderColor: [
        'rgba(252, 207, 194, 0.7)',
        'rgba(29, 57, 164, 0.7)',
        'rgba(125, 121, 66, 0.7)',
        'rgba(83, 56, 33, 0.7)',
      ],
      borderWidth: 1,
      hoverOffset: 4,
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      datalabels: {
        display: function(context) {
          return context.dataset.data[context.dataIndex] !== 0;
        },
        color: '#000',
        font: {
          weight: 'normal',
          size: 10,
        },
        anchor: 'right',
        align: 'left',
        offset: 10,
        formatter: (value, ctx3) => {
          let sum = ctx3.dataset.data.reduce((a, b) => a + b, 0);
          let percentage = ((value * 100) / sum).toFixed(0) + " %";
          let text = ctx3.chart.data.labels[ctx3.dataIndex] + ' ' + percentage;
          return text;    // percentage;  // value;
        },
        borderColor: 'grey',
        borderWidth: 1,
        borderRadius: 4,
        backgroundColor: 'white',
      },
      title: {
        display: true,
        text: 'Users',
        color: 'rgba(12, 51, 135, 1)',
        font: {
          size: 12,
          weight: 'bold',
          family: 'Roboto',
        },
        align: 'center',
      },
      legend: {
        display: false,
      },
    },
    layout: {
      padding: {
        left: 5,
        right: 5,
        top: 5,
        bottom: 5,
      },
    },
  },
});
}

// chart MailsByStatus (round)
if (ctx4) {
  if (myChartInstance4) {
    myChartInstance4.destroy();
  }
myChartInstance4 = new Chart(ctx4, {
  type: 'pie',
  data: {
    labels: statusesStr,
    datasets: [{
      data: [sumMailsDraft, sumMailsActive, sumMailsClose],
      backgroundColor: [
        'rgba(252, 207, 194, 0.7)',
        'rgba(29, 57, 164, 0.7)',
        'rgba(125, 121, 66, 0.7)',
        'rgba(83, 56, 33, 0.7)',
      ],
      borderColor: [
        'rgba(252, 207, 194, 0.7)',
        'rgba(29, 57, 164, 0.7)',
        'rgba(125, 121, 66, 0.7)',
        'rgba(83, 56, 33, 0.7)',
      ],
      borderWidth: 1,
      hoverOffset: 4,
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      datalabels: {
        display: function(context) {
          return context.dataset.data[context.dataIndex] !== 0;
        },
        color: '#000',
        font: {
          weight: 'normal',
          size: 10,
        },
        anchor: 'right',
        align: 'left',
        offset: 10,
        formatter: (value, ctx4) => {
          let sum = ctx4.dataset.data.reduce((a, b) => a + b, 0);
          let percentage = ((value * 100) / sum).toFixed(0) + " %";
          let text = ctx4.chart.data.labels[ctx4.dataIndex] + ' ' + percentage;
          return text;    // percentage;  // value;
        },
        borderColor: 'grey',
        borderWidth: 1,
        borderRadius: 4,
        backgroundColor: 'white',
      },
      title: {
        display: true,
        text: 'Mails',
        color: 'rgba(12, 51, 135, 1)',
        font: {
          size: 12,
          weight: 'bold',
          family: 'Roboto',
        },
        align: 'center',
      },
      legend: {
        display: false,
      },
    },
    layout: {
      padding: {
        left: 5,
        right: 5,
        top: 5,
        bottom: 5,
      },
    },
  },
});
}
