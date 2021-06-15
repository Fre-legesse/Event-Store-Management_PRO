<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Login</title>
<style type="text/css">
body {
  background: #f2f2f2; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #f2f2f2, ##f1f7ed);
  background: -moz-linear-gradient(right, #f2f2f2, ##f1f7ed);
  background: -o-linear-gradient(right, #f2f2f2, ##f1f7ed);
  background: linear-gradient(to left, #f2f2f2, ##f1f7ed);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

img {
width:50px;

}

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form #submit-btn {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: red;
  width: 100%;
  border: 0;
  padding: 15px;
  color: yellow;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form #submit-btn:hover,.form #submit-btn:active,.form #submit-btn:focus {
  background: #43A047;
}

img {
width:50px;

}

</style>

</head>
<body>
   
        

<div class="login-page">
  <div class="form">
    <img src="http://10.10.1.48/document/img/logo.png"> BGI Ethiopia
    <form class="login-form" action="" id="loginForm" method="post" name="loginForm">
        <p><strong>Please enter your computer username and password</strong></p>
      <input id="name" maxlength="100" name="login" type="text" value="" placeholder="Username" />
      <input id="pass" name="pass" type="password" value="" placeholder="Password" />      
        <input id="submit-btn" type="submit" name="login_action" value="Login"/>
    </form>
  </div>
</div>


</body>
</html>
