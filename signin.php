<?php include('./view/header.php'); ?>


    <section class="m-3 mt-5 pt-5 ">
      <div class="container h-custom">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="./img/asset/Password.svg" class="img-fluid d-none d-sm-block" alt="login icon" />
          </div>
          <div class="light-bg custom-shadow radius p-3 border my-3 col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form id="loginData">
              <p class="text-center lead fw-bold mb-3 me-3">Sign in with</p>
              <div class="d-flex flex-row align-items-center justify-content-center">
                <button type="button" class="w-50 btn btn-primary btn-floating me-1">
                  <i class="fab fa-facebook-f p-2"></i> Facebook
                </button>
                <button type="button" class="w-50 btn btn-light border btn-floating ms-1">
                  <i class="fab fa-google p-2"></i> Google
                </button>
              </div>
              <div class="divider d-flex align-items-center mb-2 mt-4">
                <p class="text-center fw-bold mx-3 mb-0">Or</p>
              </div>

              
              <div class="my-3 text-center lead">
                <span id="loginResponse"></span>
              </div>

              
              <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="bg-light form-control form-control-lg" placeholder="Enter a valid email address" />
              </div>
              
              <div class="form-outline mb-3">
                <input type="password" name="password" id="password" class="bg-light form-control form-control-lg" placeholder="Enter password" />
              </div>
              <div class="d-flex justify-content-between align-items-center">
                
                <div class="form-check mb-0">
                  <input class="form-check-input me-1" type="checkbox" />
                  <label class="form-check-label">
                    Remember me
                  </label>
                </div>
                <a href=""class="text-body">Forgot password?</a>
              </div>
              <div class="text-center text-lg-start mt-3">
                <button type="button" name="login" id="login" class="btn p-2 btn-primary my-3 w-50 custom-color" style="padding-left: 2.5rem, padding-right: 2.5rem">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/signup"class="text-body text-primary">Register</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>


<?php include('./view/footer.php'); ?>