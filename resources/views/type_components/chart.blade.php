{{--<div class="chart-container" style="position: relative; height:40vh; width:80vw">--}}
{{--    <canvas id="myChart"></canvas>--}}
{{--</div>--}}

<div class="container-fluid ">
    <div class="chart-container" style="position: relative; height: 40vh;">
        <canvas id="myChart" style="width: 500vh; height: 100vh; padding-left: 40px"></canvas>
    </div>
</div>

<div class="container-fluid ">
    <div class="chart-container" style="position: relative; height: 40vh;">
        <canvas id="dailyChart" style="width: 500vh; height: 100vh; padding-left: 40px"></canvas>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = {!! json_encode($resultsArray) !!}; // Convert PHP array to JavaScript object

        const myData = {
            labels: data.map(row => row.updated_at),
            datasets: [{
                label: 'all typing results',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                hoverBackgroundColor: 'rgba(255, 99, 132, 0.4)',
                hoverBorderColor: 'rgba(255, 99, 132, 1)',
                data: data.map(row => row.result)
            }]
        };

        const chartOptions = {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true,
                }
            }
        };
        // Call the createChart function
        createChart('myChart', myData, chartOptions);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = {!! json_encode($resultsArray) !!}; // Convert PHP array to JavaScript object

        data.forEach(row => {
            row.updated_at = row.updated_at.split(' ')[1]; // only dates
        });

        console.log(data);

        // let newData = {};
        //
        // data.forEach(row => {
        //
        // });

        let newData = {};

        data.forEach(row => {
            const { updated_at, result } = row;

            if (!newData[updated_at]) {
                newData[updated_at] = {
                    sum: 0,
                    count: 0,
                    mean: 0
                };
            }

            // Accumulate sum and count
            newData[updated_at].sum += result;
            newData[updated_at].count++;
        });

// Calculate arithmetic mean for each day
        Object.keys(newData).forEach(date => {
            newData[date].mean = newData[date].sum / newData[date].count;
        });

        console.log(newData);


        const myData = {
            labels: newData.map(row => row.date),
            datasets: [{
                label: 'all typing results',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                hoverBackgroundColor: 'rgba(255, 99, 132, 0.4)',
                hoverBorderColor: 'rgba(255, 99, 132, 1)',
                data: newData.map(row => row.result)
            }]
        };

        const chartOptions = {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true,
                }
            }
        };
        // Call the createChart function
        createChart('dailyChart', myData, chartOptions);
    });
</script>
