<?php 
    session_start();
    if(isset($_SESSION['user']))
    {
        header("Location: home.php");
        exit();
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hellow</title>
</head>

<body>
    <div class="container mt-5">
        <div class="text-center">
            <h2>Login</h2>
        </div>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button id="login" type="button" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    $(function() {
        $("#login").on('click', () => {
            var email = $("#email").val();
            var password = $("#password").val();
            if (email == "" || password == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Email atau password kosong!',
                    text: 'Silakan cek kembali email dan password',
                    timer: 2000
                })
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/controller/AuthController.php',
                    data: {
                        email: email,
                        password: password,
                    },
                    success: (data) => {
                        if (data != 'failed') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login berhasil!',
                                text: 'Anda akan diarahkan ke halaman home',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function(){
                                window.location.replace("home.php");
                            })
                            
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Email atau password Salah!',
                                text: 'Silakan cek kembali email dan password',
                                timer: 2000
                            })
                        }
                    }
                })
            }
        })
    })
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>