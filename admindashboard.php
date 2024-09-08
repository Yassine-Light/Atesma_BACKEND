<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('conn.php');
$sql_1 = 'SELECT * FROM certificates ORDER BY Category';
$sql_2 = 'SELECT * FROM users';
$result_1 = mysqli_query($conn, $sql_1);
$result_2 = mysqli_query($conn, $sql_2);
$certificates = mysqli_fetch_all($result_1, MYSQLI_ASSOC);
$users = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
mysqli_free_result($result_1);
mysqli_free_result($result_2);
$sql_3 = "SELECT o.order_UID, u.Name AS user_name, u.email, u.phone, u.certiport_name, 
c.Name AS certificate_name, c.Category, c.Price, o.order_id, o.status
FROM orders o
JOIN users u ON o.user_id = u.ID
JOIN certificates c ON o.certificate_id = c.ID";

        
$result_3 = mysqli_query($conn, $sql_3);
$orders = mysqli_fetch_all($result_3, MYSQLI_ASSOC);
mysqli_free_result($result_3);

if (isset($_POST['add'])) {
    $cert_name = mysqli_real_escape_string($conn, $_POST['cert-name']);
    $cert_pic = isset($_FILES['cert-pic']['tmp_name']) ? addslashes(file_get_contents($_FILES['cert-pic']['tmp_name'])) : '';
    $cert_provider = mysqli_real_escape_string($conn, $_POST['cert-provider']);
    $cert_lvl = mysqli_real_escape_string($conn, $_POST['diff-lvl']);
    $cert_price = mysqli_real_escape_string($conn, $_POST['cert-price']);
    $cert_ressources = mysqli_real_escape_string($conn, $_POST['cert-ressource']);

    if (!empty($cert_name) && !empty($cert_pic) && !empty($cert_provider) && !empty($cert_lvl) && !empty($cert_price) && !empty($cert_ressources)) {
        $sql = "INSERT INTO certificates (Name, Category, Description, Resource, Price, Picture) 
                VALUES ('$cert_name', '$cert_provider', '$cert_lvl', '$cert_ressources', $cert_price, '$cert_pic')";}

    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body class="dashboard-body">
    <aside class="sidebar-atesma">
        <div class="logo-container">
            <div class="dashboard-title">Admin Dashboard</div>
        </div>
        <nav class="menu-section-atesma">
            <h2 class="menu-title">Administrative</h2>
            <ul class="menu-list">
                <li class="menu-item active" data-tab="overview"><i class="icon-atesma fa-solid fa-certificate"></i> certificates</li>
                <li class="menu-item" data-tab="statistics"><i class="icon-atesma fa-solid fa-chart-pie"></i> Requests</li>
            </ul>
            <h2 class="menu-title">Personal</h2>
            <ul class="menu-list">
                <li class="menu-item" data-tab="personal-overview"><i class="icon-atesma fa-solid fa-comment"></i> Messages</li>
                <li class="menu-item" data-tab="personal-exams"><i class="icon-atesma fa-solid fa-user"></i>Workers</li>
                <li class="menu-item" data-tab="pathways"><i class="icon-atesma fa-solid fa-road"></i> Pathways</li>
            </ul>
        </nav>
    </aside>
    <div class="main-content-atesma">
        <header class="header-atesma">
            <div class="header-actions">
                <i class="fa-regular fa-bell"></i>
                <i class="fa-solid fa-message"></i>
                <div class="profile-atesma" onclick="toggleUserInfoCard()">
                    <img src="/photos/Logo-ATESMA.png" alt="User Profile">
                    <div class="user-info-card" id="user-info-card">
                        <div class="user-info">
                            <img src="/photos/Logo-ATESMA.png" alt="User Profile" class="user-info-img">
                            <h3 class="user-name">User Full Name</h3>
                            <p class="user-position">Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="dashboard-main-content">
            <div id="overview" class="dashboard-tab active">
                <div class="main-content" id="certifs">
                    <div class="available-certif">
                        <h2>Available Certif:</h2>
                        <div class="certif-list">
                            <?php foreach($certificates as $certificate): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($certificate['Picture']); ?>" alt="" class="certif-list">
                                <div class="certif-list"><?php echo htmlspecialchars($certificate['Name']); ?></div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="add-cert-section">
                        <h2>Add Certif</h2>
                        <div class="add-cert-form">
                            <button class="add-btn" id="add-btn">Add</button>
                        </div>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="container" id="add-btn-form">
                        <div class="form-section">
                            <div class="cert-pic-section">
                                <input type="file" name="cert-pic" style="display:grid; place-items:center;" class="cert-pic-placeholder" id="" required>
                            </div>

                            <div class="form-group">
                                <label for="cert-name">Certif Name</label>
                                <input type="text" id="cert-name" name="cert-name" placeholder="Enter certificate name" required>
                            </div>

                            <div class="form-group">
                                <label for="cert-provider">Certif Provider</label>
                                <input type="text" id="cert-provider" name="cert-provider" placeholder="Enter certificate provider" required>
                            </div>

                            <div class="form-group">
                                <label for="cert-difficulty">Certif Difficulty</label>
                                <select name="diff-lvl" id="">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Advanced">Advanced</option>
                                </select>
                            </div>

                            <div class="resources">
                                <label for="resources">Resources</label>
                                <input type="text" id="resources" name="cert-ressource" placeholder="Enter resources" required>
                            </div>

                            <div class="resources">
                                <label for="cert-price">Price</label>
                                <input type="text" name="cert-price" placeholder="Price" required>
                            </div>

                            <button class="add-cert-btn" name="add">Add Certif</button>
                        </div>
                    </div>
                </form>

                <script>
                    document.getElementById("add-btn").addEventListener("click", function() {
                        document.getElementById("certifs").style.display = "none";
                        document.getElementById("add-btn-form").style.display = "block";
                    });
                </script>
            </div>

            <h2>Active User Requests</h2>
                <table>
        <thead>
            <tr>
                <th style="background-color:#0e76a8; color:white;">ID</th>
                <th style="background-color:#0e76a8; color:white;">certificate</th>
                <th style="background-color:#0e76a8; color:white;">Category</th>
                <th style="background-color:#0e76a8; color:white;">Name</th>
                <th style="background-color:#0e76a8; color:white;">Phone Number</th>
                <th style="background-color:#0e76a8; color:white;">Email</th>
                <th style="background-color:#0e76a8; color:white;">Certiport Username</th>
                <th style="background-color:#0e76a8; color:white;">Price</th>
                <th style="background-color:#0e76a8; color:white;">Actions</th>
            </tr>
        </thead>
        <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['order_UID']); ?></td>
                                <td><?php echo htmlspecialchars($order['certificate_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['Category']); ?></td>
                                <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['phone']); ?></td>
                                <td><?php echo htmlspecialchars($order['email']); ?></td>
                                <td><?php echo htmlspecialchars($order['certiport_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['Price']); ?></td>
                                <td class="actions">
                                <button class="done-btn" data-order-id="<?php echo $order['order_id']; ?>">Done</button>
                                <button class="delete-btn" data-order-id="<?php echo $order['order_id']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
    </table>
                



   
            </div>
        </main>
    </div>
</body>
<style>

table {
            width: 99%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 16px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .actions button {
            padding: 8px 12px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }
        .done-btn {
            background-color: #2ecc71;
            color: white;
        }
        .actions button:hover {
            opacity: 0.8;
        }
        
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll('.menu-item');
        const tabs = document.querySelectorAll('.dashboard-tab');

        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                tabs.forEach(tab => tab.classList.remove('active'));
                const selectedTab = this.getAttribute('data-tab');
                document.getElementById(selectedTab).classList.add('active');
            });
        });
    });

    function toggleUserInfoCard() {
        const userInfoCard = document.getElementById('user-info-card');
        userInfoCard.style.display = userInfoCard.style.display === 'block' ? 'none' : 'block';
    }

    document.addEventListener('click', function(event) {
        const userInfoCard = document.getElementById('user-info-card');
        const profile = document.querySelector('.profile-atesma');
        if (!profile.contains(event.target)) {
            userInfoCard.style.display = 'none';
        }
    });
</script>

<style>
    footer, header {
        display: none;
    }
</style>
<script>
$(document).ready(function() {
    $('.done-btn, .delete-btn').click(function() {
        var orderId = $(this).data('order-id');  // Get the order ID
        var action = $(this).hasClass('done-btn') ? 'done' : 'delete';  // Determine action based on button type
        var row = $(this).closest('tr'); // Get the current row

        // Debugging: Log the orderId and action
        console.log("Order ID:", orderId);
        console.log("Action:", action);

        $.ajax({
            url: 'update_status.php',  // PHP script to handle the status update
            type: 'POST',
            data: { order_id: orderId, action: action },  // Send the order_id and action to the PHP script
            success: function(response) {
                console.log("AJAX response:", response);  // Log the response
                if (response == 'success') {
                    row.fadeOut(500, function() {
                        $(this).remove();  // Remove the row after the fade-out animation
                    });
                } else {
                    console.log("Failed to update: " + response);
                }
            },
            error: function() {
                console.log("Error sending AJAX request.");
            }
        });
    });
});

</script>


</html>
