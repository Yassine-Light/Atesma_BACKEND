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
<main class="home-main">
        <section class="introduction">
            <div class="arrow arrow-left" id="arrow-left" onclick=switchHeroLeft()>  <  </div>
            <div class="introduction-text" id="introduction-text">
                <h1 class="introduction-title">Welcome to Atesma</h1>
                <p class="introduction-paragraph">We are the leading certificates provider in <b>all</b> Morocco,we provide 
                IT certificates given by the highest ranking companies, as yes They are our partners! </p>
                <form method="post">
                <button class="learn-more" name="btn-xc">Explore certificates <i class="fa-solid fa-arrow-up-right-from-square"></i></button>
                </form>
            </div>
            <div class="arrow arrow-right" id="arrow-right" onclick=switchHeroRight()> > </div>
           

                
                <div class="added-value-text" id="added-value-text">
                    <h1 class="added-value-title">What we offer</h1>
                    <p class="added-value-paragraph">Atesma certifications boost career opportunities and earning potential for professionals, offering comprehensive support and preparation. For organizations, they ensure a skilled, productive workforce and enhanced business performance. Globally recognized.
                    </p>
                    <form method="POST" >
                    <button class="learn-more" name="btn-vs">visit store<i class="fa-solid fa-arrow-up-right-from-square"></i></button>
                    </form>
                </div>
                

        </section>
        
        <section class="info">
            <div class="info-text">
             

                   <h1> What is Atesma?</h1>
                    <p >Atesma is a leading provider of professional certification exams and educational resources. Our mission is to empower individuals and organizations through validated skills and knowledge, ensuring they stay ahead in </p>
                    
                </div>
            </div>
            <div class="info-sub">
            <div class="info-card first-card">
                <i class="fa-regular fa-circle-user"></i>
                <h1>For Individuals</h1>
                <p> we make sure that our clients are satisfied, thus we have managed to achieve 100% rate of client satisfaction </p>
            </div>
            <div class="info-card second-card">
                <i class="fa-solid fa-school"></i>
                <h1>Are you school? </h1>
                <p>at day, at night, whenever you need ourhelp, we will be there for you!  </p>
            </div>
            <div class="info-card third-card">
                <i class="fa-solid fa-bolt"></i>
                <h1>High quality service
                </h1>
                <p>we keep getting positive feedback after dealing with clients, do not believe us? be one and see for yourself!</p>
            </div>
        </div>
        </section>
        <section class="statistics-section-container">
            <h2 class="stats-heading">Our Stats Talk on Behalf of Us</h2>
            <div class="statistics-section">
                <div class="stat">
                    <div class="stat-value">100%</div>
                    <div class="stat-label">Client Satisfaction</div>
                </div>
                <div class="stat">
                    <div class="stat-value">24/7</div>
                    <div class="stat-label">Support Availability</div>
                </div>
                <div class="stat">
                    <div class="stat-value">500+</div>
                    <div class="stat-label">Positive Feedbacks</div>
                </div>
            </div>
        </section>
        
          <section class="partners">
            <h1>our partners</h1>
            <div class="list">
                <img src="/photos/AppDev.png" alt="">
                <img src="/photos/AppDev.png" alt="">
                <img src="/photos/AppDev.png" alt="">
                <img src="/photos/AppDev.png" alt="">
                <img src="/photos/AppDev.png" alt="">

            </div>
            
          </section>
          
          
        

        
        <!--<section class="get-started">Join the Atesma community today and take the first step towards professional excellence. Whether you're looking to certify your skills or become a training partner, we have the resources and support you need.
        </section>-->
    </main>