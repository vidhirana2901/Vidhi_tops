<?php
// Active menu states using exact Laravel route paths
$isCategory = Request::is('admin/categories*');
$isProduct  = Request::is('admin/products*');
$isCustomer = Request::is('admin/customers*');
$isSupplier = Request::is('admin/suppliers*');
$isInquiry  = Request::is('admin/inquiries*');
$isFeedback = Request::is('admin/feedback*');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishna Electricals Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Style -->
    <link rel="stylesheet" href="<?php echo asset('admin/assets/css/style.css'); ?>">
</head>
<body>

    <!-- 📌 FIXED SIDEBAR -->
    <div id="sidebar" class="d-flex flex-column justify-content-between">
        <div>
            <!-- Brand Header -->
            <div class="brand-box d-flex align-items-center">
                <div class="bg-warning text-dark p-2 rounded-3 me-3 d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">
                    <i class="bi bi-lightning-charge-fill fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold m-0 text-white" style="letter-spacing: 0.5px;">KRISHNA</h5>
                    <small class="text-white-50" style="font-size: 0.72rem;">ELECTRICALS ADMIN</small>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="nav flex-column mt-3" id="sidebarMenu">
                
                <!-- Dashboard -->
                <a class="nav-link-parent text-white <?php echo Request::is('admin/dashboard') ? 'active' : ''; ?>" href="<?php echo url('admin/dashboard'); ?>">
                    <span><i class="bi bi-grid-1x2-fill me-2 text-warning"></i> Dashboard</span>
                </a>

                <!-- Categories Dropdown -->
                <a class="nav-link-parent <?php echo $isCategory ? '' : 'collapsed'; ?>" 
                   data-bs-toggle="collapse" 
                   href="#categoryMenu" 
                   role="button" 
                   aria-expanded="<?php echo $isCategory ? 'true' : 'false'; ?>">
                    <span><i class="bi bi-tags-fill me-2"></i> Categories</span>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </a>
                <div class="collapse sidebar-submenu <?php echo $isCategory ? 'show' : ''; ?>" id="categoryMenu" data-bs-parent="#sidebarMenu">
                    <a class="nav-link-child <?php echo Request::is('admin/view_categories') ? 'active' : ''; ?>" href="<?php echo url('admin/view_categories'); ?>">View Categories</a>
                    <a class="nav-link-child <?php echo Request::is('admin/add_category') ? 'active' : ''; ?>" href="<?php echo url('admin/add_category'); ?>">Add New Category</a>
                </div>

                <!-- Products Dropdown -->
                <a class="nav-link-parent <?php echo $isProduct ? '' : 'collapsed'; ?>" 
                   data-bs-toggle="collapse" 
                   href="#productMenu" 
                   role="button" 
                   aria-expanded="<?php echo $isProduct ? 'true' : 'false'; ?>">
                    <span><i class="bi bi-box-seam-fill me-2"></i> Products</span>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </a>
                <div class="collapse sidebar-submenu <?php echo $isProduct ? 'show' : ''; ?>" id="productMenu" data-bs-parent="#sidebarMenu">
                    <a class="nav-link-child <?php echo Request::is('admin/view_products') ? 'active' : ''; ?>" href="<?php echo url('admin/view_products'); ?>">View All Products</a>
                    <a class="nav-link-child <?php echo Request::is('admin/add_product') ? 'active' : ''; ?>" href="<?php echo url('admin/add_product'); ?>">Add New Product</a>
                </div>

                <!-- Customers Dropdown -->
                <a class="nav-link-parent <?php echo $isCustomer ? '' : 'collapsed'; ?>" 
                   data-bs-toggle="collapse" 
                   href="#customerMenu" 
                   role="button" 
                   aria-expanded="<?php echo $isCustomer ? 'true' : 'false'; ?>">
                    <span><i class="bi bi-people-fill me-2"></i> Customers</span>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </a>
                <div class="collapse sidebar-submenu <?php echo $isCustomer ? 'show' : ''; ?>" id="customerMenu" data-bs-parent="#sidebarMenu">
                    <a class="nav-link-child <?php echo Request::is('admin/view_customers') ? 'active' : ''; ?>" href="<?php echo url('admin/view_customers'); ?>">Customer Directory</a>
                    
                </div>

                <!-- Suppliers Dropdown -->
                <a class="nav-link-parent <?php echo $isSupplier ? '' : 'collapsed'; ?>" 
                   data-bs-toggle="collapse" 
                   href="#supplierMenu" 
                   role="button" 
                   aria-expanded="<?php echo $isSupplier ? 'true' : 'false'; ?>">
                    <span><i class="bi bi-truck me-2"></i> Suppliers</span>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </a>
                <div class="collapse sidebar-submenu <?php echo $isSupplier ? 'show' : ''; ?>" id="supplierMenu" data-bs-parent="#sidebarMenu">
                    <a class="nav-link-child <?php echo Request::is('admin/view_suppliers') ? 'active' : ''; ?>" href="<?php echo url('admin/view_suppliers'); ?>">Supplier Brands</a>
                    <a class="nav-link-child <?php echo Request::is('admin/add_supplier') ? 'active' : ''; ?>" href="<?php echo url('admin/add_supplier'); ?>">Add Supplier</a>
                </div>

                <!-- Inquiries Dropdown -->
                <a class="nav-link-parent <?php echo $isInquiry ? '' : 'collapsed'; ?>" 
                   data-bs-toggle="collapse" 
                   href="#inquiryMenu" 
                   role="button" 
                   aria-expanded="<?php echo $isInquiry ? 'true' : 'false'; ?>">
                    <span><i class="bi bi-chat-left-quote-fill me-2"></i> Inquiries</span>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </a>
                <div class="collapse sidebar-submenu <?php echo $isInquiry ? 'show' : ''; ?>" id="inquiryMenu" data-bs-parent="#sidebarMenu">
                    <a class="nav-link-child <?php echo Request::is('admin/view-inquiries') ? 'active' : ''; ?>" href="<?php echo url('admin/view-inquiries'); ?>">Quote Requests</a>
                </div>

                <!-- Feedback Dropdown -->
                <a class="nav-link-parent <?php echo $isFeedback ? '' : 'collapsed'; ?>" 
                   data-bs-toggle="collapse" 
                   href="#feedbackMenu" 
                   role="button" 
                   aria-expanded="<?php echo $isFeedback ? 'true' : 'false'; ?>">
                    <span><i class="bi bi-star-fill me-2"></i> Feedback</span>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </a>
                <div class="collapse sidebar-submenu <?php echo $isFeedback ? 'show' : ''; ?>" id="feedbackMenu" data-bs-parent="#sidebarMenu">
                    <a class="nav-link-child <?php echo Request::is('admin/view-feedback') ? 'active' : ''; ?>" href="<?php echo url('admin/view-feedback'); ?>">View Ratings</a>
                </div>

            </nav>
        </div>

        <!-- Sidebar Sign Out Footer -->
        <div class="p-3 border-top border-secondary border-opacity-25">
            <a href="<?php echo url('admin/login'); ?>" class="btn btn-sm btn-outline-danger w-100 py-2 fw-semibold rounded-3">
                <i class="bi bi-box-arrow-right me-2"></i> Sign Out
            </a>
        </div>
    </div>

    <!-- 📌 TOP NAVBAR -->
    <nav id="top-navbar" class="navbar px-4 py-2 sticky-top">
        <div class="container-fluid p-0">
            <div>
                <h4 class="fw-bold m-0" style="color: var(--navy-main, #0B2545);">Krishna Electricals</h4>
                <small class="text-muted">Admin Control Panel</small>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="<?php echo url('/'); ?>" target="_blank" class="btn btn-sm btn-outline-secondary d-none d-md-inline-block">
                    <i class="bi bi-globe me-1"></i> View Site
                </a>

                <span class="badge bg-white text-dark border shadow-sm px-3 py-2 rounded-pill d-none d-md-flex align-items-center">
                    <i class="bi bi-geo-alt-fill text-danger me-2 fs-6"></i> Maninagar, Ahmedabad
                </span>
                @if(session('aname'))
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="rounded-circle bg-warning text-dark me-2 d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px;">
                                {{ substr(session('aname'), 0, 2) }}
                            </div>
                            <div class="text-start d-none d-sm-block">
                                <div class="fw-bold text-dark">{{ session('aname') }}</div>
                                <small class="text-muted">Admin</small>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 p-2" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item rounded py-2 <?php echo Request::is('admin/profile') ? 'active' : ''; ?>" href="<?php echo url('admin/profile'); ?>">
                                    <i class="bi bi-person me-2"></i> Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>            
                                <form action="<?php echo url('admin/admin_logout'); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item rounded py-2 text-danger w-100 text-start border-0 bg-transparent">
                                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </nav>