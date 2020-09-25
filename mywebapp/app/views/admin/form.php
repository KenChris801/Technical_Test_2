<div class="container mt-5">
  <div class="card">
    <div class="card-header"><?= $form ?></div>
    <div class="card-body">
      <?php if(isset($server_error)){ ?>
          <p class="text-danger"><?= $server_error; ?></p>
      <?php } ?>
        <form method="POST" action="<?= $url ?>" >
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?=(isset($username))?$username:''?>">
            <?php if(isset($error)){if($error->input=="username") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=(isset($email))?$email:''?>">
            <?php if(isset($error)){if($error->input=="email") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
            <?php if(isset($error)){if($error->input=="password") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="form-group">
            <label for="c_password">Confirm Password</label>
            <input type="password" class="form-control" id="c_password" name="c_password" value="">
            <?php if(isset($error)){if($error->input=="c_password") { ?>
              <p class="text-danger"><?= $error->error; ?></p>
            <?php }} ?>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </br>
        </br>
        </br>
        </form>
    </div>
  </div>
</div>