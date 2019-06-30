<style>
    .login-page::before {
        content: '';
        width: 100%;
        height: 100%;
        display: block;
        z-index: -1;
        background: url(<?php echo $this->Html->url('/img/bg.jpg',true) ?>);
        background-size: cover;
        -webkit-filter: blur(10px);
        filter: blur(10px);
        z-index: 1;
        position: absolute;
        top: 0;
        right: 0;
    }
</style>
<!DOCTYPE html>
<html>
<body>

<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>Jannat Motors</h1>
                            </div>
                            <p>Faridpur</p>
                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form method="post" class="form-validate">
                                <div class="form-group">
                                    <input id="login-username" type="email" name="data[User][email]" required data-msg="Please enter your username" class="input-material" placeholder="Email">
                                    <label for="login-username" class="label-material"></label>
                                </div>
                                <div class="form-group">
                                    <input id="login-password" type="password" name="data[User][password]" required data-msg="Please enter your password" class="input-material" placeholder="Password">
                                    <label for="login-password" class="label-material"></label>
                                </div>
                                <!--                                <a id="login" href="index.html" class="btn btn-primary">Login</a>-->
                                <button type="submit"  class="btn btn-outline-primary btn-block">Login</button>
                                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                            </form>
                            <!--<a href="<?php echo $this->Html->url('/password') ?>" class="forgot-pass">Forgot Password?</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights text-center">
        <p>Developed by <a href="https://xorbd.com" class="external">XOR Software Solution</a>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
    </div>
</div>
</body>
</html>