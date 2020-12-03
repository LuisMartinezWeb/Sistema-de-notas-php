<!DOCTYPE html>
<html lang="en">
<head>

<?php  $url= base_url(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php $url ?>assets/css/style.css">
    
    <title><?php  $data['page_title']  ?></title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
        <form action="" name="formLogin" id="formLogin" class="sign-in-form">
            <h2 class="title">Iniciar sesión</h2>
            <div class="alertformLogin" >
            </div>
            <div class="input-field validate-login">
                <i class="fas fa-user"></i>
                <input type="text" name="email-login" id="email-login" placeholder="Correo" />
            </div>
            <div class="input-field validate-login">
                <i class="fas fa-lock"></i>
                <input type="password" name="password-login" id="password-login" placeholder="Contraseña" />
            </div>
                <input type="submit" value="Login" class="btn solid" />
                <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </form>
        <form action="" name="formRegister" id="formRegister" class="sign-up-form">
            <h2 class="title">Registrarse</h2>
            <div class="alertform" >
            </div>
            <div class="input-field validate-register ">
                <i class="fas fa-user"></i>
                <input type="text" name="name-register" id="name-register" placeholder="Nombre" />
            </div>
            <div class="input-field validate-register">
                <i class="fas fa-user"></i>
                <input type="text" name="surname-register" id="surname-register" placeholder="Apellidos" />
            </div>
            <div class="input-field validate-register">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email-register" id="email-register" placeholder="Correo Electronico" />
            </div>
            <div class="input-field validate-register">
                <i class="fas fa-lock"></i>
                <input type="password" name="password-register" id="password-register" placeholder="Contraseña" />
            </div>
            <input type="submit" class="btn" value="Registrarse" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
                <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>No Tienes una cuenta ?</h3>
                <p>
                Da click en boton y rellena el formulario de registro, es muy facil!!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                Registrarse
                </button>
            </div>
            <img src="<?php  $url ?>assets/img/undraw_secure_login_pdn4.svg" class="image" alt="" />
        </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Ya tienes una cuenta?</h3>
                    <p>
                    Da  click en el boton para Iniciar sesión
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                    Iniciar sesión
                    </button>
                </div>
                <img src="<?php  $url ?>assets/img/undraw_subscriptions_1xdv.svg"  class="image" alt="" />
            </div>
    </div>
</div>

<script>
    const base_url = "<?= base_url(); ?>";
</script>
<script src="<?php  $url ?>assets/js/Login/ValidateRegister.js"></script>
<script src="<?php  $url ?>assets/js/Login/LoginAnimate.js"></script>

</body>
</html>