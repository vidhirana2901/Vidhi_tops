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

        <!-- Main Content Area -->
        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Vendors List</h2>
                <p class="text-sm text-slate-500 mt-1">Manage and view all registered vendors on the platform.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Vendor Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Rating</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							<tr>
								<td>V-101</td>
								<td class="fw-bold">Elite Catering</td>
								<td>Catering</td>
								<td>₹50,000</td>
								<td>4.8</td>
								<td>Mumbai, MH</td>
								<td>
									<img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=100&h=100&fit=crop" width="60">
								</td>
								<td>
									<button class="btn btn-sm btn-warning me-1">Edit</button>
									<button class="btn btn-sm btn-danger">Delete</button>
								</td>
							</tr>

							<tr>
								<td>V-102</td>
								<td class="fw-bold">Lumina Photography</td>
								<td>Photography</td>
								<td>₹25,000</td>
								<td>4.6</td>
								<td>Delhi, DL</td>
								<td>
									<img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=100&h=100&fit=crop" width="60">
								</td>
								<td>
									<button class="btn btn-sm btn-warning me-1">Edit</button>
									<button class="btn btn-sm btn-danger">Delete</button>
								</td>
							</tr>

							<tr>
								<td>V-103</td>
								<td class="fw-bold">Grand Decorators</td>
								<td>Decoration</td>
								<td>₹40,000</td>
								<td>4.5</td>
								<td>Ahmedabad, GJ</td>
								<td>
									<img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=100&h=100&fit=crop" width="60">
								</td>
								<td>
									<button class="btn btn-sm btn-warning me-1">Edit</button>
									<button class="btn btn-sm btn-danger">Delete</button>
								</td>
							</tr>
						</tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>
