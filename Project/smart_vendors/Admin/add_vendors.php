<?php
include_once('header.php');
?>

    <!-- Page Content -->
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
			<h5 class="ms-3 mb-0 d-none d-md-block">Vendor Management</h5>
                <button type="button" id="sidebarCollapse" class="btn btn-primary d-lg-none d-block">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="ms-auto d-flex align-items-center">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-md-block text-dark fw-bold">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-danger" href="login.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container" style="padding:50px">                       
				<form method="post" name="add_vendors">
					<div class="mb-3">
						<label class="form-label">Vendor Name</label>
						<input type="text"  name="name"class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">Category</label>
						<select class="form-select">
							<option selected>Select Category</option>
							<option value="1">Catering</option>
							<option value="2">Birthday</option>
							<option value="3">Photography</option>
							<option value="4">Engagement</option>
							<option value="5">Wedding</option>
							<option value="6">Reception</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Price</label>
						<input type="price" name="price" class="form-control">
					</div>
					<div class="mb-3">
						<label class="form-label">Rating</label>
						<input type="text" class="form-control" name="rating">
					</div>
					<div class="mb-3">
						<label class="form-label">Location</label>
						<input type="text" class="form-control" name="location">
					</div>
					<div class="mb-3">
						<label class="form-label">Image</label>
						<input type="file" class="form-control" name="image">
					</div>
				
			  <div class="footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
		</div>


</body>
</html>
