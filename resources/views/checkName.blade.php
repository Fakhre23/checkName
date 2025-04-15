<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>check-name</title>
</head>
<body>
    <h1>Check a Name</h1>
    <form action="/check-name" method="POST">
        @csrf
        <label for="name">Enter Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Check Name</button>
    </form>
</body>
</html>