<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TRUTH</title>
    <link rel="icon" href="/icon/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      rel="stylesheet"
    />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />

    <style>
        .img_nav_profile{
            height: 36px;
            width: 36px;
            object-fit: cover;
            border-radius: 100px;
        }
        .profile-img{
          /* background-color:blue; */
          border-radius: 24px;
        }
    </style>
  </head>
  <body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
          <a class="navbar-brand" href="/"
            ><span class="fw-bolder text-primary d-md-block d-none"
              >TRUTH</span
            ></a
          >
          <button
            class="navbar-toggler "
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0  fw-bolder">
              @if (!auth()->user())
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-light px-4 py-2" href="/login">Login</a>
                </li>
              @else
                <a href="{{auth()->user()->roles === 'user' ? '/home' : '/admin' }}" class="d-flex align-items-center">
                    <img
                        src="https://ui-avatars.com/api/?name={{auth()->user()->name}}"
                        alt=""
                        class="img_nav_profile"
                    />
                    <div class="fw-bold text-sm  ms-2">
                        {{auth()->user()->name}}
                    </div>
                </a>
              @endif
            </ul>
          </div>
        </div>
      </nav>
      <!-- Header-->
      <header class="">
        <div class="container pb-5">
          <div class="row gx-5 align-items-center">
            <div class="col-xxl-5">
              <!-- Header text content-->
              <div class="text-center text-xxl-start">
                <div
                  class="badge bg-gradient-primary-to-secondary text-white mb-4"
                >
                  <div class="text-uppercase">
                    Lembaga Swadaya Masyarakat
                  </div>
                </div>
                <div class="fs-3 fw-light text-muted">
                  Kota Tangerang Selatan
                </div>
                <h1 class="display-3 fw-bolder mb-5">
                  <span class="text-gradient d-inline"
                    >Tangerang Public Transparency Watch</span
                  >
                </h1>
                <div
                  class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3"
                >
                @if (!auth()->user())
                    <a
                    class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder text-light"
                    href="/login"
                    >Login</a
                    >
                @endif
                  {{-- <a
                    class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder"
                    href="/relawan"
                    >Join Relawan</a
                  > --}}
                </div>
              </div>
            </div>
            <div class="col-xxl-7">
              <!-- Header profile picture-->
              <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                <div class="profile bg-gradient-primary-to-secondary">
                  <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                  <!-- Watch a tutorial on how to do this on YouTube (link)-->
                  <img class="profile-img" src="{{ asset('/img/truth.png') }}" alt="..." />
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- About Section-->
      <section class="bg-light py-5">
        <div class="container px-5">
          <div class="row gx-5 justify-content-center">
            <div class="col-xxl-8">
              <div class="text-center my-5">
                <h2 class="display-5 fw-bolder">
                  <span class="text-gradient d-inline"
                    >Tangerang Public Transparency Watch</span
                  >
                </h2>
                <p class="lead fw-light mb-4">
                  Lembaga Swadaya Masyarakat Tangerang Selatan.
                </p>
                <div class="d-flex justify-content-center fs-2 gap-4">
                  <a class="text-gradient" href="#!"
                    ><i class="bi bi-twitter"></i
                  ></a>
                  <a class="text-gradient" href="#!"
                    ><i class="bi bi-linkedin"></i
                  ></a>
                  <a class="text-gradient" href="#!"
                    ><i class="bi bi-instagram"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto text-center">
      <div class="container">
        <div
          class="row align-items-center justify-content-between flex-column flex-sm-row"
        >
          <div class="col-auto">
            <div class="small m-0">
              Copyright &copy; <a href="/" class="text-dark">Tangerang Public Transparency Watch </a><script>document.write(new Date().getFullYear())</script>
            </div>
          </div>
          <!-- <div class="col-auto">
            <a class="small" href="#!">Privacy</a>
            <span class="mx-1">&middot;</span>
            <a class="small" href="#!">Terms</a>
            <span class="mx-1">&middot;</span>
            <a class="small" href="#!">Contact</a>
          </div> -->
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>

