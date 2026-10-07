@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold m-0" style="color: var(--navy-main);">Customer & Contractor Directory</h5>
                <small class="text-muted">Registered clients in Ahmedabad</small>
            </div>
            <a href="{{ url('/admin/add_customer') }}" class="btn btn-orange btn-sm"><i class="bi bi-person-plus me-1"></i> Add Customer</a>
        </div>
        <div class="mb-3">
            <span class="badge bg-primary">Total Customers: {{ $customers->count() }}</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Image</th>
                        <th class="text-center">Actions</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td><strong>{{ $customer->customer_name }}</strong></td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ ucfirst($customer->phone) }}</td>
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->hobby }}</td>
                            <td class="text-center">
                                @if($customer->image)
                                    <img src="{{ asset('admin/assets/upload/images/customer/' . $customer->image) }}" alt="Customer Image" class="img-thumbnail" style="max-width: 50px; max-height: 50px;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{url('admin/status_customer/' . $customer->id)}}" class="btn btn-sm btn-warning"> {{$customer->status}}</a>
                                <a href="{{ url('admin/delete_customer/' . $customer->id) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</main>
@endsection