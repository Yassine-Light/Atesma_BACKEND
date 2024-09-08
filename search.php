<?php
include_once("conn.php");
session_start();
$page = $_SESSION['page'] ?? 'default';
if ($page === 'store') {
    $Bname = "buy-cf";
    $sentence = "Buy Now";
    $action = "";
    $tag="div";
} else  {
    $Bname = "cer-DT";
    $sentence = "Check details";
    $action = "certificate details.php";
    $tag="form";
}

if (isset($_POST['category'])) {
    $category = $_POST['category'];
    $sql = "SELECT * FROM certificates WHERE Category = '{$category}'";
} elseif (isset($_POST["input"])) {
    $input = $_POST["input"];
    $sql = "SELECT * FROM certificates WHERE Name LIKE '{$input}%' OR Category LIKE '{$input}%'";
} else {
    $sql = 'SELECT * FROM certificates ORDER BY Category';
}

$result = mysqli_query($conn, $sql);
$certificates = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (mysqli_num_rows($result) > 0) { ?>
    <section class="products">
        <?php foreach($certificates as $index => $certificate): ?>
        <div class="product">
            <div class="img-container">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($certificate['Picture']); ?>" alt="" class="category-image"></div>
            <div class="product-title"><?php echo htmlspecialchars($certificate['Name']); ?></div>
            <p class="product-description"><?php echo htmlspecialchars($certificate['Category']) ?></p>
            <p class="price"><?php echo htmlspecialchars($certificate['Price']." DH") ?></p>
            <<?php echo htmlspecialchars($tag)?>  action="<?php echo htmlspecialchars($action) ?>" method="post">
                <input type="hidden" name="index" value="<?php echo htmlspecialchars($index); ?>">
                <input type="hidden" class="certificate-id" value="<?php echo htmlspecialchars($certificate['ID']); ?>">
                <button  class="buy-now" onclick=openPurchase() name="<?php echo htmlspecialchars($Bname); ?>"><?php echo htmlspecialchars($sentence); ?></button>
            </<?php echo htmlspecialchars($tag)?> >
        </div>
        <?php endforeach ?>
    </section>
<?php
} else {
    echo "No data found";
}

mysqli_free_result($result);
mysqli_close($conn);
?>