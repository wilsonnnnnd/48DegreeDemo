

<!-- Page Content -->

 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
 <?php echo $this->Html->image('/assets/img/brandimage.png', ['style' => 'width:300px;height:450px','class'=>'img-fluid', 'alt'=>'']); ?>
 <!-- <img src="/assets/img/brandimage.png" class="img-fluid" alt="" style = "width:300px;height:450px" > -->


  </section><!-- End Hero -->


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about ">
      <div class="container">
      <div class="section-title" data-aos="fade-up">

        <div class="row">
          <div class="col-xl-6 col-lg-7" data-aos="fade-right">
            <?php echo $this->Html->image('/assets/img/home1.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
            <!-- <img src="/assets/img/home1.jpg" class="img-fluid" alt=""> -->
          </div>
          <div class="col-xl-6 col-lg-5 pt-5 pt-lg-0">
            <h2 data-aos="fade-up">About us</h2>

            <div class="icon-box" data-aos="fade-up">
              <i class="bx bxs-news"></i>
              <h4>Established in 2000</h4>
              <p>With over 500 projects completed and highly satisfied customers, we always aim to provide the best services possible</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bxs-briefcase-alt-2"></i>
              <h4>Quality assurance </h4>
              <p>48 Degrees has a strong commitment to delivering reliable, professional and quality work </p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-cube-alt"></i>
              <h4>Project Management Services</h4>
              <p>Our management team and experienced site inspectors work closely with builders and clients to deliver exactly what is promised</p>
            </div>

          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->




    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p> Type of Services we offer </p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bx-search-alt"></i></div>
              <h4 class="title">Inspection</a></h4>
              <p class="description">We provide in-house inspection services for clients</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bxs-building-house"></i></div>
              <h4 class="title">Construction</a></h4>
              <p class="description">We offer construction services through reputable third party building companies</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title">Maintenance</a></h4>
              <p class="description">We offer maintenance services and on-going maintenance services for existing clients</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title">Project Management packages</a></h4>
              <p class="description">At 48 Degrees we offer customizable project management packages </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
          <p> Gallery of our past work </p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-construction">Construction</li>
              <li data-filter=".filter-maintenance">Maintenance</li>
              <li data-filter=".filter-inspection">Inspection</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-maintenance">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/main-1.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/main-1.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Maintenance 1</h4>
                <p>Maintenance</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/main-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-inspection">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/inspect-1.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/inspect-1.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Inspection 3</h4>
                <p>Inspection</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/inspect-1.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-maintenance">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/main-2.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/main-2.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Maintenance 2</h4>
                <p>Maintenance</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/main-2.jpg.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/con-1.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/con-1.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Construction 2</h4>
                <p>Construction</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/con-1.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-inspection">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/inspect-2.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/inspect-2.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Inspection 2</h4>
                <p>Inspection</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/inspect-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-maintenance">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/main-3.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/main-3.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Maintenance 3</h4>
                <p>Maintenance</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/main-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/con-2.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/con-2.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Construction 1</h4>
                <p>Construction</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/con-2.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-construction">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/con-3.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/con-3.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Construction 3</h4>
                <p>Construction</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/con-3.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-inspection">
            <div class="portfolio-wrap">
            <?php echo $this->Html->image('/assets/img/portfolio/inspect-3.jpg', ['class'=>'img-fluid', 'alt'=>'']); ?>
              <!-- <img src="/assets/img/portfolio/inspect-3.jpg" class="img-fluid" alt=""> -->
              <div class="portfolio-info">
                <h4>Inspection 3</h4>
                <p>Inspection</p>
                <div class="portfolio-links">
                  <a href="/assets/img/portfolio/inspect-3.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->



    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Testimonials</h2>
          <p>Hear from our clients on what they have to say</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="fade-up">

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              We chose 48 Degrees to help us with our rather major home renovation for many reasons. During the quoting process they were very thorough, extremely helpful in minimising the ‘unknowns’ by really looking at the job in detail and being open and honest with us from the start.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <?php echo $this->Html->image('/assets/img/testimonials/testimonials-1.jpg', ['class'=>'testimonial-img', 'alt'=>'']); ?>
            <!-- <img src="/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt=""> -->
            <h3>Saul Goodman</h3>
            <h4>Client</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Thanks to their professionalism, flexibility and great communication we have achieved exactly what we wanted and love our ‘new’ home. We have gone from a 1 Star Scorecard rated home to a 7 Star Scorecard rating which is fantastic and much of this is down to the quality of the build and the efficiency features installed at thanks to 48 Degrees.  We would certainly use them again if we ever do another reno.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <?php echo $this->Html->image('/assets/img/testimonials/testimonials-2.jpg', ['class'=>'testimonial-img', 'alt'=>'']); ?>
            <!-- <img src="/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt=""> -->
            <h3>Sara Wilson</h3>
            <h4>Client</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              What a pleasure to have found 48 Degrees! Building can be most traumatic especially when working on a property that has a heritage base but with their expertise, ability to find solutions and their wonderful communication skills, the exercise of renovating became seamless and the result was truly life changing for us.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <?php echo $this->Html->image('/assets/img/testimonials/testimonials-3.jpg', ['class'=>'testimonial-img', 'alt'=>'']); ?>
            <!-- <img src="/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt=""> -->
            <h3>Jena Karlis</h3>
            <h4>Client</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              48 Degrees are reliable, professional and always have a smile on their face. They want the very best for clients and always work with care as if it's their own home. They don't cut corners and respect the clients budget when making decisions.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <?php echo $this->Html->image('/assets/img/testimonials/testimonials-4.jpeg', ['class'=>'testimonial-img', 'alt'=>'']); ?>
            <!-- <img src="/assets/img/testimonials/testimonials-4.jpeg" class="testimonial-img" alt=""> -->
            <h3>Matt Brandon</h3>
            <h4>Client</h4>
          </div>

          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Found 48 Degrees after watching a project nearby and speaking to the owner who was very positive. I had been looking at builders who could provide me with a sustainable and energy efficient renovation of a 1970s unit. So pleased to go with them, they were easy to work with and gave me good suggestions for my project.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <?php echo $this->Html->image('/assets/img/testimonials/testimonials-5.jpg', ['class'=>'testimonial-img', 'alt'=>'']); ?>
            <!-- <img src="/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt=""> -->
            <h3>John Larson</h3>
            <h4>Client</h4>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Team Section -->


 <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Feel free to contact us using any of the methods below for a quote, feedback or an enquiry</p>
        </div>

        <div class="row no-gutters justify-content-center" data-aos="fade-up">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Woodside Building for Technology and Design, Clayton VIC 3800</p>
              </div>

              <div class="email mt-4">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@48.com</p>
              </div>

              <div class="phone mt-4">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+61 32445 234</p>
              </div>

            </div>

          </div>

          <div class="col-lg-5 d-flex align-items-stretch">
              <div id="googleMap" style="width:100%;height:270px;">
                  <script>
                      function myMap() {
                          var mapProp= {
                              center:new google.maps.LatLng(-37.90954074522532, 145.1353267915758),
                              zoom:18,
                          };
                          var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                      }
                  </script>

                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJMs9Hm7j3cEhbOewPl8lxFawWTEkvy7w&callback=myMap"></script>
              </div>
<!--            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>-->
          </div>
          <!-- https://www.google.com/maps/place/Adam+St,+Burnley+VIC+3121,+Australia/@-37.8289837,144.9991251,15z/data=!3m1!4b1!4m5!3m4!1s0x6ad642605ed85407:0xe35e1262a8c6c531!8m2!3d-37.829001!4d145.0078584?hl=en-US -->

        </div>


           <!-- ======= Enquiries Form ======= -->



    </section><!-- End Contact Section -->



       <!-- ======= F.A.Q Section ======= -->
       <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>These are the most frequently asked questions and we have them answered</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">What are the pricing of the services you offer? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Each service varies depending on your needs, you can speak to one of us by phone or contact us via email to find out more. Both of which can be found the contact us section.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">What is your service area? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                   We primarily work in the Melbourne area but we are open to travel farther afield depending on the circumstances.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Do you offer design services? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  No, but we do have connections with reputable design companies
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">What is your quotation process? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                 Stage 1: We visit a site and have an introductory meeting with the client <br>
                 Stage 2: We prepare a Bill of Quantities (BOQ) for the project and we also submit our ROI (Request of Information) <br>
                 Stage 3: The submission of the formal proposal for the project. Upon submission of our quotation, we also offer an open tender review option whereby we will sit down with the client to go through our quotation and assist with cross-checking other tenders received. This ensures that the client is able to accurately compare tenders that have allowed for the same amount of Scope of Works (SOW).
                </p>
              </div>
            </li>

            <!-- <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li> -->

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->


      <?= $this->Flash->render() //error message ?>
    <?= $this->fetch('content') ?>

  </main><!-- End #main -->


<!-- /.container -->

