<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    {{env('APP_NAME')}}
  </title>
  @if (request()->is('dashboard'))
  <link rel="stylesheet" href="{{asset('assets/css/perfect-scrollbar.css')}}">
  <script src="{{asset('assets/js/perfect-scrollbar.js')}}"></script>
  @endif
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('assets/css/black-dashboard.css')}}" rel="stylesheet" />
</head>

<body class="">