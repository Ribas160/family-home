<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Family home</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ secure_asset('icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ secure_asset('icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ secure_asset('icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ secure_asset('icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ secure_asset('icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ secure_asset('icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ secure_asset('icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ secure_asset('icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ secure_asset('icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ secure_asset('icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ secure_asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ secure_asset('icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#0275D8">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app"></div>
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script type="module">
       import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

		const el = document.createElement('pwa-update');
		document.body.appendChild(el);
    </script>
</body>
</html>
