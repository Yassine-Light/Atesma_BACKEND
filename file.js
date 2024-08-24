
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
let hero = 2
function switchHeroRight(){
    document.getElementById("added-value-text").style.transform = "translateX(0%)"
    document.getElementById("introduction-text").style.transform = "translateX(-700%)"
    
}
function switchHeroLeft(){
    document.getElementById("added-value-text").style.transform = "translateX(-700%)"
    document.getElementById("introduction-text").style.transform = "translateX(0%)"
    
}