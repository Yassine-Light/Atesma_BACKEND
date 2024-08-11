<?php
include_once("conn.php");
?>

<head>
    <title>store - individuals</title>
</head>
    <script src="file.js"></script>
<body id="body">
    <main class="store-main">
        <h1 class="h1">Explore Our Store</h1>
        <p class="p">Discover a wide variety of products tailored to meet your needs. From software to accessories, find what suits you best!</p>
        <section class="filtering">
            <div class="filters">
                <div class="filter">
                    Category
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-caret-down" viewBox="0 0 16 16">
                        <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
                    </svg>
                    <div class="dropdown-menu" id="dropdown-category">
                        <div class="category">Microsoft</div>
                        <div class="category">AutoDesk</div>
                        <div class="category">Apple</div>
                        <div class="category">Apple</div>
                        <div class="category">Apple</div>
                        <div class="category">Apple</div>
                    </div>
                </div>
                <div class="filter">
                    Filter by
                    <svg   xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-caret-down" viewBox="0 0 16 16">
                        <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
                    </svg>
                    <div class="dropdown-menu" id="dropdown-date-price">
                        <div class="category">Most recent</div>
                        <div class="category">Most popular</div>
                    </div>
                </div>
            </div>
            <div class="search-bar">
                <input type="search" placeholder="Search" aria-label="Search">
                <div class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
            </div>
        </section>
        
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
    </main>
    