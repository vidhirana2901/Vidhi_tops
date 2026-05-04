<?php
include_once('header.php');
?>

    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
			<h5 class="ms-3 mb-0 d-none d-md-block">Feedbacks</h5>
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
                <h2 class="text-2xl font-bold text-slate-800"> Feedback List</h2>
                <p class="text-sm text-slate-500 mt-1">Happy customers feedback.</p>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Vendor</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">#F899</td>
                                    <td>Alice Smith</td>
                                    <td>Elite Catering</td>
                                    <td class="text-warning text-center">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-truncate" style="max-width: 300px;">"The food was absolutely amazing and the staff was extremely professional. Highly recommended!"</p>
                                    </td>
                                    <td class="text-center">Oct 26, 2023</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-danger" title="Delete Feedback"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">#F900</td>
                                    <td>Bob Johnson</td>
                                    <td>Lumina Photography</td>
                                    <td class="text-warning text-center">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-truncate" style="max-width: 300px;">"Good photos, but they took a while to deliver the final edited album."</p>
                                    </td>
                                    <td class="text-center">Oct 27, 2023</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-danger" title="Delete Feedback"><i class="fas fa-trash"></i></button>
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
