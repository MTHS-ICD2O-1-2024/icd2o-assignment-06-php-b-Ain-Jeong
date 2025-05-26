<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Weather Today, with API & JSON" />
  <meta name="keywords" content="mths, icd2o" />
  <meta name="author" content="Ain Jeong" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-deep_orange.min.css" />
  <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png" />
  <link rel="manifest" href="./site.webmanifest" />
  <title>Weather Today, with API & JSON</title>
</head>

<body>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Weather Today, with API & JSON</span>
      </div>
    </header>
    <main class="mdl-layout__content">
      <br />
      <?php
      $apiUrl = 'https://api.openweathermap.org/data/2.5/weather?lat=45.4211435&lon=-75.6900574&appid=fe1d80e1e103cff8c6afd190cad23fa5';
      $dataFromApi = file_get_contents($apiUrl);

      if ($dataFromApi !== false) {
        $jsonData = json_decode($dataFromApi, true);

        // bring the information
        $iconCode = $jsonData['weather'][0]['icon'];
        $weatherMain = $jsonData['weather'][0]['main'];
        $weatherDescription = $jsonData['weather'][0]['description'];
        $tempKelvin = $jsonData['main']['temp'];
        $tempCelsius = $tempKelvin - 273.15;

        // output
        echo '<img src="https://openweathermap.org/img/wn/' . $iconCode . '@2x.png" alt="weather icon">';
        echo 'Weather: ' . $weatherMain . '; ' . $weatherDescription . '<br />';
        echo 'Temperature: ' . number_format($tempCelsius, 1) . ' °C';
      } else {
        echo 'Error fetching weather data.';
      }
      ?>
      <div class="page-content-return">
        <a href="./index.php">Return ...</a>
      </div>
    </main>
  </div>
</body>

</html>