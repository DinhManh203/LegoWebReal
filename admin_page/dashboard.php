<?php

  include('../admin_page/admin/includes/header.php');

?> 

    <div class="content">
        <h2>Dashboard</h2>
        <div class="summary">
            <div class="summary-item">
                <h3>Total Users</h3>
                <p>1000</p>
            </div>
            <div class="summary-item">
                <h3>Total Products</h3>
                <p>500</p>
            </div>
            <div class="summary-item">
                <h3>Total Orders</h3>
                <p>1500</p>
            </div>
        </div>

        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="scripts.js"></script>
    <script>
        // Sample data for the chart
        const labels = ['January', 'February', 'March', 'April', 'May', 'June'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Sales',
                backgroundColor: 'rgb(54, 162, 235)',
                borderColor: 'rgb(54, 162, 235)',
                data: [100, 200, 300, 400, 500, 600],
            }]
        };

        // Configuration options
        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        // Initialize chart
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
