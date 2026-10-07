@extends('admin.layout.layout')

@section('container')

<main id="main-content">
    <div class="card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold m-0" style="color: var(--navy-main);">Supplier & Distributor Brands</h5>
                <small class="text-muted">Manage electrical goods suppliers (Polycab, L&T, Havells, etc.)</small>
            </div>
            <a href="{{ url('admin/add_supplier') }}" class="btn btn-orange btn-sm"><i class="bi bi-plus-lg me-1"></i> Add Supplier</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Brand / Company Name</th>
                        <th>Contact Person</th>
                        <th>Phone</th>
                        <th>GST Number</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="supplierTableBody">
                    @foreach($suppliers as $sup)
                     <tr>
                    <td><strong>#{{ $sup->id }}</strong></td>
                    <td>{{ $sup->supplier_name }}</td>
                    <td>{{ $sup->contact_person }}</td>
                    <td>{{ $sup->phone }}</td>
                    <td><span class="badge bg-light text-dark border">{{ $sup->gstin }}</span></td>
                    <td class="text-center">
                                <a href="{{ url('admin/edit_supplier/' . $sup->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                                <a href="{{ url('admin/delete_supplier/' . $sup->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a>
                            </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $suppliers->links() }}
            </div>
        </div>
    </div>
</main>


@endsection