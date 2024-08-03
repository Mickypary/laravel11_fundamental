<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    * {
      box-sizing: border-box;
    }
    .container {
      width: 100%;
      margin: 60px auto;
      max-width: 300px;
      background-color: rgba(137, 178, 190, 0.271);
      padding: 20px;
    }
    .form-control {
      font-size: 1rem;
      padding: 0.5rem;
      border-radius: 0.3rem;
      width: 100%;
    }

    label {
      font-size: 1rem;
      padding: 0.5rem;
      /* margin-bottom: 0.2rem; */
      display: block;
    }

    .btn {
      padding: 0.4rem;
      margin-top: 0.4rem;
      background-color: aqua
    }
  </style>
</head>
<body>

  <form action="{{ route('form') }}" class="container" method="post">
    @csrf
    <label>Mail Mailer</label>
    <div>
      {{-- <input type="text" name="mail_mailer" value="{{ env('MAIL_MAILER') }}"> --}}
      <input type="text" class="form-control" name="mail_mailer" value="<?= $_ENV['MAIL_MAILER'] ?>">
    </div>

    <label>Mail Host</label>
    <div>
      <input type="text" class="form-control" name="mail_host" value="{{ env('MAIL_HOST') }}">
    </div>

    <label>Mail Port</label>
    <div>
      <input type="text" class="form-control" name="mail_port" value="{{ env('MAIL_PORT') }}">
    </div>

    <label>Mail Username</label>
    <div>
      <input type="text" class="form-control" name="mail_username" value="{{ env('MAIL_USERNAME') }}">
    </div>

    <label>Mail Password</label>
    <div>
      <input type="text" class="form-control" name="mail_password" value="{{ env('MAIL_PASSWORD') }}">
    </div>

    <label>Mail Encryption</label>
    <div>
      <input type="text" class="form-control" name="mail_encryption" value="{{ env('MAIL_ENCRYPTION') }}">
    </div>

    <div>
      <input type="submit" class="btn" name="submit" value="Update">
    </div>


  </form>
</body>
</html>