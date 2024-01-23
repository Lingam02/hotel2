 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100">
         <div class="row h-100 align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                 <h1 class="text-uppercase text-white font-weight-bold">About Us</h1>
                 <hr class="divider my-4" />
             </div>

         </div>
     </div>
 </header>

 <section class="page-section">
     <div class="container">
         <?php echo html_entity_decode($_SESSION['setting_about_content']) ?>

     </div>
 </section>

 <!-- custom -->
 <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white shadow rounded p-4 border-top border border-4 text-center box">
                    <img src="assets/images/about/hotel.svg" width="70px" alt="">
                    <h4 class="mt-3">30 + Rooms</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white shadow rounded p-4 border-top border border-4 text-center box">
                    <img src="assets/images/about/customers.svg" width="70px" alt="">
                    <h4 class="mt-3">100 + Customers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white shadow rounded p-4 border-top border border-4 text-center box">
                    <img src="assets/images/about/rating.svg" width="70px" alt="">
                    <h4 class="mt-3">150 + Reviews</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white shadow rounded p-4 border-top border border-4 text-center box">
                    <img src="assets/images/about/staff.svg" width="70px" alt="">
                    <h4 class="mt-3">20  + Staffs</h4>
                </div>
            </div>
        </div>
    </div>
 <!-- custom -->
 <?php
    include('assets/includes/footer.php');

    ?>