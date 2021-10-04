<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
      body {
        font-family: 'Nunito', sans-serif;
        font-size: 20pt;
      }
    </style>
  </head>
  <body>
    <b>Date:</b> {{ date('l jS \of F Y h:i:s A') }}<br/>
    <b>Hostname:</b> {{ gethostname() }}<br/>
    <b>Visits:</b> {{ $visits }}<br/>
    <b>Client IP:</b> {{ $ip }}<br/><br/>
    <i>This page took {{ (microtime(true) - LARAVEL_START) }} seconds to render</i>
  </body>
</html>