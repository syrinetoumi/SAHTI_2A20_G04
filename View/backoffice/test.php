<?php
include '../../Controller/userC.php';
include '../../model/user.php';

$userController = new userC();

// Get role statistics
$roleStatistics = $userController->getRoleStatistics();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Role Statistics</h2>

    <!-- Canvas to render the bar chart -->
    <canvas id="roleChart" width="400" height="200"></canvas>

    <script>
        // PHP data to JavaScript
        var roleData = <?php echo json_encode($roleStatistics); ?>;

        // Chart.js
        var ctx = document.getElementById('roleChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(roleData),
                datasets: [{
                    label: 'Role Percentage',
                    data: Object.values(roleData),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
</body>
</html>
