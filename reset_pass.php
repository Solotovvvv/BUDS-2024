<?php
$forgotPass = $_GET['a'];

$encryption_key = "ThisIsASecretKeyForEncryption123!";

$decrypted_forgotPass = openssl_decrypt($forgotPass, 'aes-256-cbc', $encryption_key, 0, substr($encryption_key, 0, 16));

// echo $decrypted_forgotPass;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Reset Password</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
    <link rel="stylesheet" href="css/templatemo-plot-listing1.css" type="text/css">
</head>

<body>
    <div class="form-group">
        <label for="inputPassword">Enter Your New Password:</label>
        <input type="password" id="inputPassword" class="form-control">

        <label for="inputConfirmPass">Confirm Your New Password:</label>
        <input type="password" id="inputConfirmPass" class="form-control">

        <button type="button" class="small" onclick="resetPass()">Submit</button>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="path-to-mixitup/mixitup.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.richtext.min.js"></script>
    <script src="js/image-uploader.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main1.js"></script>
    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const resetPass = async () => {
            try {
                var password = $("#inputPassword").val();
                var confirmPass = $("#inputConfirmPass").val();

                var payload = {
                    password: password,
                    id: <?php echo $decrypted_forgotPass ?>
                };

                if (password != confirmPass) {
                    Swal.fire({
                        title: 'Warning',
                        text: `the password did'nt match`,
                        icon: 'warning',
                        customClass: {
                            confirmButton: 'swal-confirm-button',
                        },
                        showCancelButton: false,
                    });
                } else {
                    const response = await $.ajax({
                        type: "POST",
                        url: 'controllers/users.php',
                        data: {
                            payload: JSON.stringify(payload),
                            setFunction: 'resetPass'
                        }
                    });

                    // console.log('Response:', response);

                    const jsonResponse = JSON.parse(response);
                    Swal.fire({
                        title: jsonResponse.title,
                        text: jsonResponse.message,
                        icon: jsonResponse.icon,
                        customClass: {
                            confirmButton: 'swal-confirm-button',
                        },
                        showCancelButton: false,
                    }).then((result) => {
                        // Check if the request was successful and then redirect
                        if (result.isConfirmed) {
                            window.location.href = "index.php"; // Change the URL to your desired page
                        }
                    });

                }
            } catch (error) {
                console.error('Error:', error); // Log any errors to the console
            }
        }
    </script>
</body>

</html>