<style>
  .logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }
</style>

<nav class="navbar navbar-dark bg-primary fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <div class="col-md-1 float-left" style="display: flex;">
        <div class="toggle-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <div class="col-md-1 float-left" style="display: flex;">
        <div class="logo">
          <a href="../"><i class="fa fa-building"></i></a>
        </div>
      </div>
      <div class="col-md-4 float-left text-white">
        <large><b><?php echo $_SESSION['setting_hotel_name']; ?></b></large>
        <large class="ms-5">Gst No<b id="gst_no_hotel" class="ms-3"><?php echo $_SESSION['setting_gst_no']; ?></b></large>
      </div>
      <div class="col-md-2 float-right text-white">
        <a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
      </div>
    </div>
  </div>

</nav>