<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Random Extinct Animal Facts, with JS (API)" />
  <meta name="keywords" content="mths, icd2o" />
  <meta name="author" content="Ain Jeong" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.brown-deep_orange.min.css" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
  <link rel="manifest" href="site.webmanifest" />
  <title>Random Extinct Animal Facts, with JS (API)</title>
</head>

<body>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Random Extinct Animal Facts, with JS (API)</span>
      </div>
    </header>
    <main class="mdl-layout__content">
      <br />
      <div class="page-content-answer">
        <?php
        $apiUrl = 'https://extinct-api.herokuapp.com/api/v1/animal/';
        $dataFromApi = file_get_contents($apiUrl);

        if ($dataFromApi !== false) {
          $jsonData = json_decode($dataFromApi, true);

          // bring the information from API
          $imageSrc = $jsonData['data'][0]['imageSrc'];
          $commonName = $jsonData['data'][0]['commonName'];
          $binomialName = $jsonData['data'][0]['binomialName'];
          $location = $jsonData['data'][0]['location'];
          $lastRecord = $jsonData['data'][0]['lastRecord'];
          $shortDescription = $jsonData['data'][0]['shortDesc'];

          // output
          echo '<img src="' . $imageSrc . '" alt="extinct animal image">';
          echo '<b>Name:</b> ' . $commonName . ' (' . $binomialName . ')<br />' .
            '<b>Location:</b> ' . $location . '<br />' .
            '<b>Last Record:</b> ' . $lastRecord . '<br />' .
            '<b>Short Description:</b> ' . $shortDescription . '<br />';
        } else {
          echo 'Error fetching data';
        }
        ?>
      </div>
        <div class="page-content-return">
          <a href="./index.php">Return ...</a>
        </div>
    </main>
  </div>
</body>

</html>
