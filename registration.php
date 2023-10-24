<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom Dark Theme Styles -->
    <style>
        body {
            background-color: #333; /* Dark background color */
            color: #fff; /* Light text color */
        }


        h1 {
            color: #007bff; /* Primary color for headings */
        }

        .form-label {
            color: #fff; /* Light text color for form labels */
        }

        .form-control {
            background-color: #555; /* Dark form input background */
            color: #fff; /* Light text color for form input */
        }

        .btn-primary {
            background-color: #007bff; /* Primary color for buttons */
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <div class="container"><br>
        <br>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle form submission
            include 'process_form.php';
        } else {
            // Display the form
            include 'form.php';
        }
        ?>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
