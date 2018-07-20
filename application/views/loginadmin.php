<div class="container">
    <div class="col-md-12 content just" style="background-color: grey; color: white; margin-top: 80px">
        <form class="form-signin col-md-6" action="<?php echo base_url('user/login_admin')?>" method="post">
            <h2 class="form-signin-heading">Login Admin</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" class="form-control mt-3" placeholder="Email address" name="user_email" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" class="form-control mt-1" placeholder="Password" name="user_password" required>
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Login</button>
        </form>
    </div>
</div>
