<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" 
          href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <title>Login</title>
</head>

<body>
<nav class="navbar bg-body-tertiary bg-white" data-bs-theme="white">
  <div class="container-fluid">
    <a class="navbar-brand align-self-start" href="#">
      <img src="/img/logo-putih@2x.png" alt="Bootstrap" width="30" height="20" class="me-2">
      <span>FinBite</span>
    </a>
  </div>
</nav>

  <div class="container mt-3" id="custom-container">
    <div class="row d-flex align-items-center" style="position:absolute; top: 25vh">
      <div class="col-md-8 col-xl-8 py-4">
        <p class="fs-4 fw-bold">FinBite: Auto Feeder Monitoring</p>
        <p>FinBites memastikan ikan Anda mendapatkan makanan tepat waktu, bahkan ketika kita sibuk. Jadwal yang terprogram dan kontrol porsi membuat teman-teman Anda tetap sehat dan bahagia, apa pun yang terjadi."</p>
      </div>
      <div class="col-md-4 col-xl-4 py-4 bg-white text-dark rounded-4 p-5"> 
        <h2 class="mb-4">Masuk FinBite</h2>
        @if(Session::has('pesan'))
          <div class="alert alert-primary" role="alert">
          {{ Session::get('pesan') }}
          </div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
          @csrf

          <div class="mb-3">
    <!-- <label class="form-label" for="email">Email</label> -->
    <input 
        type="email" 
        id="email" 
        name="email" 
        placeholder="Alamat email" 
        value="{{ old('email') }}" 
        class="form-control @error('email') is-invalid @enderror"
    >
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 d-flex password-wrapper">
    <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Kata sandi" 
        value="{{ old('password') }}" 
        class="form-control @error('password') is-invalid @enderror" 
        pattern=".{6,20}" 
        title="The password must be between 6-20 characters long"
    ><i id="togglePassword" class="bi bi-eye-slash"></i>

    @error('password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 fs-6" id="forgot-password">
    <a href="{{ route('recovery') }}" class="text-decoration-none font-small" style="color:#0D4A59"><small>Lupa sandi?</small></a>
</div>

          <button type="submit" class="btn btn-primary mb-2 w-100 btn-finbites-hover">Masuk</button>
        </form>
        <p class="S1 fs-6">Tidak punya akun? <a href="{{ route('register') }}" style="color:#0D4A59">Daftar</a></p>
      </div>
    </div>
  </div>

  <script>
    const password = document.querySelector('#password');
    document.getElementById('togglePassword').addEventListener('click', function () {
      // Mendapatkan tipe atribut
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      // Men-toggle kelas icon
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
  </script>

  <script src="/js/script.js"></script>
</body>

</html>