<?php
include_once("conn.php");
include_once("templates/header.php");
$selectedCertificate = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = intval($_POST['index']);
    if (isset($certificates[$index])) {
        $selectedCertificate = $certificates[$index];
    }
}
if (isset($_POST['BUT'])) {
    $page='store';
    header("Location:index.php?page=$page");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Certificate Name</title>
</head>
<script src="file.js"></script>
<body>
    <main>
        <div class="text">
            <h1><?php echo htmlspecialchars($selectedCertificate['Name']); ?></h1>
            <p>Provider: <?php echo htmlspecialchars($selectedCertificate['Category']); ?></p>
            <p>Difficulty level: Intermediate</p>
        </div>
        <div class="tabs">
            <div class="tab active" data-content="overview1">Overview</div>
            <div class="tab" data-content="overview2">Modules</div>
            <div class="tab" data-content="overview3">Resources</div>
        </div>
        <div class="tabs-content" id="overview1">
            <?php echo htmlspecialchars($selectedCertificate['Description']); ?>
        </div>
        <div class="tabs-content" id="overview2" style="display: none;">
        <?php echo htmlspecialchars($selectedCertificate['Modules']); ?>
        </div>
        <div class="tabs-content" id="overview3" style="display: none;">
        <?php echo htmlspecialchars($selectedCertificate['Resources']); ?>
        </div>
        <div class="tabs-content" id="overview4" style="display: none;">
        </div>
    </main>
</body>
</html>
<script>
    document.querySelectorAll('.tab').forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove 'active' class from all tabs
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));

            // Hide all content sections
            document.querySelectorAll('.tabs-content').forEach(content => content.style.display = 'none');

            // Show the selected content
            const contentId = this.getAttribute('data-content');
            document.getElementById(contentId).style.display = 'block';

            // Set active class on clicked tab
            this.classList.add('active');
        });
    });
</script>
<?php include_once("templates/footer.php") ?>

