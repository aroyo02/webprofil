<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      max-width: 900px;
      width: 100%;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    .image-side img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .form-side {
      padding: 3rem;
    }

    .form-side h2 {
      margin-bottom: 1.5rem;
      color: #000000;
    }

    .btn-custom {
      background-color: #ffc107;
      color: white;
      border: none;
    }

    .btn-custom:hover {
      background-color: rgb(179, 134, 0);
    }

    label {
      font-weight: 500;
    }

    /* Atur tinggi gambar saat di layar kecil */
    @media (max-width: 767.98px) {
      .image-side {
        height: 200px;
      }

      .image-side img {
        height: 100%;
        object-fit: cover;
      }
    }
  </style>
</head>
<body>

<div class="card login-card">
  <div class="row g-0 flex-column flex-md-row">
    
    <!-- Gambar -->
    <div class="col-md-6 image-side">
      <img src="{{ asset('gambar/login.jpeg') }}" alt="Login Image" />
    </div>

    <!-- Form Login -->
    <div class="col-md-6 form-side">
      <h2 class="text-center">Selamat Datang Admin</h2>

      {{-- Error Login --}}
      @if ($errors->has('login'))
        <div class="alert alert-danger rounded-pill text-center">
          {{ $errors->first('login') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="Masukan email" required autofocus />
          @error('email')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3 position-relative">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <input type="password" class="form-control rounded-pill pe-5" id="password" name="password" placeholder="Password" required />
            <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword()" style="cursor: pointer;">
              <i class="bi bi-eye-slash" id="toggleIcon"></i>
            </span>
          </div>
          @error('password')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-custom w-100 rounded-pill">Login</button>
      </form>
    </div>

  </div>
</div>

<script>
  function togglePassword() {
    const passwordField = document.getElementById("password");
    const toggleIcon = document.getElementById("toggleIcon");
    const isPassword = passwordField.type === "password";

    passwordField.type = isPassword ? "text" : "password";
    toggleIcon.classList.toggle("bi-eye");
    toggleIcon.classList.toggle("bi-eye-slash");
  }
</script>

</body>
</html>
