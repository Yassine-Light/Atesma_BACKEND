<?php
$_SESSION['page'] = 'store'; 
include_once("conn.php");
$sql='SELECT * FROM certificates ORDER BY Category';
$result=mysqli_query($conn,$sql);
$certificates=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store - Individuals</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body id="body">

    <main class="store-main">
        <h1 class="h1">Explore Our Store</h1>
        <p class="p">Discover a wide variety of products tailored to meet your needs. From software to accessories, find what suits you best!</p>

        <section class="filtering-c">
            <div class="filters-c">
                <div class="filter-c">
                    Category
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-caret-down" viewBox="0 0 16 16">
                        <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
                    </svg>
                    <div class="dropdown-menu" id="dropdown-category">
                        <?php
                        $i = 0;
                        $displayed_categories = array();
                        foreach($certificates as $certificate) {
                            if (!in_array($certificate['Category'], $displayed_categories)) {
                                $displayed_categories[] = $certificate['Category'];
                            }
                        }
                        foreach($displayed_categories as $displayed_categorie):
                            $i++;
                        ?>
                            <div class="category" data-value="<?php echo htmlspecialchars($displayed_categorie); ?>"><?php echo htmlspecialchars($i ." - ". $displayed_categorie);?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search" aria-label="Search">
                <div class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
            </div>
        </section>
        <div id="searchresult"></div>
    </main>

    <section class="purchase-section" id="purchase-section">
        <form class="purchase-form" id="purchase-form">
            <h1>Purchase Request</h1>
            <h3>Please fill in the information below, and we will contact you as soon as possible</h3>

            <label for="full-name">Full Name</label>
            <input type="text" id="full-name" name="s_name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="s_email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="s_phone" required>

            <label for="certiport-username">Certiport Username</label>
            <input type="text" id="certiport-username" name="s_certiport-username" required>

            <button type="submit" id="submit-btn">Submit</button>
        </form>
    </section>

    <div id="success-popup" class="popup">
        <div class="popup-content" id="popup-content">
            <span class="close-btn" id="close-popup">&times;</span>
            <p>Information has been sent successfully! We will contact you as soon as possible to complete the purchase process. Thank you!</p>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // AJAX form submission
        $('#purchase-form').on('submit', function(event) {
            event.preventDefault();
            var formData = {
                s_name: $('#full-name').val(),
                s_email: $('#email').val(),
                s_phone: $('#phone').val(),
                s_certiport_username: $('#certiport-username').val()
            };
            $.ajax({
                url: 'process_purchase.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Let the existing JavaScript handle the popup behavior
                    localStorage.setItem("purchase", "done");
                    document.getElementById("purchase-form").style.display = "none";
                    window.location.href = "index.php?page=store";
                },
                error: function() {
                    alert('There was an error processing the form.');
                }
            });
        });

        // Search and Dropdown Logic
        function loadAllProducts() {
            $.ajax({
                url: "search.php",
                method: "POST",
                data: { input: '', page: "store" },
                success: function(data) {
                    $("#searchresult").html(data);
                    $("#searchresult").css("display", "block");
                }
            });
        }
        loadAllProducts();

        $("#search").keyup(function() {
            var input = $(this).val();
            if (input != "") {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: { input: input },
                    success: function(data) {
                        $("#searchresult").html(data);
                        $("#searchresult").css("display", "block");
                    }
                });
            } else {
                loadAllProducts();
            }
        });

        // Category dropdown functionality
        const dropdownItems = document.querySelectorAll('.dropdown-menu .category');
        const searchInput = document.getElementById('search');
        const searchResult = document.getElementById('searchresult');

        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                searchResult.innerHTML = '';
                searchInput.value = '';

                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: { category: selectedValue },
                    success: function(data) {
                        $("#searchresult").html(data);
                        $("#searchresult").css("display", "block");
                    }
                });
            });
        });
    });

    // Retain the existing popup and removal logic unchanged
    function openPurchase() {
        document.getElementById("purchase-section").style.display = "flex"
    }

    function hidePurchase() {
        document.getElementById("purchase-section").style.display = "none"
    }

    if (localStorage.getItem("purchase") == "done") {
        document.getElementById("success-popup").style.display = "flex"
        console.log("working")
    }

    document.getElementById('close-popup').onclick = function() {
        document.getElementById('success-popup').style.display = 'none';
        localStorage.removeItem("purchase");
        console.log(localStorage.getItem("purchase"));
    }
    </script>

</body>
</html>
