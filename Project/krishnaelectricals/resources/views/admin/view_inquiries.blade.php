@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold m-0" style="color: var(--navy-main);">Material Price & Quote Inquiries</h5>
                <small class="text-muted">Inquiries sent by contractors & site builders</small>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Client Name</th>
                        <th>Contact</th>
                        <th>Requirements / Products Requested</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($inquiries as $inquiry)
                    <tr>
                        <td><small>{{ $inquiry->created_at->format('d M Y') }}</small></td>
                        <td><strong>{{ $inquiry->client_name }}</strong></td>
                        <td>{{ $inquiry->contact }}</td>
                        <td>{{ $inquiry->requirements }}</td>
                        <td><span class="badge bg-warning text-dark">{{ $inquiry->status }}</span></td>
                        <td class="text-center"><button class="btn btn-sm btn-orange">Send Quote</button></td>
                    </tr>
                    @endforeach
                </tbody>
                 
            </table>
            <div class="d-flex justify-content-center mt-3">
                    {{ $inquiries->links() }}
            </div>
        </div>
    </div>
</main>
@endsection