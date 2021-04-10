<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>

<body>
    <?php
    session_start();
    // Retrieve the session variable
    $username = $_SESSION['username'];
    ?>

    <?php
    if (!isset($_SESSION['username'])) {
        header("location:login-form.php");
    }
    ?>

    <div class="container">
        <div class="row profile">
            <div class="col-md-12">
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> Welcome <?php echo $username ?> </div>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="logout.php"> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>