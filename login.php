
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Petfoodshop</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min_1.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Kanit', sans-serif;
                background: url(./images_logo/imagepet.jpg);
                background-repeat: no-repeat;
                background-size: cover ;
            }
            #aa:link {
                text-decoration: none;
            }

            #aa:visited {
                text-decoration: none;
                color: #666666;
            }

            #aa:hover {
                text-decoration: underline;
                color: #666666;
            }

            #aa:active {
                text-decoration: underline;
            }

        </style>
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
        <link href="new.css" rel="stylesheet">
    </head>
    <body>
        <main class="form-signin">
            <h1 class="text-center"><a id="aa" href="index.php">FoodPetShop</a></h1>
            <form name="frmlogin"  method="post" action="Clogin.php">
<!--                <img class="mb-4" src="./images_logo/logo.jpg" alt="" width="72" height="57">-->
                <h1 class="h3 mb-3 fw-normal text-center" style="color: #666666">ลงชื่อเข้าใช้</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ชื่อผู้ใช้" name="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                </div>
                <button class="w-100 btn btn-lg btn-outline-secondary" type="submit">Login</button>
                <hr>
                <div class="text-center"><a class="w-100 btn btn-lg btn-outline-secondary" href="Register.php">สมัครสมาชิก</a></div>
            </form>
        </main>



    </body>
</html>
