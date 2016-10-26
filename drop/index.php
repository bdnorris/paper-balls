<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brian's File Drop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.1.0/milligram.min.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <div class="">
          <h1>File Drop</h1>
        </div>
      </header>

      <div class="">
        <div class="">
          <div class="drop-wrapper">
              <form action="upload.php" method="post" enctype="multipart/form-data" class="dropzone" id="dzone">
                  <div class="fallback">
                      <input name="file" type="file" multiple />
                      <input type="submit" value="Upload" />
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div> <!-- .wrapper -->

    <!--<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>-->
    <script src="js/dropzone.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
