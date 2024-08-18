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
                <li class="menu-item active" data-tab="overview"><i class="icon-atesma fa-solid fa-chart-line"></i> Overview</li>
                <li class="menu-item" data-tab="statistics"><i class="icon-atesma fa-solid fa-chart-pie"></i> Statistics</li>
                <li class="menu-item" data-tab="clients"><i class="icon-atesma fa-solid fa-users"></i> Clients</li>
                <li class="menu-item" data-tab="certificates"><i class="icon-atesma fa-solid fa-certificate"></i> Certificates</li>
                <li class="menu-item" data-tab="certificates"><i class="icon-atesma fa-solid fa-store"></i>Store</li>
                <li class="menu-item" data-tab="exams"><i class="icon-atesma fa-solid fa-file-alt"></i> Exams</li>
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
                <h3>Overview Content</h3>
                <!-- Overview content goes here -->
            </div>
            <div id="statistics" class="dashboard-tab">
                <h3>Statistics Content</h3>
                <!-- Statistics content goes here -->
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


</html>
