<?php
session_start();

if (isset($_SESSION['User']) and isset($_SESSION['Role'])) {
    if($_SESSION['Role'] == 'admin')
        header("Location: http://localhost/net/form.php");
    if($_SESSION['Role'] == 'school-admin')
         header("Location: http://localhost/net/audience");
}


?>


<title>Login</title>
<script src="scripts/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



</head>

<body onload="initialise()">


<form action="login.php" method="post" id="frm">
    <center>
        <div id="error" style="margin-top:30px;color:red;"></div>
        <div style="width:20%;margin-top:3%;" id="inputs">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" id="username" name="user" required class="form-control" placeholder="User Name">
            </div><br><br>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" id="password" name="pass" required class="form-control" placeholder="Password">
            </div><br>
            <div class="input-group">

                <input type="submit" value="Login" class="btn">
            </div>
            
        </div>
    </center>
</form>
<center><table><tr><td style="margin-right:20px;padding-right:30px;"><a href="Blog/">Login Using Audiance Account</a></td><td style="margin-left:30px"><a href="reset.html">Forgot Password</a></td></tr></table></center><br><br><br>
<script src="scripts/main.js"></script>
<script>
function initialise() {

    document.getElementById('error').innerHTML = document.getElementById('message').innerHTML;

    $('inputs').css('margin-top', '15%');

}

</script>
<style>
    table td
    {
        margin: 20px;
    }
    </style>
</body>


</html>

