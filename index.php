<?php
//if the submit button is clicked

if (isset($_POST['download'])) {
  $imgUrl = $_POST['imgurl'];
  $curl = curl_init($imgUrl);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $download = curl_exec($curl);
  curl_close($curl);
  header('Content-type: image/png');
  header('Content-Disposition: attachment;filename="thumbnail(balikgstudio).png"'); //izteglqne na img v .jpg
  echo $download;
}
?>

<!DOCTYPE html>
<html lang="bg">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="balik_logo.ico">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>Thumbnail Finder</title>
</head>

<body class="bg-primary">
  <form class="form-group" action='' method="POST">
    <a href="http://balikgstudio.eu/">BalikG Studio</a>
    <header>Свалете си тъмбнейла от ютуб клип</header>
    <div class="url-input">
      <span class="title">Поставете линка към видеото:</span>
      <div class="field">
        <input class="form-control" type="text" placeholder="https://www.youtube.com/watch?v=..." required  oninvalid="this.setCustomValidity('Моля, въведете линк')"  oninput="setCustomValidity('')">
        <input class="hidden-input" type="hidden" name="imgurl">
        <span class="bottom-line"></span>
      </div>
    </div>
    <!-- Preview -->
    <div class="preview-area">
      <img class="thumbnail" src="" alt="">
      <i class="icon fas fa-cloud-download-alt"></i>
      <span>Поставете линка за изглед. </span>
    </div>
    <button class="download-btn" type="submit" name="download">Свали</button>
  </form>


  <!-- scripts -->
  <script>
    const urlField = document.querySelector(".field input"),
      previewArea = document.querySelector(".preview-area"),
      imgTag = previewArea.querySelector(".thumbnail"),
      hiddenInput = document.querySelector(".hidden-input"),
      button = document.querySelector(".download-btn");



    urlField.onkeyup = () => {
      let imgUrl = urlField.value;
      previewArea.classList.add("active");
      button.style.pointerEvents = "auto";
      if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
        let vidId = imgUrl.split('v=')[1].substring(0, 11);
        let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytImgUrl;
      } else if (imgUrl.indexOf("https://youtu.be/") != -1) {
        let vidId = imgUrl.split('be/')[1].substring(0, 11);
        let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytImgUrl;
      } else if (imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)) {
        imgTag.src = imgUrl;
      } else {
        imgTag.src = "";
        button.style.pointerEvents = "none";
        previewArea.classList.remove("active");
      }
      hiddenInput.value = imgTag.src;
    }


    // JS Custom Validation
    var FormStuff = {
      init: function() {
        this.applyConditionalRequired();
        this.bindUIActions();
      },
    
      bindUIActions: function() {
        $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
      },
    
      applyConditionalRequired: function() {
    
        $(".require-if-active").each(function() {
          var el = $(this);
          if ($(el.data("require-pair")).is(":checked")) {
            el.prop("required", true);
          } else {
            el.prop("required", false);
          }
        });
    
      }
    
    };
    
    FormStuff.init();
  </script>
</body>

</html>