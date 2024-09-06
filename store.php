<?php
$_SESSION['page'] = 'store'; 
include_once("conn.php");
$sql='SELECT * FROM certificates ORDER BY Category';
$result=mysqli_query($conn,$sql);
$certificates=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>

<head>
    <title>store - individuals</title>
</head>
    <script src="file.js"></script>
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
                    <?php $displayed_categories =array();
                          $i=0;
                    foreach($certificates as $certificate){
                        if(!in_array($certificate['Category'], $displayed_categories)){
                            $displayed_categories[] = $certificate['Category'];
                            
                        }
                        }
                        
                    foreach($displayed_categories as $displayed_categorie):
                        $i=$i+1;
                    ?>
                        <div class="category"data-value="<?php echo htmlspecialchars($displayed_categorie); ?>"><?php echo htmlspecialchars($i ." - ". $displayed_categorie);?></div>
                    <?php endforeach  ?>    
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
        <div id="searchresult">     
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">
$(document).ready(function(){

    function loadAllProducts() {
        $.ajax({
            url: "search.php",
            method: "POST",
            data: { input: '',
                page:"store"
             }, 
            success: function(data){
                $("#searchresult").html(data);
                $("#searchresult").css("display", "block");
            }
        });
    }

    loadAllProducts();

    $("#search").keyup(function(){
        var input = $(this).val();
        if(input != ""){
            $.ajax({
                url: "search.php",
                method: "POST",
                data: { input: input },
                success: function(data){
                    $("#searchresult").html(data);
                    $("#searchresult").css("display", "block");
                } 
            });
        } else {
            loadAllProducts();
        }
    });
});


</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdownItems = document.querySelectorAll('.dropdown-menu .category');
    const searchInput = document.getElementById('search');
    const searchResult = document.getElementById('searchresult');

    function fetchItems(data) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'search.php', true); 
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                searchResult.innerHTML = xhr.responseText;
                searchResult.style.display = 'block'; 
            }
        };
        
        xhr.send(data);
    }

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const selectedValue = this.getAttribute('data-value');
            console.log('Selected category:', selectedValue); // Debugging line

            // Clear the previous content and search input
            searchResult.innerHTML = '';
            searchInput.value = '';

            // Send AJAX request to fetch items based on the selected category
            fetchItems('category=' + encodeURIComponent(selectedValue));
        });
    });

    searchInput.addEventListener('keyup', function() {
        const inputValue = this.value;
        if (inputValue !== "") {
            // Send AJAX request to fetch items based on the search input
            fetchItems('input=' + encodeURIComponent(inputValue));
        } else {
            // Clear the search results if the input is empty
            searchResult.innerHTML = '';
        }
    });

    // Load all products initially if needed
    function loadAllProducts() {
        fetchItems('input=');
    }

    loadAllProducts(); // Initial load
});


</script>

<section class="purchase-section" id="purchase-section">
        <div class="purchase-overlay" onclick=hidePurchase()></div>
    <form class="purchase-form" id="purchase-form">
        <h1>Purchase Request</h1>
        <h3>Please fill in the information below, and we will contact you as soon as possible</h3>
      
        <label for="full-name">Full Name</label>
        <input type="text" id="full-name" name="full-name" required>
      
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" required>
      
        <label for="certiport-username">Certiport Username</label>
        <input type="text" id="certiport-username" name="certiport-username" required>
      
        <button type="submit" onclick=purchaseDone()>Submit</button>
        
        <p class="help-text">Need help? <a href="#">Contact us</a></p>
      </form>


      
    </section>
    
      
      
    <div id="success-popup" class="popup">
        <div class="popup-content" id="popup-content">
          <span class="close-btn" id="close-popup">&times;</span>
          <p>Information has been sent successfully! We will contact you as soon as possible to complete the purchase process. Thank you!</p>
        </div>
    </div>

    <script>
        
    function openPurchase(){
        document.getElementById("purchase-section").style.display = "flex"
    }
    function hidePurchase(){
        document.getElementById("purchase-section").style.display = "none"
    }
    function purchaseDone(){
        localStorage.setItem("purchase", "done")
        document.getElementById("purchase-form").style.display = "none"
        console.log("working 2")

    }
    
    if (localStorage.getItem("purchase") == "done"){
        document.getElementById("success-popup").style.display = "flex"
    }








    function showPopup() {
  document.getElementById('success-popup').style.display = 'block';
}

// Function to hide the popup
document.getElementById('close-popup').onclick = function() {
  document.getElementById('success-popup').style.display = 'none';
  localStorage.removeItem("purchase")
  console.log(localStorage.getItem("purchase"))

}

// Optional: Automatically close the popup after a few seconds



    </script>
    </main>
    