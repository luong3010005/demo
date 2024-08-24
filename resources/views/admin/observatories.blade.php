<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Observatory</title>
</head>
<body>
    <h1>Add Observatory</h1>
    <form action="{{ route('observatories.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="details">Details:</label>
        <textarea id="details" name="details" required></textarea>
        <br>

        <label for="latitude">Latitude:</label>
        <input type="number" step="any" id="latitude" name="latitude" required>
        <br>

        <label for="longitude">Longitude:</label>
        <input type="number" step="any" id="longitude" name="longitude" required>
        <br>

        <button type="submit">Add</button>
    </form>
</body>
</html>
