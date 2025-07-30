@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Note</h2>
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $note->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $note->type) }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="4" required>{{ old('content', $note->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="reference_id" class="form-label">Reference ID</label>
            <input type="number" name="reference_id" id="reference_id" class="form-control" value="{{ old('reference_id', $note->reference_id) }}">
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags', $note->tags) }}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $note->quantity) }}">
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount', $note->amount) }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
