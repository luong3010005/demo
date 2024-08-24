<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Observatories</title>
</head>
<body>
    <h1>Observatories</h1>
    <a href="{{ route('observatories.create') }}">Add New Observatory</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Details</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($observatories as $observatory)
            <tr>
                <td>{{ $observatory->name }}</td>
                <td>{{ $observatory->details }}</td>
                <td>{{ $observatory->latitude }}</td>
                <td>{{ $observatory->longitude }}</td>
                <td>
                    <a href="{{ route('observatories.edit', $observatory->id) }}">Edit</a>
                    <form action="{{ route('observatories.destroy', $observatory->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
