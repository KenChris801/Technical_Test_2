 <div class="container mt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form method="POST" action="<?= BASE_URL.'/login' ?>" >
            <div class="form-group">
              <label for="username">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?=(isset($email))?$email:''?>">
              <?php if(isset($error)){if($error->input=="email") { ?>
                <p class="text-danger"><?= $error->error; ?></p>
              <?php }} ?>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="<?=(isset($password))?$password:''?>">
              <?php if(isset($error)){if($error->input=="password") { ?>
                <p class="text-danger"><?= $error->error; ?></p>
              <?php }} ?>
            </div>
            <div class="form-group">
              <?php if(isset($server_error)){ ?>
                  <p class="text-danger"><?= $server_error; ?></p>
              <?php } ?>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
