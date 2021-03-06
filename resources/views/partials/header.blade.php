<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Poppins:wght@300;400;600&family=Akaya+Telivigala&family=RocknRoll+One&family=Oswald&display=swap"
            rel="stylesheet"
        />
    <!-- Custom CSS -->
    @yield('style')
    <title>{{strtolower($view_name)}}</title>
</head>
<body>
    <noscript>
        This app require JavaScript enabled for it to work properly. Please
        enable JavaScript and refresh the page to continue.
    </noscript>