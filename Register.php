
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Register</title>

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
        <link href="signin.css" rel="stylesheet">
    </head>
    <body id="regi">
        <main class="form-signin">
            <h1 class="text-center"><a id="aa" href="index.php">FoodPetShop</a></h1>
            <form name="Register"  method="post" action="addDataUser.php">
<!--                <img class="mb-4" src="./images_logo/logo.jpg" alt="" width="72" height="57">-->
                <h1 class="h3 mb-3 fw-normal text-center" style="color: #666666">สมัครสมาชิก</h1>
                <span id="massage_username"></span>
                <div class="form-floating" id="test2">
                    <input id="s" type="text" class="form-control"  placeholder="ชื่อผู้ใช้" name="Username" autocomplete="off" required>
                    <label for="floatingInput" id="massage_username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control"  placeholder="Password" name="Password" autocomplete="off" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating" id="test">
                    <input type="text" class="form-control"  placeholder="ชื่อจริง" name="Firstname" autocomplete="off" required>
                    <label for="floatingInput">ชื่อจริง</label>
                </div>
                <div class="form-floating" id="test">
                    <input type="text" class="form-control" placeholder="นามสกุล" name="Lastname" autocomplete="off" required>
                    <label for="floatingInput">นามสกุล</label>
                </div>
                <div class="form-floating"id="test" >
                    <input type="text" class="form-control"  placeholder="ชื่อผู้ใช้" name="Address" autocomplete="off" required>
                    <label for="floatingInput">ที่อยู่</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control"  placeholder="099-xxxxxxx" name="Tel" autocomplete="off" pattern="\d*" maxlength="10" minlength="10" required>
                    <label for="floatingInput">เบอร์โทร</label>
                </div>
                <div class="checkbox mb-3">
                </div>
                <button class="w-100 btn btn-lg btn-outline-secondary btn-savee" type="submit">สมัครสมาชิก</button>
            </form>
        </main>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            $('#s').keyup(function () {
                console.log($(this).val());
                var value = $(this).val();
                if (value == "") {
                    $('#massage_username').html('โปรดใส่ชื่อผู้ใช้');
                    $('#massage_username').addClass('text-danger');

                    $('#massage_username').removeClass('text-success');
                    $('.btn-savee').attr('disabled', true)
                } else {
                    $('.btn-savee').attr('disabled', false)
                    $.ajax({
                        method: 'post',
                        url: 'function_ajax.php',
                        data: {value: value, function: 'checkusername'},
                        success: function (data) {
//                            alert(data)
                            if (data > 0) {
                                $('#massage_username').html('มี UserName นี้แล้ว');
                                $('#massage_username').addClass('text-danger');

                                $('#massage_username').removeClass('text-success');
                                $('.btn-savee').attr('disabled', true)
                            } else {
                                $('#massage_username').html('สามารถใข้ UserName นี้ได้');
                                $('#massage_username').addClass('text-success');

                                $('#massage_username').removeClass('text-danger');
                                $('.btn-savee').attr('disabled', false)
                            }
                        }
                    })
                }
            });
        </script>
    </body>
</html>

