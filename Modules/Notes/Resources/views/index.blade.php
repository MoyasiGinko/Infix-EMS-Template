@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Notes</h2>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">Add Note</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notes as $note)
                <tr>
                    <td>{{ $note->title }}</td>
                    <td>{{ $note->type }}</td>
                    <td>{{ $note->quantity }}</td>
                    <td>{{ $note->amount }}</td>
                    <td>{{ $note->created_by }}</td>
                    <td>{{ $note->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('notes.show', $note) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No notes found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $notes->links() }}
    </div>
</div>
@endsection
