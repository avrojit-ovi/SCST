<?php
// Database connection
$servername = "localhost";
$username = "root"; // Use your MySQL username
$password = ""; // Use your MySQL password
$dbname = "SCST_members";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Generate unique user ID (e.g., SCST8253)
    do {
        $random_number = mt_rand(1000, 9999); // Generate a 4-digit random number
        $user_unique_id = "SCST" . $random_number;

        // Check if this user_unique_id already exists in the database
        $stmt = $conn->prepare("SELECT id FROM users WHERE user_unique_id = ?");
        $stmt->bind_param("s", $user_unique_id);
        $stmt->execute();
        $stmt->store_result();
    } while ($stmt->num_rows > 0); // Repeat until a unique ID is generated

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (user_unique_id, name, user_name, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $user_unique_id, $name, $user_name, $email, $password);

    if ($stmt->execute()) {
        // Display inserted user details using Bootstrap
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>User Inserted</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-success'>
                    <h4 class='alert-heading'>User Inserted Successfully!</h4>
                    <p><strong>User Unique ID:</strong> $user_unique_id</p>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Username:</strong> $user_name</p>
                    <p><strong>Email:</strong> $email</p>
                    <hr>
                    <a href='login.php' class='btn btn-primary'>Go to Login</a>
                </div>
            </div>
        </body>
        </html>";
    } else {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-danger'>
                    <h4 class='alert-heading'>Error Inserting User</h4>
                    <p>Error: " . $stmt->error . "</p>
                    <a href='insert_user.php' class='btn btn-danger'>Go Back</a>
                </div>
            </div>
        </body>
        </html>";
    }

    $stmt->close();
}

$conn->close();
?>
