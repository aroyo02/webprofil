<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
      background-color: #ffff; /* Warna card */
    }
    .image-side img {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }
    .form-side {
      padding: 3rem;
    }
    .form-side h2 {
      margin-bottom: 1.5rem;
      color: #000000; /* Warna teks heading */
    }
    .btn-custom {
      background-color: #ffc107;
      color: white;
      border: none;
    }
    .btn-custom:hover {
      background-color: #e0a800;
    }
    label {
      font-weight: 500;
    }
  </style>
</head>
<body>

<div class="card login-card">
  <div class="row g-0">
    <!-- Gambar dengan <img src> -->
    <div class="col-md-6 image-side d-none d-md-block">
      <img src="{{ asset('gambar/login.jpeg') }}" alt="Login Image" />
    </div>

    <!-- Form Side -->
    <div class="col-md-6 form-side">
      <h2 class="text-center">Welcome Admin</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="Enter email" required autofocus />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="Password" required />
            </div>
            <button type="submit" class="btn btn-custom w-100 rounded-pill">Login</button>
        </form>
    </div>
  </div>
</div>

</body>
</html>
