<?php

$title = "signup";

ob_start();
?>



<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="POST" action="index.php?action=register">

                <div class="form-outline mb-4">
                  <input type="text" id="userName" class="form-control form-control-lg" />
                  <label class="form-label" for="userName">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="d-flex justify-content-center">
                <a href="index.php?action=getsignup">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                    </a>
                </div>

                    <div>
              <p class="mt-5">Have already an account? <a href="index.php?action=login" class="text-white-50 fw-bold">Login here</a>
              </p>
            </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $content = ob_get_clean();?>
<?php include_once "app/view/layout/layout.php"; ?>