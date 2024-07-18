<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env("APP_NAME") }}</title>
  <link rel="stylesheet" href="{{ asset("css/common.css") }}">
  <link rel="stylesheet" href="{{ asset("css/app.css") }}">
  @yield("head")
</head>
<body>
  @include("components.header")
  <main>
    @yield("content")
  </main>
  @include("components.footer")
  <script src="{{ asset("js/app.js") }}"></script>
  @yield("script")
</body>
</html>
