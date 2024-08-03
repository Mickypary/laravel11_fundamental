<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

    <h1>@yield('heading')</h1>

    <ul>
      <li><a href="{{ route('student_home') }}">Home</a></li>
      <li><a href="{{ route('student_about') }}">About</a></li>
      <li><a href="{{ route('student.profile', 'ola') }}">Profile</a></li>
      <li><a href="{{ route('location.maincity') }}">Go to city</a></li>
    </ul>

    @yield('main_section')
    
    
</body>
</html>