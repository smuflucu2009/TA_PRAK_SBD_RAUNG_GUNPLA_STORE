<!DOCTYPE html>
<html lang="en">
<head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/gunpla">Gunpla</a>
                  </li>
              <li class="nav-item">
                <a class="nav-link" href="/pembeli">Pembeli</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/gudang">Gudang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/join">Join</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <title>Gunpla Store</title>
</head>
<body style="background-image: url('https://r4.wallpaperflare.com/wallpaper/573/370/427/mobile-suit-gundam-mech-rx-78-gundam-gunpla-anime-hd-wallpaper-294048fd412aed3b06a7d89ff011f69d.jpg')">
    <div class="container py-5">
        @include('template/pesan')
        @yield('inti_data')
    </div>
</body>
</html>