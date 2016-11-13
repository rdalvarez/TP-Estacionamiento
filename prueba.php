<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Tooltip Example</h3>
  <p>Tooltips are not CSS-only plugins, and must therefore be initialized with jQuery: select the specified element and call the tooltip() method.</p>
  <a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a>
</div>

<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>

</body>
</html>
