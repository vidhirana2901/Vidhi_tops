@extends('website.layout.layout')

@section('container')

<div class="feedback-card">
    <h2>Customer Feedback</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('submit-feedback') }}">
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

        <label for="name">Name *</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}"  >

        <label for="rating">Rating *</label>
        <select id="rating" name="rating" value="{{ old('rating') }}">
            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
        </select>

        <label for="feedback_note">Your Feedback *</label>
        <textarea id="feedback_note" name="feedback_note" rows="4" placeholder="Share your experience with us..." value="{{ old('feedback_note') }}"  ></textarea>

        
        <button type="submit" >Submit Feedback</button>
    </form>
</div>

@endsection