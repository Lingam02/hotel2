<?php
include_once('assets/includes/headlinks.php');
?>

<!-- Masthead-->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4">
                <div class="card" id="filter-book">
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="index.php?page=list" id="filter" method="POST">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Chech-in Date</label>
                                        <input type="date" class="form-control" name="date_in" id="date_in" autocomplete="off">
                                    </div>
                                    <!-- datepicker -->
                                    <div class="col-md-3">
                                        <label for="">Chech-out Date</label>
                                        <input type="date" class="form-control" name="date_out" id="date_out" autocomplete="off">
                                    </div>
                                    <!-- datepicker -->

                                    <div class="col-md-3">
                                        <br>
                                        <button class="btn-btn-block btn-primary mt-3">Check Availability</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="container-fluid">
    <section class="page-section">
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
    </section>
    <div id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutters">
                <?php
                include 'admin/db_connect.php';
                $qry = $conn->query("SELECT * FROM  room_categories order by rand() ");
                while ($row = $qry->fetch_assoc()) :
                ?>

                    <div class="col-lg-4 col-sm-6 bg-white">
                        <a class="portfolio-box" href="#">
                            <div class="image-container">
                                <img class="img-fluid" src="assets/img/<?php echo $row['cover_img'] ?>" alt="" />
                            </div>
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-30"><?php echo "₹ " . number_format($row['price'], 2) ?> per day</div>
                                <div class="project-name"><?php echo $row['name'] ?></div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>


</div>
<!-- custom -->


<!-- OUR FACILITIES -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
<div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <!-- <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="assets/images/facilities/1.svg" width="80px" alt="">
                <h5 class="mt-3">Wifi</h5>
            </div> -->
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="assets/images/facilities/2.svg" width="80px" alt="">
            <h5 class="mt-3">Television</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="assets/images/facilities/3.svg" width="80px" alt="">
            <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="assets/images/facilities/4.svg" width="80px" alt="">
            <h5 class="mt-3">Bed</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="assets/images/facilities/5.svg" width="80px" alt="">
            <h5 class="mt-3">Ac</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="assets/images/facilities/6.svg" width="80px" alt="">
            <h5 class="mt-3">Radio</h5>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
        </div>
    </div>
</div>


<!-- REACH US -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-4 bg-white rounded">
            <iframe class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3890.302988694635!2d79.71129707364841!3d12.823687218106809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDQ5JzI1LjMiTiA3OcKwNDInNDkuOSJF!5e0!3m2!1sen!2sin!4v1707285396625!5m2!1sen!2sin" width="600" height="450" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="bg-white p-4 rounded mb-4">
                <h5>Call Us</h5>
                <a href="tel: +12345656788" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill me-2"></i><?php echo $_SESSION['setting_contact'] ?>
                </a> <br>
                <a href="tel: +12345656789" class="d-inline-block text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill me-2"></i>123456789899
                </a>
            </div>
            <div class="bg-white p-4 rounded mb-4">
                <h5>Follow Us</h5>
                <a href="tel: +12345656788" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-twitter me-1"></i>Twitter

                    </span>
                </a> <br>
                <a href="tel: +12345656788" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-facebook me-1"></i>Facebook

                    </span>
                </a> <br>
                <a href="tel: +12345656788" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram me-1"></i>Instagram

                    </span>
                </a> <br>
                <a href="tel: +12345656788" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-envelope me-1"></i><?php echo $_SESSION['setting_email'] ?>
                    </span>
                </a> <br>

            </div>
        </div>
    </div>
</div>
</div>


<!-- custom -->
<!-- Testimonial -->
<section class="bg-light p-5">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
    <div class="container">
        <div class="swiper swiper_testimonial">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/about/staff.svg" width="30px" alt="">
                        <h6 class=" m-0 ms-2">User 1</h6>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis ipsum eveniet ex aut harum porro, nisi optio, nesciunt at voluptatum aliquam repellat fuga minima maiores tempore praesentium quidem. Asperiores, molestiae.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/about/staff.svg" width="30px" alt="">
                        <h6 class=" m-0 ms-2">User 2</h6>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis ipsum eveniet ex aut harum porro, nisi optio, nesciunt at voluptatum aliquam repellat fuga minima maiores tempore praesentium quidem. Asperiores, molestiae.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="assets/images/about/staff.svg" width="30px" alt="">
                        <h6 class=" m-0 ms-2">User 3</h6>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis ipsum eveniet ex aut harum porro, nisi optio, nesciunt at voluptatum aliquam repellat fuga minima maiores tempore praesentium quidem. Asperiores, molestiae.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <!-- <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center p-4">
                    <img src="assets/images/about/staff.svg" width="30px" alt="">
                        <h6 class=" m-0 ms-2">User 4</h6>
                    </div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis ipsum eveniet ex aut harum porro, nisi optio, nesciunt at voluptatum aliquam repellat fuga minima maiores tempore praesentium quidem. Asperiores, molestiae.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div> -->

            </div>
            <div class="swiper-pagination"></div>

        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More >>></a>
        </div>
    </div>
</section>

<!-- custom -->
<!-- FOOTER US -->
<?php require('assets/includes/footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<?php require('assets/includes/footlinks.php') ?>
<script>
    var swiper = new Swiper(".swiper_container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        }

    });

    // var swiper = new Swiper(".swiper_testimonial", {
    //     effect: "coverflow",
    //     grabCursor: true,
    //     centeredSlides: true,
    //     slidesPerView: "auto",
    //     slidesPerView: "3",
    //     loop: true,
    //     coverflowEffect: {
    //         rotate: 50,
    //         stretch: 0,
    //         depth: 100,
    //         modifier: 1,
    //         slideShadows: false,
    //     },
    //     pagination: {
    //         el: ".swiper-pagination",
    //     },
    //     brakepoints:{
    //         320:{
    //             slidesPerView: 1,
    //         },
    //         640:{
    //             slidesPerView: 1,
    //         },
    //         768:{
    //             slidesPerView: 2,
    //         },
    //         1024:{
    //             slidesPerView: 3,
    //         },
    //     }
    // });
    var swiper = new Swiper(".swiper_testimonial", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });


    //============ script for date set default in input field visible starts===============
    // window.onload = function () {
    //   var currentDate = new Date();
    //   var outDate =currentDate+1;
    //   console.log(outDate);
    //   var day = currentDate.getDate();
    //   var month = currentDate.getMonth() + 1; // Month is zero-based
    //   var year = currentDate.getFullYear();

    //   var day1 = outDate.getDate();
    //   var month1 = outDate.getMonth() + 1; // Month is zero-based
    //   var year1 = outDate.getFullYear();


    //   // Format the date as YYYY-MM-DD (ISO format)
    //   var formattedDate = year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');

    //   var formattedDate1 = year1 + '-' + month1.toString().padStart(2, '0') + '-' + day1.toString().padStart(2, '0');

    //   // Set the attribute of the input field
    //   document.getElementById('date_in').value = formattedDate;
    //   document.getElementById('date_out').value = formattedDate1;


    // };
    //----------------------------------------------------------

    window.onload = function() {
        var currentDate = new Date();

        // Create a new Date object for the next day
        var nextDate = new Date(currentDate);
        nextDate.setDate(currentDate.getDate() + 1);

        // Get the components of the current date
        var day = currentDate.getDate();
        var month = currentDate.getMonth() + 1; // Month is zero-based
        var year = currentDate.getFullYear();

        // Get the components of the next date
        var day1 = nextDate.getDate();
        var month1 = nextDate.getMonth() + 1; // Month is zero-based
        var year1 = nextDate.getFullYear();

        // Format the current date as YYYY-MM-DD (ISO format)
        var formattedDate = year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');

        // Format the next date as YYYY-MM-DD (ISO format)
        var formattedDate1 = year1 + '-' + month1.toString().padStart(2, '0') + '-' + day1.toString().padStart(2, '0');

        // Set the value of the input fields
        document.getElementById('date_in').value = formattedDate;
        document.getElementById('date_out').value = formattedDate1;
    };


    //=============== script for date ends ================= 
</script>
<!-- custom -->