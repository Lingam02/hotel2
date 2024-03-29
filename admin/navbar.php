
<style>
	nav#sidebar {
    background: url(../assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
    background-repeat: no-repeat;
    background-size: cover;
	}

	.toggle-btn {
    display: none; /* Hide the button by default on larger screens */
    cursor: pointer;
}

.toggle-btn span {
    width: 30px;
    height: 3px;
    background-color: #fff;
    display: block;
    margin: 6px 0;
}
/* Add styles for the active state of the sidebar when toggled */
#sidebar.active {
    margin-left: 0;
}

/* Add styles to make the navigation links responsive */
@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px; /* Adjust this value as needed */
    }
	main#view-panel {
    margin-left: 0px;
    /* width: calc(100% - 250px); */
	width: 100%;
    margin-top: 8.9rem;
    padding: 0;
}
}

</style>
<nav id="sidebar" class='mx-lt-5' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=ledger" class="nav-item nav-ledger"><span class='icon-field'><i class="fa fa-home"></i></span> A/c Head</a>
				<a href="index.php?page=booked" class="nav-item nav-booked"><span class='icon-field'><i class="fa fa-book"></i></span> Booked </a>
				<a href="index.php?page=check_in" class="nav-item nav-check_in"><span class='icon-field'><i class="fa fa-sign-in-alt"></i></span> Check In </a>
				<a href="index.php?page=check_out" class="nav-item nav-check_out"><span class='icon-field'><i class="fa fa-sign-out-alt"></i></span> Check Out </a>
				<a href="index.php?page=billing" class="nav-item nav-billing"><span class='icon-field'><i class="fa fa-sign-out-alt"></i></span> Billing </a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Room Category List</a>
				<a href="index.php?page=rooms" class="nav-item nav-rooms"><span class='icon-field'><i class="fa fa-bed"></i></span> Rooms </a>
				<a href="index.php?page=c_amenities" class="nav-item nav-c_amenities"><span class='icon-field'><i class="fa fa-bed"></i></span> Create Amenities </a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span> Site Settings</a>
			<?php endif; ?>
		</div>

</nav>

<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
	// custom-----------------------------------------------------------------------------------
	$(document).ready(function() {
    // Toggle the sidebar on button click
    $('.toggle-btn').click(function() {
        $('#sidebar').toggleClass('active');
    });

    // Show/hide the toggle button based on screen size
    $(window).resize(function() {
        if ($(window).width() <= 768) {
            $('.toggle-btn').show();
        } else {
            $('.toggle-btn').hide();
            $('#sidebar').removeClass('active'); // Close sidebar on larger screens
        }
    });

    // Trigger the resize event on page load
    $(window).resize();
});
	// custom-----------------------------------------------------------------------------------

</script>
