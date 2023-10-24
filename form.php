<?php
// Initialize variables
$name = $email = $department = $batch = $cuet_id = $phone = $address = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $batch = $_POST['batch'];
    $cuet_id = $_POST['cuet_id'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Form Validation
    if (empty($name) || empty($email) || empty($department) || empty($batch) || empty($cuet_id) || empty($phone) || empty($address)) {
        $error = "All fields are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <style>

/* Default styles for .container */
.container {
    background-color: #333;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    margin: 20px auto;
    max-width: 700px;
}

/* Media query for screens with a maximum width of 768px (adjust as needed) */
@media (max-width: 768px) {
    .container {
        box-shadow: none; /* Remove box shadow */
        border-radius: 0; /* Remove border radius */
    }
}

        h1 {
            color: #007bff;
        }

        .form-label {
            color: #fff;
        }

        .form-control {
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .form-select {
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        textarea {
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
        }

        .text-danger {
            color: #ff0000;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="">

        <form action="" method="post">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>

            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>

            <label for="department" class="form-label">Department:</label>
            <input type="text" name="department" class="form-control" value="<?php echo $department; ?>">

            <label for="batch" class="form-label">Batch:</label>
            <select name="batch" class="form-select">
                <option value="18" <?php echo ($batch == '18') ? 'selected' : ''; ?>>18</option>
                <option value="19" <?php echo ($batch == '19') ? 'selected' : ''; ?>>19</option>
                <option value="20" <?php echo ($batch == '20') ? 'selected' : ''; ?>>20</option>
                <option value="21" <?php echo ($batch == '21') ? 'selected' : ''; ?>>21</option>
                <option value="22" <?php echo ($batch == '22') ? 'selected' : ''; ?>>22</option>
            </select>

            <label for="cuet_id" class="form-label">CUET ID:</label>
            <input type="text" name="cuet_id" class="form-control" value="<?php echo $cuet_id; ?>" required>

            <label for="phone" class="form-label">Phone Number:</label>
            <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>" required>

            <label for="address" class="form-label">Address:</label>
            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>

            <div class="text-danger"><?php echo $error; ?></div>

            <button type="submit" class="btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
