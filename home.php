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
              <p>Your journey to excellence starts here Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda sunt rerum ab nulla qui eius doloremque autem impedit quisquam unde.</p>
              <a href="#services" class="hero-btn">Explore Our Services</a>
            </div>
          </div>
          <div class="hero-slider">
            <div class="hero-content">
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
        <div class="other-circles">
            <div class="circle  ">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="circle">
                <i class="fa-solid fa-school"></i>
            </div>
            <div class="circle">
                <i class="fa-solid fa-bolt"></i>
            </div>
        </div>
            <div class="c-cards">
                <div class="c-card slide-in-left ">
                    <h1>For individuals</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium reiciendis exercitationem perferendis quos quae consectetur error ab adipisci est corporis.</p>
                </div>
                <div class="c-card fade-in">
                    <h1>For Schools</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque mollitia explicabo aliquid quos id impedit nisi perspiciatis iusto quibusdam molestiae!</p>
                </div>
                <div class="c-card slide-in-right">
                    <h1>High Quality </h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus minus eligendi necessitatibus sequi voluptates, repudiandae iste quaerat natus dolorum sit!</p>
                </div>
            </div>
 </section>
 
<section class="featured-certificates">
    <h1>featured certificates</h1>
    <div class="c-container ">
    <div class="featured-certificate fade-in">
        <img src="/photos/AppDev.png" alt="">
        <h2>Title</h2>
        <p>Description Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, architecto.</p>
    </div>
    <div class="featured-certificate fade-in">
        <img src="/photos/AppDev.png" alt="">
        <h2>Title</h2>
        <p>Description Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, architecto.</p>
    </div>
    <div class="featured-certificate fade-in">
        <img src="/photos/AppDev.png" alt="">
        <h2>Title</h2>
        <p>Description Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, architecto.</p>
    </div>
</div>
</section>
        
        
        <section class="stats-section">
            <div class="section-heading fade-in">
                <h2>Men lie, Numbers don't</h2>
            </div>
            <div class="stats-container">
                <div class="stat-item fade-in">
                    <h3>705</h3>
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
                    <h3>10</h3>
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
</script>
