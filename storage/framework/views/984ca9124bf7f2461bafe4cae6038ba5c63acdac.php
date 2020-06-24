<!DOCTYPE html>
<html>
<title>Product</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<link href="/bootstrap/bootstrap.min.css" rel="stylesheet" >
<script src="/bootstrap/bootstrap.min.js" ></script>
<script src="/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('/img/Grocery.jpg');
  min-height: 100%;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  background-position: center;
  background-size: cover;
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
a.navbtn:hover, a.navbtn:active {
    background-color: #000080;
}
a.navbtnc:hover, a.navbtn:active {
    background-color: #e40909;
}
</style>
<body>

<div class="bgimg w3-display-container w3-animate-opacity ">
</div>
<?php if(Route::has('login')): ?>
<?php if(!Auth::check()): ?>
<div class="w3-display-topright w3-padding-large w3-xlarge w3-text-white">
  <a class="btn btn-success navbtn" href="login" role="button">Log In</a>
</div>
              <?php else: ?>

        <div class=" w3-display-topright">
          <div class="col-sm-3"></div>
              <?php if(auth()->user()->userrole == 'admin'): ?>
              <div class=" w3-padding-large w3-xlarge w3-text-white">
                <a class="btn btn-success navbtn" href="admin" role="button">Dashboard</a>
            </div>
              <?php endif; ?>
              <div class=" w3-padding-large w3-xlarge w3-text-white">
                <a class="btn btn-secondary navbtnc" href="logout" role="button">Log out</a>
              </div>
            </div>
              <?php endif; ?>
              <?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>

</body>
</html>
<?php /**PATH /home/janith/okto zone/PHP developer/sparelabs/resources/views/layouts/welcome.blade.php ENDPATH**/ ?>