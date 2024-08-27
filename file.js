
function showNav(){
    if(document.getElementById("nav-bar").style.display == "flex"){
         document.getElementById("nav-bar").style.display = "none"
         document.getElementById("nav-opener").style.rotate = "0deg"
    }
    else{
        document.getElementById("nav-bar").style.display = "flex"
        document.getElementById("nav-opener").style.rotate = "90deg"

    }
   
}
function showcategorydropdown() {
    
    if (document.getElementById("dropdown-category").style.display == "flex"){
        document.getElementById("dropdown-category").style.display = "none"
        

    }
    else{
        document.getElementById("dropdown-category").style.display = "flex"

    }
}
function showfilterbydropdown(){
    if (document.getElementById("dropdown-date-price").style.display == "flex"){
        document.getElementById("dropdown-date-price").style.display = "none"

    }
    else{
        document.getElementById("dropdown-date-price").style.display = "flex"

    }
}

function showCertificatesDropdown(){

    if(window.innerWidth <= 900){
        if ( document.getElementById("certificates-dropdown-menu").style.display == "flex"){
            document.getElementById("certificates-dropdown-menu").style.display = "none"
    
        }
        else{
            document.getElementById("certificates-dropdown-menu").style.display = "flex"
        }

    }
    
     


}

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
    window.location.href = "http://localhost/atesma_BACKEND/index.php?page=store";


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
