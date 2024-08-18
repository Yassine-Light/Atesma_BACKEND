<?php
include_once("conn.php");

if(isset($_POST["input"])){
    $input = $_POST["input"];
    $sql = "SELECT * FROM certificates WHERE Name LIKE '{$input}%' OR Category LIKE '{$input}%'";
    $result = mysqli_query($conn, $sql);
    $certificates = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(mysqli_num_rows($result) > 0){
        ?>
        <section class="products">
            <?php foreach($certificates as $certificate): ?>
            <div class="product">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($certificate['Picture']); ?>" alt="" class="category-image">
                <div class="product-title"><?php echo htmlspecialchars($certificate['Name']);?></div>
                <p class="product-description"><?php echo htmlspecialchars($certificate['Category']) ?></p>
                <p class="price"><?php echo htmlspecialchars($certificate['Price']." DH") ?></p>
                <form method="POST">
                <button class="buy-now">Buy Now</button>
                </form>
            </div>
            <?php endforeach ?>
        </section>
        <?php        
    } else {
        echo "No data found";
    }
} else {
    $sql = 'SELECT * FROM certificates ORDER BY Category';
    $result = mysqli_query($conn, $sql);
    $certificates = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>
    <section class="products">
        <?php foreach($certificates as $certificate): ?>
        <div class="product">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($certificate['Picture']); ?>" alt="" class="category-image">
            <div class="product-title"><?php echo htmlspecialchars($certificate['Name']);?></div>
            <p class="product-description"><?php echo htmlspecialchars($certificate['Category']) ?></p>
            <p class="price"><?php echo htmlspecialchars($certificate['Price']." DH") ?></p>
            <form method="POST">
            <button class="buy-now">Buy Now</button>
            </form>
        </div>
        <?php endforeach ?>
    </section>
    <?php            
}
mysqli_free_result($result);
mysqli_close($conn);
?>
