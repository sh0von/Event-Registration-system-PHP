<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "form";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}session_start();

// Check if the user is not authenticated (not logged in)
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php"); // Redirect to login.php
    exit(); // Stop further execution of the admin.php file
}

// Check if filter parameters are provided
$filter_batch = isset($_GET['batch']) ? $_GET['batch'] : '';
$filter_department = isset($_GET['department']) ? $_GET['department'] : '';

// Construct the SQL query based on the filters, and add ORDER BY for descending timestamp
$query = "SELECT *, DATE_FORMAT(timestamp, '%h:%i %p, %d %b, %Y') AS formatted_timestamp FROM user_information";
if (!empty($filter_batch)) {
    $query .= " WHERE batch = '$filter_batch'";
    if (!empty($filter_department)) {
        $query .= " AND department = '$filter_department'";
    }
} elseif (!empty($filter_department)) {
    $query .= " WHERE department = '$filter_department'";
}
$query .= " ORDER BY timestamp DESC"; // Sort by timestamp in descending order

$result = $connection->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .table-container {
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white p-4 text-center">
        <h1>Admin Panel</h1>
    </header>
    <div class="container table-container">
        <h2 class="mt-4">Submissions</h2>
        <form action="admin.php" method="get" class="mb-3">
            <div class="row">
                <div class="col">
                    <select id="batch-filter" name="batch" class="form-select">
                        <option value="" <?php if (empty($filter_batch)) echo 'selected'; ?>>All Batches</option>
                        <option value="18" <?php if ($filter_batch == '18') echo 'selected'; ?>>Batch 18</option>
                        <option value="19" <?php if ($filter_batch == '19') echo 'selected'; ?>>Batch 19</option>
                        <option value="20" <?php if ($filter_batch == '20') echo 'selected'; ?>>Batch 20</option>
                        <option value="21" <?php if ($filter_batch == '21') echo 'selected'; ?>>Batch 21</option>
                        <option value="22" <?php if ($filter_batch == '22') echo 'selected'; ?>>Batch 22</option>
                    </select>
                </div>
                <div class="col">
                    <select id="department-filter" name="department" class="form-select">
                        <option value="" <?php if (empty($filter_department)) echo 'selected'; ?>>All Departments</option>
                        <option value="Department A" <?php if ($filter_department == 'Department A') echo 'selected'; ?>>Department A</option>
                        <option value="Department B" <?php if ($filter_department == 'Department B') echo 'selected'; ?>>Department B</option>
                        <!-- Add more department options as needed -->
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">

        <table class="table table-bordered table-striped">
    <thead class="bg-primary text-white">
        <tr>
            <th>Serial Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Batch</th>
            <th>CUET ID</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Timestamp</th> <!-- New column for timestamp -->
        </tr>
    </thead>
    <tbody>
        <?php
        $serialNumber = 1; // Initialize the serial number counter
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $serialNumber . "</td>"; // Display the serial number
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["department"] . "</td>";
                echo "<td>" . $row["batch"] . "</td>";
                echo "<td>" . $row["cuet_id"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["formatted_timestamp"] . "</td>";

                echo "</tr>";
                $serialNumber++; // Increment the serial number for the next row
            }
        } else {
            echo "<tr><td colspan='9'>No submissions found.</td></tr>";
        }
        ?>
    </tbody>
</table>
        </div>
    </div>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Include jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to update filtered results using AJAX
        function updateFilteredResults() {
            var batch = $('#batch-filter').val();
            var department = $('#department-filter').val();

            $.ajax({
                url: 'admin.php', // This page is the same page (admin.php)
                type: 'GET',
                data: { batch: batch, department: department },
                success: function (data) {
                    // Find the table body and replace its content with the filtered data
                    $('#filtered-results').html($(data).find('tbody').html());
                }
            });
        }

        // Bind the function to filter changes
        $('#batch-filter, #department-filter').on('change', updateFilteredResults);
    </script>
</body>
</html>

<?php
$connection->close();
?>
