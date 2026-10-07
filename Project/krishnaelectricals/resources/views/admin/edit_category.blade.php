@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="container-fluid p-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold m-0" style="color: var(--navy-main);">Edit Category</h4>
                <small class="text-muted">Update the category details for Krishna Electricals</small>
            </div>
            <a href="{{ url('admin/view_categories') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Categories
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-custom p-4">
                    <form action="{{ url('admin/update_category/' . $edit_category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
                                <input type="text" name="category_name" class="form-control" value="{{ old('category_name', $edit_category->category_name) }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Category Image</label>
                                <input type="file" name="image" class="form-control">
                                @if($edit_category->image)
                                    <img src="{{ url('admin/assets/upload/images/category/' . $edit_category->image) }}" class="rounded mt-2" width="80" height="80" alt="{{ $edit_category->category_name }}">
                                @endif
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description', $edit_category->description) }}</textarea>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <a href="{{ url('admin/view_categories') }}" class="btn btn-light border me-2">Cancel</a>
                                <button type="submit" class="btn btn-orange px-4">
                                    <i class="bi bi-check-lg me-1"></i> Update Category
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
