<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://ih1.redbubble.net/image.35269931.6337/mp,550x550,gloss,ffffff,t.3u4.jpg">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="center-block text-align">
     <div class="container">
      <form class= "form-horizontal" action="<?php echo $current_file; ?>" method="POST">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          <h2 class="form-signin-heading">Please sign in</h2>
          <label for="inputUsername">Username</label>
          <input type="username" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
          <label for="inputPassword">Password</label>
          <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
          <button class="btn btn btn-danger btn-block" type="submit">Sign in</button>
        </div>
        <div class="col-lg-4"></div>
      </form>
     </div> <!-- /container -->
  </div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
