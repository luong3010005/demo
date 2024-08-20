<!-- resources/views/admin/videos/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Video List</h1>

        <!-- Hiển thị thông báo thành công nếu có -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('videos.create') }}" class="btn btn-primary mb-3">Add New Video</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Video</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->description }}</td>
                        <td>
                            <video width="150" controls>
                                <source src="{{ asset('storage/' . $video->video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </td>
                        <td>
                            <a href="{{ route('videos.show', $video->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
