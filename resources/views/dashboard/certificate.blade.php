<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikat</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .container {
            width: auto;
            height: 716px;
            /* Add the background image */
            background-size: cover;
            /* Scale the background image to cover the entire container */
            background-position: center center;
            /* Center the background image */
            background-repeat: no-repeat;
            /* Prevent the background image from repeating */
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            padding-top: 180px;
            box-sizing: border-box;
            position: relative;
            /* Make the container a positioned element */
            font-family: 'Playfair Display', serif;
            /* Set the font-family to Playfair Display */
        }

        .title {
            text-align: center;
            font-size: 60px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            font-size: 25px;
        }

        .name {
            text-align: center;
            font-size: 45px;
            font-weight: bold;
            margin-bottom: 50px;
            /* text-decoration: underline; */
        }

        .date {
            text-align: right;
            margin-top: 30px;
            margin-right: 20px;
            font-size: 20px;
            font-style: italic;
        }

        .line {
            margin-top: -20px;
            width: 300px;
        }

        .signature {
            position: absolute;
            /* Position the signature within the container */
            bottom: 0;
            right: 0;
            width: 150px;
            height: 150px;
            /* transform: rotate(-15deg); */
            /* Rotate the signature */
        }

        .signature-name {
            position: absolute;
            bottom: 5px;
            right: 0;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            width: 200px;
        }

        .logo {
            position: absolute;
            /* Position the logo within the container */
            top: 5px;
            left: 15px;
            width: 100px;
            height: 100px;
        }
        .score {
            text-align: center;
            font-weight: bold;
            font-size: 45px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <!-- Add the Playfair Display font -->
</head>

<body>
    <div class="container" style="background-image: url({{ public_path('assets/img/bgsertif.png') }})">
        <img class="logo" src="{{ public_path('assets/img/logosertif.png') }}" alt="Logo">
        <div class="title">Certificate of Completion</div>
        <div class="subtitle">Awarded to</div>
        <div class="name">{{ $data->full_name }}</div>
        <hr class="line">
        <div class="subtitle">For successfully completing {{ $event->name }} event</div>
        <div class="subtitle">With Score</div>
        <h1 class="score">{{ $score }}</h1>
    </div>
</body>

</html>
