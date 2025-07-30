@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Note Details</h2>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $note->title }}</h4>
            <p class="card-text"><strong>Type:</strong> {{ $note->type }}</p>
            <p class="card-text"><strong>Content:</strong> {{ $note->content }}</p>
            <p class="card-text"><strong>Reference ID:</strong> {{ $note->reference_id }}</p>
            <p class="card-text"><strong>Tags:</strong> {{ $note->tags }}</p>
            <p class="card-text"><strong>Quantity:</strong> {{ $note->quantity }}</p>
            <p class="card-text"><strong>Amount:</strong> {{ $note->amount }}</p>
            <p class="card-text"><strong>Created By:</strong> {{ $note->created_by }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $note->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>
    <a href="{{ route('notes.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
