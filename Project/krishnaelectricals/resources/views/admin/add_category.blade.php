@extends('admin.layout.layout')

@section('container')
<!-- MAIN CONTENT AREA -->
<main id="main-content">
    <div class="container-fluid p-0">
        <!-- Page Title -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold m-0" style="color: var(--navy-main);">Add New Category</h4>
                <small class="text-muted">Create a new product classification for Krishna Electricals</small>
            </div>
            <a href="{{ url('admin/view_categories') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Categories
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-custom p-4">
                    <form id="addCategoryForm" action="{{ url('admin/submit-category') }}" method="post" enctype="multipart/form-data">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @csrf
                        <div class="row g-3">
                            
                            <!-- Category ID (Auto Generated / Readonly) -->
                            

                            <!-- Category Name -->
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('category_name') }}" id="catName" name="category_name" class="form-control" placeholder="e.g. Wires & Cables, Switchgear, LED Lighting" >
                            </div>

                            <!-- Category Image URL / Path -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Image URL / Path <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white"><i class="bi bi-image"></i></span>
                                    <input type="file" value="{{ old('image') }}" id="catImage" name="image" class="form-control" placeholder="Provide a valid image link for icon/thumbnail display..." >
                                </div>
                                <small class="text-muted">Provide a valid image link for icon/thumbnail display.</small>
                            </div>

                            <!-- Category Description -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea id="catDesc" name="description"  value="{{ old('description') }}" class="form-control" rows="3" placeholder="Brief details about products listed under this category..."></textarea>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-12 mt-4 text-end">
                                <a href="{{ url('admin/view_categories') }}" class="btn btn-light border me-2">Cancel</a>
                                <button type="submit" class="btn btn-orange px-4">
                                    <i class="bi bi-check-lg me-1"></i> Save Category
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection