<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <title>Sidebar Layout</title>
    <script src="https://kit.fontawesome.com/b3c69fab50.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admindashboard.css">
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
<!--        <li class="menu-item" data-tab="clients"><i class="icon-atesma fa-solid fa-users"></i> Clients</li>
                <li class="menu-item" data-tab="certificates"><i class="icon-atesma fa-solid fa-certificate"></i> Certificates</li>
                <li class="menu-item" data-tab="certificates"><i class="icon-atesma fa-solid fa-store"></i>Store</li>
                <li class="menu-item" data-tab="exams"><i class="icon-atesma fa-solid fa-file-alt"></i> Exams</li>-->
                
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
            <!-- Available Certificates Section -->
            <div class="available-certif">
                <h2>Available Certif:</h2>
                <div class="certif-list">
                    <div class="certif-item">
                         <img src="" alt="">
                          <div class="overlay">
                            <button>Modify</button> 
                            <button>Delete</button>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Add Certificate Section -->
            <div class="add-cert-section">
                <h2>Add Certif</h2>
                <div class="add-cert-form">
                    <input type="text" placeholder="Certificate Name">
                    <button class="add-btn" id="add-btn">Add</button>
                </div>
            </div>
        </div>






    <div class="container" id="add-btn-form">
        <div class="form-section">
        <div class="cert-pic-section">
            <input type="file" name="" style="display:grid; place-items:center;" class="cert-pic-placeholder" id="">
        </div>

            <div class="form-group">
                <label for="cert-name">Certif Name</label>
                <input type="text" id="cert-name" placeholder="Enter certificate name">
            </div>

            <div class="form-group">
                <label for="cert-provider">Certif Provider</label>
                <input type="text" id="cert-provider" placeholder="Enter certificate provider">
            </div>

            <div class="form-group">
                <label for="cert-difficulty">Certif Difficulty</label>
                <select name="" id="">
                    <option value="Beginner">Beginner</option>
                    <option value="Beginner">Intermediate</option>
                    <option value="Beginner">Advanced</option>
                </select>
            </div>

            <div class="modules-section">
            <label for="modules">Modules</label>
                <div style="display:flex; justify-content:flex-start; align-items:center;">
               
                 <input placeholder="Enter module name" type="text" name="" id=""> <button class="add-module-btn">Add</button>
                 </div>

                <ul class="modules-list">
                    <li>Module 1</li>
                    <li>Module 2</li>
                </ul>
            </div>

            <div class="resources">
                <label for="resources">Resources</label>
                <input type="text" id="resources" placeholder="Enter resources">
            </div>
            <button class="add-cert-btn">Add Certif</button>

        </div>
       
       
    </div>


<script>

document.getElementById("add-btn").addEventListener("click", function() {
            document.getElementById("certifs").style.display = "none";
            document.getElementById("add-btn-form").style.display = "block";
        });
</script>

            </div>
            <div  id="statistics" class="dashboard-tab">












<h2>Active User Requests</h2>
                <table>
        <thead>
            <tr>
                <th style="background-color:#0e76a8; color:white;">ID</th>
                <th style="background-color:#0e76a8; color:white;">certificate</th>
                <th style="background-color:#0e76a8; color:white;">Name</th>
                <th style="background-color:#0e76a8; color:white;">Phone Number</th>
                <th style="background-color:#0e76a8; color:white;">Email</th>
                <th style="background-color:#0e76a8; color:white;">Certiport Username</th>
                <th style="background-color:#0e76a8; color:white;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID</td>
                <td>Microsoft</td>
                <td>CertifName</td>
                <td>(123) 456-7890</td>
                <td>john.doe@example.com</td>
                <td>jdoe_cert123</td>
                <td class="actions">
                    <button class="done-btn">Mark as Done</button>
                    <button class="delete-btn">Delete</button>
                </td>
            </tr>
            <tr>
                <td>ID</td>
                <td>Microsoft</td>
                <td>CertifName</td>
                <td>(123) 456-7890</td>
                <td>john.doe@example.com</td>
                <td>jdoe_cert123</td>
                <td class="actions">
                    <button class="done-btn">Mark as Done</button>
                    <button class="delete-btn">Delete</button>
                </td>
            </tr>
            <tr>
                <td>ID</td>
                <td>Microsoft</td>
                <td>CertifName</td>
                <td>(123) 456-7890</td>
                <td>john.doe@example.com</td>
                <td>jdoe_cert123</td>
                <td class="actions">
                    <button class="done-btn">Mark as Done</button>
                    <button class="delete-btn">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
                




    <h2>Deleted or Completed Requests</h2>

    <table>
        <thead>
        <tr>
                <th style="background-color:#333; color:white;">ID</th>
                <th style="background-color:#333; color:white;">certificate</th>
                <th style="background-color:#333; color:white;">Name</th>
                <th style="background-color:#333; color:white;">Phone Number</th>
                <th style="background-color:#333; color:white;">Email</th>
                <th style="background-color:#333; color:white;">Certiport Username</th>
                <th style="background-color:#333; color:white;">Actions</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td>ID</td>
                <td>Microsoft</td>
                <td>CertifName</td>
                <td>(123) 456-7890</td>
                <td>john.doe@example.com</td>
                <td>jdoe_cert123</td>
                <td class="actions">
                    <button>Mark as active</button>
                </td>
            </tr>
            <tr>
                <td>ID</td>
                <td>Microsoft</td>
                <td>CertifName</td>
                <td>(123) 456-7890</td>
                <td>john.doe@example.com</td>
                <td>jdoe_cert123</td>
                <td class="actions">
                    <button>Mark as active</button>
                </td>
            </tr>
        </tbody>
    </table>

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
        }
    </style>













            </div>
            <div id="clients" class="dashboard-tab">
                <h3>Clients Content</h3>
                <!-- Clients content goes here -->
            </div>
            <div id="certificates" class="dashboard-tab">
                <h3>Certificates Content</h3>
                <!-- Certificates content goes here -->
            </div>
            <div id="exams" class="dashboard-tab">
                <h3>Exams Content</h3>
                <!-- Exams content goes here -->
            </div>
            <div id="personal-overview" class="dashboard-tab">
                <h3>Personal Overview Content</h3>
                <!-- Personal Overview content goes here -->
            </div>
            <div id="personal-exams" class="dashboard-tab">
                <h3>Personal Exams Content</h3>
                <!-- Personal Exams content goes here -->
            </div>
            <div id="personal-certificates" class="dashboard-tab">
                <h3>Personal Certificates Content</h3>
                <!-- Personal Certificates content goes here -->
            </div>
            <div id="pathways" class="dashboard-tab">
                <h3>Pathways Content</h3>
                <!-- Pathways content goes here -->
            </div>
        </main>
    </div>
</body>

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
    footer,header{
        display: none;
    }
</style>

</html>
