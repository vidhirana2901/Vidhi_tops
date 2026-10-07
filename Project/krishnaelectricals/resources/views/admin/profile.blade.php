@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="container-fluid p-0">
        <!-- Page Title -->
        <div class="mb-4">
            <h4 class="fw-bold m-0" style="color: var(--navy-main);">Admin Profile & Settings</h4>
            <small class="text-muted">Manage administrator details, store profile, and credentials.</small>
        </div>

        <div class="row g-4">
            <!-- Left Side Card: Quick Summary -->
            <div class="col-lg-4">
                <div class="card-custom p-4 text-center">
                    <div class="position-relative d-inline-block mb-3">
                        <div class="rounded-circle bg-warning text-dark mx-auto d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 100px; height: 100px; font-size: 2rem;">
                            SR
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1" style="color: var(--navy-main);">Shripur Rana</h5>
                    <p class="text-muted small mb-3">Proprietor & Super Admin</p>
                    
                    <div class="border-top pt-3 text-start">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-shop text-warning me-2 fs-5"></i>
                            <div>
                                <small class="text-muted d-block">Business Name</small>
                                <strong class="small">Krishna Electricals</strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt text-danger me-2 fs-5"></i>
                            <div>
                                <small class="text-muted d-block">Location</small>
                                <strong class="small">Maninagar, Ahmedabad</strong>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope text-primary me-2 fs-5"></i>
                            <div>
                                <small class="text-muted d-block">Email</small>
                                <strong class="small">admin@krishnaelectricals.com</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side Form: Profile Edit -->
            <div class="col-lg-8">
                <div class="card-custom p-4">
                    <ul class="nav nav-pills mb-4" id="profileTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-semibold" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button">Store & Personal Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button">Security & Password</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="profileTabContent">
                        <!-- Personal Details Form -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel">
                            <form id="profileForm">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Admin Full Name</label>
                                        <input type="text" id="adminName" class="form-control" value="Shripur Rana" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Designation</label>
                                        <input type="text" class="form-control" value="Proprietor" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Contact Phone</label>
                                        <input type="tel" id="adminPhone" class="form-control" value="+91 98765 43210" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email Address</label>
                                        <input type="email" id="adminEmail" class="form-control" value="admin@krishnaelectricals.com" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Shop / Business Address</label>
                                        <textarea id="shopAddress" class="form-control" rows="2">Shop No. 12, Electrical Market, Near Railway Station, Maninagar, Ahmedabad, Gujarat 380008</textarea>
                                    </div>
                                    <div class="col-12 text-end mt-4">
                                        <button type="submit" class="btn btn-orange px-4">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Security Form -->
                        <div class="tab-pane fade" id="security" role="tabpanel">
                            <form id="securityForm">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Current Password</label>
                                        <input type="password" class="form-control" placeholder="••••••••" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">New Password</label>
                                        <input type="password" class="form-control" placeholder="Enter new password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Confirm New Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm new password" required>
                                    </div>
                                    <div class="col-12 text-end mt-4">
                                        <button type="submit" class="btn btn-orange px-4">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection