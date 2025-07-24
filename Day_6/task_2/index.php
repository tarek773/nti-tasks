<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Text Analyzer</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container">
    <h2 class="mb-4">Text Analyzer</h2>
    <form method="POST">
      <div class="mb-3">
        <label for="sentence" class="form-label">Enter a sentence:</label>
        <input type="text" class="form-control" id="sentence" name="sentence" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["sentence"];

        $length = strlen($text);
        $replaced = str_replace("bad", "***", $text);
        $first10 = substr($text, 0, 10);
        $ucfirst = ucfirst($text);
        $upper = strtoupper($text);


        echo "<hr>";
        echo "<h4>Results:</h4>";
        echo "<ul class='list-group'>";
        echo "<li class='list-group-item'><strong>Original Text:</strong> $text</li>";
        echo "<li class='list-group-item'><strong>Length:</strong> $length</li>";
        echo "<li class='list-group-item'><strong>Replace 'bad' with '***':</strong> $replaced</li>";
        echo "<li class='list-group-item'><strong>First 10 Characters:</strong> $first10</li>";
        echo "<li class='list-group-item'><strong>Ucfirst:</strong> $ucfirst</li>";
        echo "<li class='list-group-item'><strong>Uppercase:</strong> $upper</li>";
        echo "</ul>";
    }
    ?>
  </div>
</body>
</html>
