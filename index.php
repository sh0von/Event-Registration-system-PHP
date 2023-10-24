<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Homepage</title>
    <style>
        body {
            font-family: 'Trebuchet MS', Arial, sans-serif;
            background-color: #333;
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            padding:10px;
            margin: 0;
        }
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
        p {
            font-size: 18px;
            color: #ccc;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Event</h1>
        <p>Join us for an exciting event filled with knowledge and fun!</p>

        <h2>Event Details</h2>
        <p>Date: November 10, 2023</p>
        <p>Time: 10:00 AM - 4:00 PM</p>
        <p>Location: ABC Convention Center</p>

        <a href="registration.php" class="btn">Register Now</a>
    </div>
</body>
</html>
