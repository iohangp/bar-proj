<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="<?php echo CSS?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo CSS?>font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo CSS?>nprogress.css" rel="stylesheet">
    <link href="<?php echo CSS?>bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="<?php echo CSS?>jqvmap.min.css" rel="stylesheet"/>
    <link href="<?php echo CSS?>daterangepicker.css" rel="stylesheet">
    <link href="<?php echo CSS?>custom.css" rel="stylesheet">
    <link href="<?php echo CSS?>animate.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" id="login">
                        <h1>Entrar</h1>
                        <div>
                            <input name="user" type="text" class="form-control" placeholder="Usuário" required="" />
                        </div>
                        <div>
                            <input name="pass" type="password" class="form-control" placeholder="Senha" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" onclick="document.getElementById('login').submit();">Login</a>
                            <a class="reset_pass" href="#signup">Esqueci Minha Senha</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-beer"></i> Nome do Sistema</h1>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form method="post">
                        <h1>Recuperar Senha</h1>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" >Enviar</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Já é um membro?
                                <a href="#signin" class="to_register"> Login </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> iDeal HUB!</h1>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
