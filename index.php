<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <title>Panel</title>
</head>
<!-- mfloriano_19@alu.uabcs.mx  a0uGqZBW!mA1o0 -->
<!-- 239|EUfNYCG4lELxT12u51bovZBwCsrvfmFYPhxAr5fu -->
<body>
    <div class="container">

        <fieldset action="">
            <form method="post" action="app/AuthController.php">
                <legend>
                    Panel access
                </legend>

                <label>Email</label>
                <input name="email" type="email" required>

                <label>Password</label>
                <input name="password" type="password" required>

                <button type="submit">Log in</button>

                <input type="hidden" name="action" value="access">
            </form>
        </fieldset>

    </div>
</body>

</html>