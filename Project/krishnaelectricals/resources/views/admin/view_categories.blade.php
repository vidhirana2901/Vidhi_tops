@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0" style="color: var(--navy-main);">Categories List</h5>
            <a href="{{ url('admin/add_category') }}" class="btn btn-orange btn-sm"><i class="bi bi-plus-lg me-1"></i> Add Category</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="categoryTableBody">
                    @foreach($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td><strong>{{$cat->category_name}}</strong></td>
                    <td><img src="{{url('admin/assets/upload/images/category/' . $cat->image)}}" class="rounded" width="40" height="40"></td>
                    <td><small class="text-muted">{{$cat->description}}</small></td>
                    <td class="text-center">
                        <a href="{{ url('admin/edit_category/' . $cat->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                        <a href="{{ url('admin/delete_category/' . $cat->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
             @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</main>

       

@endsection