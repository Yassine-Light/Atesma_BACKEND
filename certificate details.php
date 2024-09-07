<?php
include_once("conn.php");
include_once("templates/header.php");


$index = isset($_POST['index']) ? intval($_POST['index']) : null;

$sql = 'SELECT * FROM certificates ORDER BY Category';
$result = mysqli_query($conn, $sql);
$certificates = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);


$selectedCertificate = null;
if ($index !== null) {
    if (isset($certificates[$index])) {
        $selectedCertificate = $certificates[$index];
    } }
?>

<?php
// Redirect to another page
if (isset($selectedCertificate)):
    header("Location: https://certiport.pearsonvue.com/Certifications/{$selectedCertificate['Category']}/");
    exit();
endif;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Certificate Details</title>
</head>
<body>
    <main class="certificate-main">
        <?php if (isset($selectedCertificate)): ?>
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
        <?php else: ?>
            <p>Certificate not found.</p>
        <?php endif; ?>
    </main>
    <script>
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tabs-content').forEach(content => content.style.display = 'none');
                const contentId = this.getAttribute('data-content');
                document.getElementById(contentId).style.display = 'block';
                this.classList.add('active');
            });
        });
    </script>
    <?php include_once("templates/footer.php") ?>
</body>
</html>
