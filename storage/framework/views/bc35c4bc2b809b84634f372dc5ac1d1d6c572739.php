<!DOCTYPE html>
<html>
<title>Admin dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<link href="/bootstrap/bootstrap.min.css" rel="stylesheet" >
<script src="/bootstrap/bootstrap.min.js" ></script>
<script src="/bootstrap/bootstrap.bundle.min.js"></script>
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
.bgimg {
  background-image: url('/img/Grocery.jpg');
  min-height: 100%;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  background-position: center;
  background-size: cover;
}
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -20px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -20px;
  content: "✖";
}
.margintop{
    margin-top: 60px;
  }
  @media  only screen and (max-width: 813px) {
  .margintop{
    margin-top: 110px;
  }
}
@media  only screen and (max-width: 413px) {
  .margintop{
    margin-top: 170px;
  }
}
@media  only screen and (max-width: 270px) {
  .margintop{
    margin-top: 200px;
  }
}
  
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top ">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large"> 
  <a  href="<?php echo e(route('/')); ?>" class="w3-bar-item w3-button w3-padding-large "><i class="fa fa-home w3-margin-right"></i>Home</a>
  <a  href="<?php echo e(route('admin.admin')); ?>" class="w3-bar-item w3-button w3-padding-large <?php if(Request::is('admin')): ?> w3-theme-d4 <?php endif; ?>"><i class="fa fa-dashboard w3-margin-right"></i>Dashboard</a>
  <a  href="<?php echo e(route('admin.user')); ?>" class="w3-bar-item w3-button w3-padding-large  w3-hover-white <?php if(Request::is('admin/user/*')||Request::is('admin/user') ): ?> w3-theme-d4 <?php endif; ?>"><i class="fa fa fa-user w3-margin-right"></i>User</a>
  <a  href="<?php echo e(route('admin.products')); ?>" class="w3-bar-item w3-button w3-padding-large  w3-hover-white <?php if(Request::is('admin/product/*') ||Request::is('admin/product') ): ?> w3-theme-d4 <?php endif; ?>"><i class="fa fa fa-product-hunt w3-margin-right"></i>Product</a>
  <div class="w3-dropdown-hover ">
   <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell w3-margin-right"></i><span class="w3-badge w3-right w3-small w3-green"><?php echo e(count(auth()->user()->unreadnotifications)); ?></span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px" id="markasread" onclick="marknotificationasread()">
        <?php $__currentLoopData = auth()->user()->unreadnotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="/admin/markAsread" class="w3-bar-item w3-button">
        Add new product at <?php echo e($notification->created_at); ?>

    </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <a  href="<?php echo e(route('logout')); ?>" class="w3-bar-item w3-button w3-padding-large  w3-right w3-hover-white"><i class="fa fa fa-sign-out w3-margin-right"></i><?php echo e(__('views.backend.section.header.menu_0')); ?></a>
 </div>
</div>

<?php echo $__env->yieldContent('content'); ?>
<script> 

function marknotificationasread(){ 
    
  alert('All notification mark as read');
  $.get('/admin/markAsread');
    
};
</script>


</body>
</html> 
<?php /**PATH /home/janith/okto zone/PHP developer/sparelabs/resources/views/layouts/app.blade.php ENDPATH**/ ?>