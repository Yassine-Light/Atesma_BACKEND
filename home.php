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
    <main class="home-main"><section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-slider">
          <div class="hero-slide active">
            <div class="hero-content">
              <h1>Welcome to Atesma</h1>
              <p>Welcome to Atesma, where your path to certification and career growth starts. We provide top-tier certifications and resources to boost your skills and advance your career. Trust us to support you in achieving your goals and exploring new opportunities with confidence.</p>
              <a href="index.php?page=store" class="hero-btn">Visit our store</a>
            </div>
          </div>
          <div class="hero-slider">
            <div class="hero-content" style="display:none;">
              <h1>Innovate with Atesma</h1>
              <p>Discover cutting-edge solutions for your business Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quibusdam reprehenderit doloribus eligendi deserunt asperiores voluptates voluptate sed doloremque fuga.</p>
              <a href="#about" class="hero-btn">Learn More</a>
            </div>
          </div>
        </div>
        <div class="hero-controls">
          <button class="prev-slide fade-in">❮</button>
          <button class="next-slide fade-in">❯</button>
        </div>
      </section>
      
          
        <section class="circles-tree">
            <div class="home-circle">
                <i class="fa-solid fa-house-flag slide-in-left"></i>
            </div>
            <div class="poles">

            <div class="pole pole-a slide-in-left"></div>
            <div class="pole pole-b scale-up"></div>
            <div class="pole pole-c slide-in-right"></div>

        </div>
       
            <div class="c-cards">
                <div class="c-card slide-in-right ">
                <div class="circle" style="position:absolute; margin-top:-100px;">
                <i class="fa-solid fa-user"></i>
            </div>
                    <h1>For individuals</h1>
                    <p>At Atesma, we offer personalized support to help individuals achieve their certification goals with tailored guidance and dedicated assistance.</p>
                </div>
                <div class="c-card fade-in">
                <div class="circle" style="position:absolute; margin-top:-100px;">
                <i class="fa-solid fa-school"></i>
            </div>
                    <h1>For Schools</h1>
                    <p>we collaborate with schools to enhance educational programs through customized certification solutions that fit seamlessly into their curricula.</p>
                </div>
                <div class="c-card slide-in-left">
                <div class="circle" style="position:absolute; margin-top:-100px;">
                <i class="fa-solid fa-bolt"></i>
            </div>
                    <h1>High Quality </h1>
                    <p>At Atesma, we deliver top-quality certification programs and resources, continually updated to ensure excellence and relevance.</p>
                </div>
            </div>
 </section>
 
<section class="featured-certificates">
    <h1>featured certificates</h1>
    <div class="c-container ">
    <a href="index.php?page=store" style="text-decoration:none;" class="featured-certificate fade-in">
        <img src="./photos/Unity.png" alt="">
        <h2>Unity Certified User</h2>
        <p>Unity</p>
    </a>
    <a href="index.php?page=store" style="text-decoration:none;" class="featured-certificate fade-in">
        <img src="./photos/IC3 logo.png" alt="">
        <h2>IC3 Digital Literacy Certification</h2>
        <p>IC3 Digital Literacy</p>
    </a>
    <a href="index.php?page=store" style="text-decoration:none;" class="featured-certificate fade-in">
        <img src="./photos/ITS.png" alt="">
        <h2>IT Specialist</h2>
        <p>Information Technology Specialist</p>
    </a>
</div>
</section>
        
        
        <section class="stats-section">
            <div class="section-heading fade-in">
                <h2>Backed by numbers...</h2>
            </div>
            <div class="stats-container">
                <div class="stat-item fade-in">
                    <h3>100+</h3>
                    <p>Issued certificates</p>
                </div>
                <div class="stat-item fade-in">
                    <h3>100+</h3>
                    <p>SATISFIED CUSTOMERS</p>
                </div>
                <div class="stat-item fade-in">
                    <h3>24/7</h3>
                    <p>Available Support</p>
                </div>
                <div class="stat-item fade-in ">
                    <h3>10+</h3>
                    <p>YEARS OF EXPERIENCE</p>
                </div>
            </div>
        </section>
        


    </main>
<script>
    
    document.addEventListener("DOMContentLoaded", () => {
    // Select all elements with animation classes
    const animations = document.querySelectorAll('.slide-in-left, .slide-in-right, .fade-in, .scale-up');

    // Create the Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Add the 'scroll-animation' class when the element is in view
                entry.target.classList.add('scroll-animation');
            }
            else{
                entry.target.classList.remove('scroll-animation');
            }
            // We don't remove the class when the element goes out of view to keep the animation
        });
    }, 
    { threshold: 0.3 });

    // Observe each element
    animations.forEach(animation => {
        observer.observe(animation);
    });
});





if (localStorage.getItem("purchase") == "done"){
    window.location.href = "http://localhost/atesma_BACKEND/index.php?page=store";
    
}

</script>
