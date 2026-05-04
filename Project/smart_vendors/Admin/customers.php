<?php
include_once('header.php');
?>

    <!-- Page Content -->
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
			<h5 class="ms-3 mb-0 d-none d-md-block">Customers</h5>
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
                <h2 class="text-2xl font-bold text-slate-800">Customers List</h2>
                <p class="text-sm text-slate-500 mt-1">View all Customers.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>C-ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Mobile</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#C001</td>
                                    <td class="fw-bold">
                                        <img src="https://ui-avatars.com/api/?name=Alice+Smith&background=random" class="rounded-circle me-2" width="30"> Alice Smith
                                    </td>
                                    <td>alice@example.com</td>
                                    <td>alice@123</td>
                                    <td>+1 555-0101</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> Profile</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#C002</td>
                                    <td class="fw-bold">
                                        <img src="https://ui-avatars.com/api/?name=Bob+Johnson&background=random" class="rounded-circle me-2" width="30"> Bob Johnson
                                    </td>
                                    <td>bob@example.com</td>
									<td>bob@982</td>
                                    <td>+1 555-0102</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> Profile</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#C003</td>
                                    <td class="fw-bold">
                                        <img src="https://ui-avatars.com/api/?name=Charlie+Davis&background=random" class="rounded-circle me-2" width="30"> Charlie Davis
                                    </td>
                                    <td>charlie@example.com</td>
									<td>charlie@875</td>
                                    <td>+1 555-0103</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> Profile</button>
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
