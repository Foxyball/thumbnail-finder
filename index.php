<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Thumbnail Finder</title>
</head>
<body class="bg-primary">
  <form class="form-group" method="POST" action="">
      <div class="url-input">
        <span class="title">Поставете линк към видеото:</span>
        <div class="field">
          <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=..." required>
            <input type="hidden" class="hidden-input" name="imgurl">
            <span class="bottom-line"></span>
        </div>
      </div>

      <!-- Preview -->
      <div class="preview-area">
        <img src="" alt="" class="thumbnail">
        <i class="icon fas fa-cloud-download-alt"></i>
        <span>Поставете линка за изглед.</span>
      </div>
      <button class="download-btn" type="submit" name="button">Свали</button>
  </form>
  
</body>
</html>