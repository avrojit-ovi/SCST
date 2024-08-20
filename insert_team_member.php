<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SCST_members";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate unique ID
function generateUniqueId($prefix) {
    $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
    return $prefix . $randomNumber;
}
$userUniqueId = generateUniqueId('SCST');

// Handle file uploads
$userPhoto = $_FILES['user_photo']['name'] ? $_FILES['user_photo']['name'] : '';
$userNidFrontPhoto = $_FILES['user_nid_front_photo']['name'] ? $_FILES['user_nid_front_photo']['name'] : '';
$userNidBackPhoto = $_FILES['user_nid_back_photo']['name'] ? $_FILES['user_nid_back_photo']['name'] : '';

// Upload files
if ($userPhoto) {
    move_uploaded_file($_FILES['user_photo']['tmp_name'], "uploads/" . $userPhoto);
}
if ($userNidFrontPhoto) {
    move_uploaded_file($_FILES['user_nid_front_photo']['tmp_name'], "uploads/" . $userNidFrontPhoto);
}
if ($userNidBackPhoto) {
    move_uploaded_file($_FILES['user_nid_back_photo']['tmp_name'], "uploads/" . $userNidBackPhoto);
}

$sql = "INSERT INTO team_members (name, fathers_name, mothers_name, user_unique_id, user_name, password, nid_number, date_of_birth, present_address, permanent_address, emergency_contact, emergency_contact_user_name, relationship_with_emergency_contact, user_photo, user_nid_front_photo, user_nid_back_photo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    'ssssssssssssssss',
    $_POST['name'],
    $_POST['fathers_name'],
    $_POST['mothers_name'],
    $userUniqueId,
    $_POST['user_name'],
    password_hash($_POST['password'], PASSWORD_BCRYPT),
    $_POST['nid_number'],
    $_POST['date_of_birth'],
    $_POST['present_address'],
    $_POST['permanent_address'],
    $_POST['emergency_contact'],
    $_POST['emergency_contact_user_name'],
    $_POST['relationship_with_emergency_contact'],
    $userPhoto,
    $userNidFrontPhoto,
    $userNidBackPhoto
);

if ($stmt->execute()) {
    $last_id = $conn->insert_id;
    echo "<div class='alert alert-success'>Record inserted successfully. <a href='index.php' class='btn btn-primary'>Go to Table</a></div>";
} else {
    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
}

$stmt->close();
$conn->close();
?>
