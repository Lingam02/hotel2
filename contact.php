<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Hotel - Contact</title>

    <?php require('assets/includes/headlinks.php') ?>

    <link rel="stylesheet" href="assets/css/common.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body class="bg-light">
    <?php require('assets/includes/header.php') ?>

    <div class="my-4 px-4">
        <h2 class="fw-bold h-font text-center text-uppercase">Contact us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, minima officiis dolor laudantium nobis totam <br>veniam nam! Suscipit, nostrum sapiente debitis ullam beatae.</p>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1945.1518754631636!2d79.70576095716574!3d12.823637900839275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52c35ece9c5e5b%3A0xfd4b8349ec416a3c!2sTECH%20FLOW!5e0!3m2!1sen!2sin!4v1704763178747!5m2!1sen!2sin" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <h5 class="">Address</h5>
                    <a href="https://maps.app.goo.gl/RHYq68YpQWawiu9WA" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> XYZ,KANCHIPURAM, TAMIL NADU.
                    </a>
                    <h5 class="mt-4">Call Us</h5>
                    <a href="tel: +12345656788" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill me-2"></i>123456789890
                    </a> <br>
                    <a href="tel: +12345656789" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill me-2"></i>123456789899
                    </a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: lingam@gmail.com" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill me-2"></i>xyz@gmail.com
                    </a>
                    <h5 class="mt-4">Follow Us</h5>
                    <a href="#" class="d-inline-block fs-5 me-2 text-dark">
                        <i class="bi bi-twitter me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block fs-5 me-2 text-dark">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block fs-5 text-dark">
                        <i class="bi bi-instagram me-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form action="" method="post">
                        <h5>Send A Message</h5>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Name</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Email</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Subject</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">Message</label>
                            <textarea name="" id="" rows="5" style="resize: none;" class="form-control shadow-none"></textarea>
                        </div>
                        <button type="button" class="btn text-white custom_bg mt-3">Send</button>
                    </form>
                </div>
            </div>


        </div>
    </div>




    <?php require('assets/includes/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php require('assets/includes/footlinks.php') ?>

    <script>

    </script>

</body>

</html>