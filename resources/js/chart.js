import Chart from 'chart.js/auto'
//
//
// (async function() {
//     const data = [
//         { year: 2010, count: 10 },
//         { year: 2011, count: 20 },
//         { year: 2012, count: 15 },
//         { year: 2013, count: 25 },
//         { year: 2014, count: 22 },
//         { year: 2015, count: 30 },
//         { year: 2016, count: 28 },
//     ];
//
//     const data2 = [
//         { year: 2010, count: 11 },
//         { year: 2011, count: 22 },
//         { year: 2012, count: 13 },
//         { year: 2013, count: 21 },
//         { year: 2014, count: 29 },
//         { year: 2015, count: 331 },
//         { year: 2016, count: 21 },
//     ];
//
//     new Chart(
//         document.getElementById('acquisitions'),
//         {
//             type: 'line',
//             data: {
//                 labels: data.map(row => row.year),
//                 datasets: [
//                     {
//                         label: 'Acquisitions by year',
//                         data: data.map(row => row.count)
//                     },
//                     {
//                         label: 'Acquisitions by year',
//                         data: data2.map(row => row.count)
//                     }
//                 ]
//             }
//         }
//     );
// })();

// Function to create a chart
function createChart(chartId, chartData, chartOptions) {
    const ctx = document.getElementById(chartId).getContext('2d');
    new Chart(ctx, {
        type: 'line', // or 'line', 'pie', etc.
        data: chartData,
        options: chartOptions
    });
}

// Make the function available globally
window.createChart = createChart;
