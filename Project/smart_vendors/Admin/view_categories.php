<?php
include_once('header.php');
?>
    <!-- Page Content -->
    <div id="content">
         <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
			<h5 class="ms-3 mb-0 d-none d-md-block">Category Management</h5>
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

        <div class="container-fluid p-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Categories List</h2>
                <p class="text-sm text-slate-500 mt-1">Manage and view all categories on the platform.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							foreach($categories_arr as $data)
							{
							?>
								<tr>
                                    <td><?php echo $data->id;?></td>
                                    <td><img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=100&h=100&fit=crop" class="rounded" width="50" alt="Catering"></td>
                                    <td class="fw-bold"><?php echo $data->name;?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
							<?php
							}
							?>
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
