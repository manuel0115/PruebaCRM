<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form id="frmLogin" name="frmLogin">
                    <div class="login-form-head">
                        <h4>Iniciar Sesion</h4>
                        <p>Prueba CRM</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="email">Correo electronico</label>
                            <input type="email" id="email" name="email" required>
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="pass">Password</label>
                            <input type="password" id="pass" name="pass" required>
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Iniciar sesion <i class="ti-arrow-right"></i></button>
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/parsley.js"></script>
    <script src="assets/js/notify.js"></script>
    
    <script>
        
        const inputEmail = $("#email");
        const inputPass = $("#pass");
        const instancia_formulario_parsley=$('#frmLogin').parsley();

        $("#frmLogin").on("submit",validarFormualario);

        function validarFormualario(e){
            e.preventDefault();
           
            if(!instancia_formulario_parsley.isValid()){
                return;
               
            } 


            datosUsuario ={
                email:inputEmail.val(),
                pass:btoa(btoa(btoa(inputPass.val())))

            }
            
           
            comprobarUsuario(datosUsuario);
        }

        function comprobarUsuario(datosUsuario){
            $.post("login/iniciarSession",datosUsuario,redireccionarInicio,"json");

        }

        function redireccionarInicio(datos){
            if(datos['codigo'] ==0){
                console.log("si");
                $.notify(datos['mensaje'], "success");
                setTimeout(()=>{
                   window.location.href="inicio"; 
                },3000)
            }else{
                console.log(datos['mensaje'] )
               for(errores in datos['mensaje'] ){
                $.notify(`${datos['mensaje'][errores]}`, "danger");
               }
            }
        }
    </script>
    
    
</body>

</html>