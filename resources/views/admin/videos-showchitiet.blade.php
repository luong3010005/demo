<!-- resources/views/admin/videos/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Video Details</h1>

        <div class="mb-3">
            <strong>Title:</strong> {{ $video->title }}
        </div>

        <div class="mb-3">
            <strong>Description:</strong> {{ $video->description }}
        </div>

        <div class="mb-3">
            <strong>Video:</strong>
            <video width="600" controls>
                <source src="{{ asset('storage/' . $video->video_url) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <a href="{{ route('videos.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
