<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS SKD Bella Ananda Putri | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./asset/signin.css">
</head>

<body>
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form action="process/auth.php" method="post">

                <h1 class="h3 mb-3 fw-normal my-2">Form Registrasi</h1>

                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" maxlength="10" required>
                    <label for="nisn">NISN</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap" maxlength="50" required>
                    <label for="fullname">Nama Lengkap</label>
                </div>
                <div class="form-floating my-3">
                    <input type="text" class="form-control" id="school" name="school" placeholder="Asal Sekolah" maxlength="50" required>
                    <label for="school">Asal Sekolah</label>
                </div>
                <div class="form-floating  my-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" minlength="5" maxlength="30" required>
                    <label for="username">Username (5 - 30 karakter huruf)</label>
                </div>
                <div class="form-floating  my-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" maxlength="16" required>
                    <label for="password">Password (8 - 16 karakter)</label>
                </div>

                <input class="w-100 btn btn-lg btn-primary" name="submit" value="Register" type="submit"></input>
            </form>
            <br>
            Sudah memiliki akun? <a href="login.php">Login sekarang</a>
        </main>
    </div>
</body>

</html>