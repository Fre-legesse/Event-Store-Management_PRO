@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Login</title>
<style type="text/css">
body {
    margin:0;
    font-family:verdana,sans-serif;
}
h1 {
    margin:0;
    padding:12px 25px;
    background-color:#343434;
    color:#ddd;
}
p {
    margin:12px 25px;
}
strong {
    color:#E0042D;
}
div {
    padding-left:23px;
    font-weight: normal;
    font-size: 8pt;
}
input {
    margin:12px 25px;
}
</style>
</head>
<body>
    <form action="" id="loginForm" method="post" name="loginForm">
        <h1>Login</h1>
        <p><strong>Please enter your username and password or login as a guest.</strong></p>
        <div class="label">Username
            <input id="name" maxlength="100" name="login" type="text" value=""/>
        </div>
        <div class="label" id="label-password">Password
            <input id="pass" name="pass" type="password" value=""/>
        </div>
        <input id="submit-btn" type="submit" name="login_action" value="Submit"/>
        <p><font size=2 >-or-</font></p>
        <input id="login-btn" type="submit" name="guest_action" value="Login as guest"/>
    </form>
</body>
</html>
