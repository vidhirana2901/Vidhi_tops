@extends('admin.layout.layout')

@section('container')
<main id="main-content">
    <div class="card-custom p-4">
        <div class="mb-3">
            <h5 class="fw-bold m-0" style="color: var(--navy-main);">Customer Feedback & Reviews</h5>
            <small class="text-muted">Direct ratings left by buyers for Krishna Electricals</small>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Customer</th>
                        <th>Rating</th>
                        <th>Feedback Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $feedback)
                    <tr>
                        <td><strong>{{ $feedback->name }}</strong></td>
                        <td><span class="text-warning fw-bold">★★★★★</span> (5.0)</td>
                        <td>{{ $feedback->feedback_note }}</td>
                        <
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                    {{ $feedbacks->links() }}
            </div>
        </div>
    </div>
</main>
@endsection