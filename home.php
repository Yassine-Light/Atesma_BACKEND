<?php
if(isset($_POST["btn-xc"])){
    $page= 'certificates';
    header("Location:index.php?page=$page");
    exit();
}
if(isset($_POST["btn-vs"])){
    $page= 'store';
    header("Location:index.php?page=$page");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Atesma</title>
</head>
<script src="file.js"></script>
<body>
    <main>
        <section class="introduction">
            <div class="introduction-text">
                <h1 class="introduction-title">What is Atesma?</h1>
                <p class="introduction-paragraph">Atesma is a leading provider of professional certification exams and educational resources. Our mission is to empower individuals and organizations through validated skills and knowledge, ensuring they stay ahead in </p>
                <form method="POST">
                <input class="learn-more" type="submit" name="btn-xc" value="Explore certificates" >
                </form>
            </div>
            <img src="./photos/desk-3139127_1280.jpg" alt="" class="introduction-image">

           
        </section>
        <section class="added-value">
            <img src="./photos/laptop-2617765_1280.jpg" alt="" class="added-value-image">
            <div class="added-value-text">
                <h1 class="added-value-title">What we offer</h1>
                <p class="added-value-paragraph">Atesma certifications boost career opportunities and earning potential for professionals, offering comprehensive support and preparation. For organizations, they ensure a skilled, productive workforce and enhanced business performance. Globally recognized.
                </p>
                <form method="POST">
                <input class="learn-more" type="submit" name="btn-vs" value="Visit store" >
                </form>
            </div>
            
            
        </section>
        <section class="info">
            <div class="info-card first-card">
                <i class="fa-regular fa-thumbs-up info-i"></i>
                <h1>100%</h1>
                <p>Client Satisfcation</p>
            </div>
            <div class="info-card second-card">
                <i class="fa-solid fa-phone info-i"></i>
                <h1>24/7</h1>
                <p>Support available</p>
            </div>
            <div class="info-card third-card">
                <i class="fa-regular fa-comment info-i"></i>
                <h1>100+
                </h1>
                <p>Positive feedback</p>
            </div>
        </section>

        <section class="certificates">
            <h1 class="certificates-title">Certificates</h1>
           <div class="certificates-links">
           <a href=""><img src="./photos/Unity.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/Microsoft.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/Autodesk.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/IC3 Logo.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/ICPHP.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/CSB.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/MOS.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/EC Council.png" alt="" class="certificate"></a>
           <a href=""><img src="./photos/ITS.png" alt="" class="certificate"></a>
        </div>
            

        </section>
        <!--<section class="get-started">Join the Atesma community today and take the first step towards professional excellence. Whether you're looking to certify your skills or become a training partner, we have the resources and support you need.
        </section>-->
    </main>