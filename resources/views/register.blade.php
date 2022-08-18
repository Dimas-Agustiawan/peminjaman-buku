<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    {{-- CDN daisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.22.0/dist/full.css" rel="stylesheet" type="text/css" />
    {{-- End CDN daisyUI --}}
</head>
<body>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
          <div class="card flex-shrink-0 w-96 max-w-sm shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="/buat-akun" method="post">
                  @csrf
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Nama</span>
                      </label>
                      <input type="text" name="nama" placeholder="masukkan nama" class="input input-bordered" />
                      <label class="label">
                        <span class="label-text">Email</span>
                      </label>
                      <input type="text" name="email" placeholder="masukkan email" class="input input-bordered" />
                    </div>
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Password</span>
                      </label>
                      <input type="password" name="password" placeholder="masukkan password" class="input input-bordered" />
                      <label class="label">
                        <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                      </label>
                    </div>
                    <div class="form-control mt-3">
                        <button class="btn btn-primary">Buat Akun</button>
                    </div>
                    <a href="/">
                      <button type="button" class="btn btn-outline mt-3 w-full">Login</button>
                    </a>
                </form>

            </div>
          </div>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>