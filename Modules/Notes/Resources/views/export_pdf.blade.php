<html>
<head>
    <title>Notes PDF Export</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 4px; font-size: 12px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Notes List</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Content</th>
                <th>Reference ID</th>
                <th>Tags</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->title }}</td>
                <td>{{ $note->type }}</td>
                <td>{{ $note->content }}</td>
                <td>{{ $note->reference_id }}</td>
                <td>{{ $note->tags }}</td>
                <td>{{ $note->quantity }}</td>
                <td>{{ $note->amount }}</td>
                <td>{{ optional($note->user)->name }}</td>
                <td>{{ $note->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
