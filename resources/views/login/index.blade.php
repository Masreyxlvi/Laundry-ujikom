{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>GHS Laundry</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendors') }}/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('vendors') }}/css/signin.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
  <main class="form-signin">
    <form action="/" method="post">
      @csrf
      
      @if(session()->has('error'))
      <div class="alert alert-danger" role="alert">
        {{session('error')  }}
      </div>
      @endif

      <img class="mb-4" src="{{ asset('vendors') }}/assets/images/logo.png" alt="" >
      <h3 class="h3 mb-3 fw-normal">Please sign in</h3>

      <div class="form-floating">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020–2022</p>
    </form>
  </main>


    
  </body>
</html> --}}



<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, material pro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Material Pro is powerful and clean admin dashboard template"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Material Pro Template by WrapPixel</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/materialpro/"
    />
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('vendors') }}/assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link href="{{ asset('vendors') }}/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .form-signin {
        width: 100%;
        /* max-width: 330px; */
        padding: 15px;
        margin: 75px auto;
    }
    </style>
  </head>

  <body>
    <div class="main-wrapper">
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <div class="preloader">
        <svg
          class="tea lds-ripple"
          width="37"
          height="48"
          viewbox="0 0 37 48"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
            stroke="#1e88e5"
            stroke-width="2"
          ></path>
          <path
            d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
            stroke="#1e88e5"
            stroke-width="2"
          ></path>
          <path
            id="teabag"
            fill="#1e88e5"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"
          ></path>
          <path
            id="steamL"
            d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke="#1e88e5"
          ></path>
          <path
            id="steamR"
            d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13"
            stroke="#1e88e5"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          ></path>
        </svg>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
      <div
        class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
        "
        style="
          background: url("{{ asset('vendors') }}/assets/images/big/auth-bg.jpg) no-repeat center
            center;
        "
      >
      <div
      class="
        col-lg-8 col-xl-9
        d-flex
        align-items-center
        justify-content-center
      "
    >
        <main class="form-signin">
          <div class="row justify-content-center w-100 mt-4 mt-lg-0">
            <div class="col-lg-6 col-xl-3 col-md-7">
              <div class="card" id="loginform">
                <div class="card-body">
                  <div class="text-center">
                    <h2>Welcome to GHS Laundry</h2>
                    <p class="text-muted fs-4">
                      Please Sing in
                    </p>
                  </div>
                  @if(session()->has('error'))
                  <div class="alert alert-danger" role="alert">
                    {{session('error')  }}
                  </div>
                  @endif
                  <form
                    class="form-horizontal mt-2 pt-4 needs-validation"
                    novalidate
                    action="./" 
                    method="POST"
                  >
                  @csrf
                    <div class="form-floating mb-3">
                      <input
                        type="email"
                        class="form-control form-input-bg"
                        id="tb-email"
                        placeholder="name@example.com"
                        required
                        name="email"
                      />
                      <label for="tb-email">Email</label>
                      <div class="invalid-feedback">Email is required</div>
                    </div>
    
                    <div class="form-floating mb-3">
                      <input
                        type="password"
                        class="form-control form-input-bg"
                        id="text-password"
                        placeholder="*****"
                        required
                        name="password"
                      />
                      <label for="text-password">Password</label>
                      <div class="invalid-feedback">Password is required</div>
                    </div>
                    <div
                      class="d-flex align-items-stretch button-group mt-4 pt-2"
                    >
                      <button type="submit" class="btn btn-info btn-lg px-4 text-white">
                        Sign in
                      </button>
                      <a
                        href="javascript:void(0)"
                        class="
                          btn btn-lg btn-light-danger
                          text-danger
                          d-flex
                          align-items-center
                          justify-content-center
                          font-weight-medium
                        "
                        ><i class="fab fa-google btn-lg"></i
                      ></a>
                      <a
                        href="javascript:void(0)"
                        class="
                          btn btn-lg btn-light-info
                          text-info
                          d-flex
                          align-items-center
                          justify-content-center
                          font-weight-medium
                        "
                        ><i class="fab fa-facebook-f btn-lg"></i
                      ></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        </main>
  </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- All Required js -->
    <!-- -------------------------------------------------------------- -->
    <script src="{{ asset('vendors') }}/assets/plugins/jquery/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('vendors') }}/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $(".preloader").fadeOut();
      // ---------------------------
      // Login and Recover Password
      // ---------------------------
      $("#to-recover").on("click", function () {
        $("#loginform").hide();
        $("#recoverform").fadeIn();
      });

      $("#to-login").on("click", function () {
        $("#loginform").fadeIn();
        $("#recoverform").hide();
      });

      $("#to-register").on("click", function () {
        $("#loginform").hide();
        $("#registerform").fadeIn();
      });

      $("#to-login2").on("click", function () {
        $("#loginform").fadeIn();
        $("#registerform").hide();
      });

      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
          form.addEventListener(
            "submit",
            function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>
  </body>
</html>



