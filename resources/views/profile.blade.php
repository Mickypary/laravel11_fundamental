<h1>Profile page</h1>

<ul>
  <li><a href="{{ route('student_home') }}">Home</a></li>
  <li><a href="{{ route('student_about') }}">About</a></li>
  <li><a href="{{ route('student.profile', 'ola') }}">Profile</a></li>
</ul>

<p>
  The username is: {{ $user }}
</p>