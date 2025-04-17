<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NameForm</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet" />
</head>
<body>

  <div class="search-container">
    <form action="/NameForm" method="POST">
      @csrf
      <div class="form-flex">
        <div class="input-field">
          <select name="category">
            <option disabled selected hidden>Choose Category</option>
            <option>Subject A</option>
            <option>Subject B</option>
            <option>Subject C</option>
          </select>
        </div>
        <div class="input-field">
          <input type="text" name="name" placeholder="Enter Keywords">
        </div>
        <div class="input-field fixed-width">
          <button type="submit" class="btn-search">Search</button>
        </div>
      </div>
    </form>
  </div>

  <script src="js/main.js"></script>
</body>
</html>
