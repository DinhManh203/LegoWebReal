<?php
session_start();
include('../server/connection.php');


$count_stmt = $conn->prepare("
    SELECT product_category, COUNT(*) as count 
    FROM products 
    GROUP BY product_category
");
$count_stmt->execute();
$count_result = $count_stmt->get_result();


$categories = [];
$counts = [];
while ($row = $count_result->fetch_assoc()) {
    $categories[] = $row['product_category'];
    $counts[] = $row['count'];
}
?>

<?php
include('../admin_page/admin/includes/header.php');
?> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div style="width: 65%; margin: auto; margin-top: 100px;">
    <h2 class="text-center pb-3" style="color: #6A5ACD">Column chart of product quantity in stock</h2>
    <canvas id="myChart"></canvas>
</div>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const categories = <?php echo json_encode($categories); ?>;
  const counts = <?php echo json_encode($counts); ?>;

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: categories,
      datasets: [{
        label: '# of Products',
        data: counts,
        borderWidth: 1,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ]
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<?php
include('../admin_page/admin/includes/footer.php');
?>
