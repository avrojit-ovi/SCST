<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-thumbnail {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Team Members</h2>

        <!-- Button to Open the Insert Modal -->
        <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#insertModal">
            Insert Team Member
        </button>

       <!-- The Insert Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel">Insert Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="insert_team_member.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="user_unique_id" class="form-label">User Unique ID</label>
                        <input type="text" class="form-control" id="user_unique_id" name="user_unique_id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="fathers_name" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="fathers_name" name="fathers_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="mothers_name" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="mothers_name" name="mothers_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="nid_number" class="form-label">NID Number</label>
                        <input type="text" class="form-control" id="nid_number" name="nid_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>
                    <div class="mb-3">
                        <label for="present_address" class="form-label">Present Address</label>
                        <input type="text" class="form-control" id="present_address" name="present_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="permanent_address" class="form-label">Permanent Address</label>
                        <input type="text" class="form-control" id="permanent_address" name="permanent_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="emergency_contact" class="form-label">Emergency Contact</label>
                        <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="emergency_contact_user_name" class="form-label">Emergency Contact Username</label>
                        <input type="text" class="form-control" id="emergency_contact_user_name" name="emergency_contact_user_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="relationship_with_emergency_contact" class="form-label">Relationship with Emergency Contact</label>
                        <input type="text" class="form-control" id="relationship_with_emergency_contact" name="relationship_with_emergency_contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_photo" class="form-label">User Photo</label>
                        <input type="file" class="form-control" id="user_photo" name="user_photo">
                    </div>
                    <div class="mb-3">
                        <label for="user_nid_front_photo" class="form-label">NID Front Photo</label>
                        <input type="file" class="form-control" id="user_nid_front_photo" name="user_nid_front_photo">
                    </div>
                    <div class="mb-3">
                        <label for="user_nid_back_photo" class="form-label">NID Back Photo</label>
                        <input type="file" class="form-control" id="user_nid_back_photo" name="user_nid_back_photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <!-- The Edit Modal -->
         
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="edit_user_unique_id" class="form-label">User Unique ID</label>
                        <input type="text" class="form-control" id="edit_user_unique_id" name="user_unique_id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_fathers_name" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="edit_fathers_name" name="fathers_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_mothers_name" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="edit_mothers_name" name="mothers_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_user_name" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="edit_user_name" name="user_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nid_number" class="form-label">NID Number</label>
                        <input type="text" class="form-control" id="edit_nid_number" name="nid_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="edit_date_of_birth" name="date_of_birth" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_present_address" class="form-label">Present Address</label>
                        <input type="text" class="form-control" id="edit_present_address" name="present_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_permanent_address" class="form-label">Permanent Address</label>
                        <input type="text" class="form-control" id="edit_permanent_address" name="permanent_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_emergency_contact" class="form-label">Emergency Contact</label>
                        <input type="text" class="form-control" id="edit_emergency_contact" name="emergency_contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_emergency_contact_user_name" class="form-label">Emergency Contact User Name</label>
                        <input type="text" class="form-control" id="edit_emergency_contact_user_name" name="emergency_contact_user_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_relationship_with_emergency_contact" class="form-label">Relationship with Emergency Contact</label>
                        <input type="text" class="form-control" id="edit_relationship_with_emergency_contact" name="relationship_with_emergency_contact" required>
                    </div>
                    <!-- Hidden fields for current photos -->
                    <input type="hidden" id="current_user_photo" name="current_user_photo">
                    <input type="hidden" id="current_user_nid_front_photo" name="current_user_nid_front_photo">
                    <input type="hidden" id="current_user_nid_back_photo" name="current_user_nid_back_photo">
                    <input type="hidden" id="edit_id" name="id">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- Table displaying team members -->
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Username</th>
                    <th>NID Number</th>
                    <th>Date of Birth</th>
                    <th>Present Address</th>
                    <th>Permanent Address</th>
                    <th>Emergency Contact</th>
                    <th>Emergency Contact Username</th>
                    <th>Relationship with Emergency Contact</th>
                    <th>User Photo</th>
                    <th>NID Front Photo</th>
                    <th>NID Back Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data and display
                $conn = new mysqli('localhost', 'root', '', 'SCST_members');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM team_members";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['fathers_name']}</td>
                            <td>{$row['mothers_name']}</td>
                            <td>{$row['user_name']}</td>
                            <td>{$row['nid_number']}</td>
                            <td>{$row['date_of_birth']}</td>
                            <td>{$row['present_address']}</td>
                            <td>{$row['permanent_address']}</td>
                            <td>{$row['emergency_contact']}</td>
                            <td>{$row['emergency_contact_user_name']}</td>
                            <td>{$row['relationship_with_emergency_contact']}</td>
                            <td><img src='uploads/{$row['user_photo']}' class='img-thumbnail' alt='User Photo'></td>
                            <td><img src='uploads/{$row['user_nid_front_photo']}' class='img-thumbnail' alt='NID Front Photo'></td>
                            <td><img src='uploads/{$row['user_nid_back_photo']}' class='img-thumbnail' alt='NID Back Photo'></td>
                            <td>
                                <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' 
                                    data-id='{$row['id']}' 
                                    data-user_unique_id='{$row['user_unique_id']}' 
                                    data-name='{$row['name']}' 
                                    data-fathers_name='{$row['fathers_name']}' 
                                    data-mothers_name='{$row['mothers_name']}' 
                                    data-user_name='{$row['user_name']}' 
                                    data-nid_number='{$row['nid_number']}' 
                                    data-date_of_birth='{$row['date_of_birth']}' 
                                    data-present_address='{$row['present_address']}' 
                                    data-permanent_address='{$row['permanent_address']}' 
                                    data-emergency_contact='{$row['emergency_contact']}' 
                                    data-emergency_contact_user_name='{$row['emergency_contact_user_name']}' 
                                    data-relationship_with_emergency_contact='{$row['relationship_with_emergency_contact']}' 
                                    data-user_photo='{$row['user_photo']}' 
                                    data-user_nid_front_photo='{$row['user_nid_front_photo']}' 
                                    data-user_nid_back_photo='{$row['user_nid_back_photo']}'>
                                    Edit
                                </button>
                                <a href='delete_team_member.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='16'>No team members found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>


        document.addEventListener('DOMContentLoaded', function () {

             // Function to generate a unique user ID
        function generateUniqueId() {
            const prefix = 'SCST';
            const randomNumber = Math.floor(Math.random() * 9000) + 1000; // Generate a number between 1000 and 9999
            return `${prefix}${randomNumber}`;
        }

        // Set the unique ID when the insert modal is shown
        var insertModal = document.getElementById('insertModal');
        insertModal.addEventListener('show.bs.modal', function () {
            var uniqueIdField = document.getElementById('user_unique_id');
            uniqueIdField.value = generateUniqueId();
        });

            var editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Button that triggered the modal

                // Extract data attributes from button
                var id = button.getAttribute('data-id');
                var userUniqueId = button.getAttribute('data-user_unique_id');
                var name = button.getAttribute('data-name');
                var fathersName = button.getAttribute('data-fathers_name');
                var mothersName = button.getAttribute('data-mothers_name');
                var userName = button.getAttribute('data-user_name');
                var nidNumber = button.getAttribute('data-nid_number');
                var dateOfBirth = button.getAttribute('data-date_of_birth');
                var presentAddress = button.getAttribute('data-present_address');
                var permanentAddress = button.getAttribute('data-permanent_address');
                var emergencyContact = button.getAttribute('data-emergency_contact');
                var emergencyContactUserName = button.getAttribute('data-emergency_contact_user_name');
                var relationshipWithEmergencyContact = button.getAttribute('data-relationship_with_emergency_contact');
                var userPhoto = button.getAttribute('data-user_photo');
                var userNidFrontPhoto = button.getAttribute('data-user_nid_front_photo');
                var userNidBackPhoto = button.getAttribute('data-user_nid_back_photo');

                // Set values to form fields
                var editForm = document.getElementById('editForm');
                editForm.querySelector('#edit_id').value = id;
                editForm.querySelector('#edit_user_unique_id').value = userUniqueId;
                editForm.querySelector('#edit_name').value = name;
                editForm.querySelector('#edit_fathers_name').value = fathersName;
                editForm.querySelector('#edit_mothers_name').value = mothersName;
                editForm.querySelector('#edit_user_name').value = userName;
                editForm.querySelector('#edit_nid_number').value = nidNumber;
                editForm.querySelector('#edit_date_of_birth').value = dateOfBirth;
                editForm.querySelector('#edit_present_address').value = presentAddress;
                editForm.querySelector('#edit_permanent_address').value = permanentAddress;
                editForm.querySelector('#edit_emergency_contact').value = emergencyContact;
                editForm.querySelector('#edit_emergency_contact_user_name').value = emergencyContactUserName;
                editForm.querySelector('#edit_relationship_with_emergency_contact').value = relationshipWithEmergencyContact;
                editForm.querySelector('#edit_user_photo').value = userPhoto;
                editForm.querySelector('#edit_user_nid_front_photo').value = userNidFrontPhoto;
                editForm.querySelector('#edit_user_nid_back_photo').value = userNidBackPhoto;
            });
        });
    </script>
</body>
</html>
