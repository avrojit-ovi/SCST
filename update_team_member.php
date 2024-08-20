<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "SCST_members";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$userUniqueId = $_POST['user_unique_id'];
$name = $_POST['name'];
$fathersName = $_POST['fathers_name'];
$mothersName = $_POST['mothers_name'];
$userName = $_POST['user_name'];
$nidNumber = $_POST['nid_number'];
$dateOfBirth = $_POST['date_of_birth'];
$presentAddress = $_POST['present_address'];
$permanentAddress = $_POST['permanent_address'];
$emergencyContact = $_POST['emergency_contact'];
$emergencyContactUserName = $_POST['emergency_contact_user_name'];
$relationshipWithEmergencyContact = $_POST['relationship_with_emergency_contact'];

// Get current photo paths from hidden fields
$userPhoto = $_POST['current_user_photo'];
$userNidFrontPhoto = $_POST['current_user_nid_front_photo'];
$userNidBackPhoto = $_POST['current_user_nid_back_photo'];

// Handle file uploads if new files are provided
if (!empty($_FILES['user_photo']['name'])) {
    $userPhoto = $_FILES['user_photo']['name'];
    move_uploaded_file($_FILES['user_photo']['tmp_name'], "uploads/" . $userPhoto);
}
if (!empty($_FILES['user_nid_front_photo']['name'])) {
    $userNidFrontPhoto = $_FILES['user_nid_front_photo']['name'];
    move_uploaded_file($_FILES['user_nid_front_photo']['tmp_name'], "uploads/" . $userNidFrontPhoto);
}
if (!empty($_FILES['user_nid_back_photo']['name'])) {
    $userNidBackPhoto = $_FILES['user_nid_back_photo']['name'];
    move_uploaded_file($_FILES['user_nid_back_photo']['tmp_name'], "uploads/" . $userNidBackPhoto);
}

$sql = "UPDATE team_members SET 
    name = ?, 
    fathers_name = ?, 
    mothers_name = ?, 
    user_name = ?, 
    nid_number = ?, 
    date_of_birth = ?, 
    present_address = ?, 
    permanent_address = ?, 
    emergency_contact = ?, 
    emergency_contact_user_name = ?, 
    relationship_with_emergency_contact = ?, 
    user_photo = ?, 
    user_nid_front_photo = ?, 
    user_nid_back_photo = ? 
    WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    'ssssssssssssss',
    $name,
    $fathersName,
    $mothersName,
    $userName,
    $nidNumber,
    $dateOfBirth,
    $presentAddress,
    $permanentAddress,
    $emergencyContact,
    $emergencyContactUserName,
    $relationshipWithEmergencyContact,
    $userPhoto,
    $userNidFrontPhoto,
    $userNidBackPhoto,
    $id
);

if ($stmt->execute()) {
    echo "<div class='alert alert-success'>Record updated successfully. <a href='index.php' class='btn btn-primary'>Go to Table</a></div>";
} else {
    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
}

$stmt->close();
$conn->close();
?>
