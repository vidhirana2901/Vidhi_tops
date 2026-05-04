<?php
include_once('header.php');
?>
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
			<h5 class="ms-3 mb-0 d-none d-md-block">Booking</h5>
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
                <p class="text-sm text-slate-500 mt-1">View all Bookings.</p>
            </div>


            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>B-ID</th>
                                    <th>Customer Name</th>
                                    <th>Vendor Name</th>
                                    <th>Event Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">#BK-5091</td>
                                    <td>Alice Smith</td>
                                    <td>Elite Catering</td>
                                    <td>Nov 15, 2023</td>
                                    <td>$1,200</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#updateStatusModal"><i class="fas fa-edit"></i> Status</button>
                                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-invoice"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#BK-5092</td>
                                    <td>Bob Johnson</td>
                                    <td>Lumina Photography</td>
                                    <td>Nov 20, 2023</td>
                                    <td>$850</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#updateStatusModal"><i class="fas fa-edit"></i> Status</button>
                                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-invoice"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#BK-5093</td>
                                    <td>Charlie Davis</td>
                                    <td>Grand Decorators</td>
                                    <td>Dec 05, 2023</td>
                                    <td>$2,500</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white" disabled><i class="fas fa-edit"></i> Status</button>
                                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-file-invoice"></i></button>
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

<!-- Update Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Booking Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Booking Reference</label>
                <input type="text" class="form-control" value="#BK-5092" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Set Status</label>
                <select class="form-select">
                    <option value="pending" selected>Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
