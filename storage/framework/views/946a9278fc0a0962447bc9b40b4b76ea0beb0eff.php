<?php $__env->startSection('content'); ?>     
<div class="row">
  <div class="col-sm-9"></div>
  <div class="col-sm-3 margintop">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser" >Add User</button>
  </div>
</div>
<div class="row" >
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    
    <?php if(Session::has('editmessage')): ?>
    <div class="alert alert-warning">
      <?php echo e(Session::get('editmessage')); ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>

    <?php if(Session::has('message')): ?>
    <div class="alert alert-success">
      <?php echo e(Session::get('message')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
    <?php endif; ?>
    <?php if(Session::has('deletemessage')): ?>
    <div class="alert alert-danger">
      <?php echo e(Session::get('deletemessage')); ?>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
          <tr>
              <td><?php echo e($user->id); ?></td>
              <td><?php echo e($user->name); ?></td>
              <td><?php echo e($user->email); ?></td>
              <td>
                <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.user.show',$user->id)); ?>">
                  <i class="fa fa-eye"></i>
                </a>
               <?php if( auth()->user()->id!=$user->id): ?>
               
              <button class="btn btn-xs btn-warning" data-username="<?php echo e($user->name); ?>" data-useremail="<?php echo e($user->email); ?>"  data-userid="<?php echo e($user->id); ?>"  data-useremail="<?php echo e($user->email); ?>" data-toggle="modal" data-target="#edituser" >
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-xs btn-danger"  data-username="<?php echo e($user->name); ?>" data-userid="<?php echo e($user->id); ?>"  data-useremail="<?php echo e($user->email); ?>" data-toggle="modal" data-target="#deleteuser" >
                <i class="fa fa-trash"></i>
              </button>
              <?php else: ?>
              <button class="btn btn-xs btn-warning" disabled >
                <i class="fa fa-pencil"></i>
              </button>
              <button class="btn btn-xs btn-danger"  disabled >
                <i class="fa fa-trash"></i>
              </button>
                <?php endif; ?>
              </td>

          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      <tfoot>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
          </tr>
      </tfoot>
    </table>
  </div>
<div class="col-sm-3"></div>
</div>
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('admin.user.add')); ?>" method="POST"  enctype="multipart/form-data" autocomplete="off" >
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="user-name" class="col-form-label">User Neme:</label>
            <input type="text" class="form-control"name="user-name" id="user-name" required  autofocus autocomplete="off" >
          </div>
          <div class="form-group">
            <label for="user-email" class="col-form-label">User Email:</label>
            <input type="email" class="form-control" name="user-email" id="user-email" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="user-name" class="col-form-label">User Password:</label>
            <input type="password" class="form-control"name="user-pass"  autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*_=+-])(?=.*[A-Z]).{8,}" id="user-pass" required>
          </div>
          <div class="form-group">
            <label for="user-image" class="col-form-label">User Image:</label>
            <input type="file" class="form-control" name="user-image"  id="user-image" required>
          </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit"   class="btn btn-success">Add User</button>
      <div class="alert alert-danger" id="message">
        <h4>Password must following pattern:</h4>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="character" class="invalid">A <b>character(!@#$%^&*_=+-)</b></p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
      </div>

    </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('admin.user.update')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="user-name" class="col-form-label">User Neme:</label>
            <input type="text" class="form-control"name="user-name" id="username" required>
          </div>
          <div class="form-group">
            <label for="user-email" class="col-form-label">User Email:</label>
            <input type="email" class="form-control" name="user-email" id="useremail"  required>
          </div>
          <input type="hidden" name="userid"  id="userid" >
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit"   class="btn btn-success">Edit User</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <form action="<?php echo e(route('admin.user.delete')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>


          <h3 class="text-white"> Do you want to delete? </h3>
          <h3 >
           <span class="text-white">Id:</span>  <strong><span id="userDeleteid"></span></strong>
          </h3>
          <h3 >
            <span class="text-white">User name:</span> <strong><span id="userDeleteusername"></span></strong>
          </h3>
          <h3 >
            <span class="text-white">Email:</span> <strong><span id="userDeleteuseremail"></span></strong>
          </h3>
          <input type="hidden" name="userid"  id="userid" >

      </div>
      <div class="modal-footer bg-warning">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit"   class="btn btn-danger">Delete User</button>
      </div>
        </form>
    </div>
  </div>
</div>
<script>

$('#adduser').on('shown.bs.modal', function (event) {

var password = document.getElementById("user-pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var character = document.getElementById("character");
var number = document.getElementById("number");
var length = document.getElementById("length");
var message =   document.getElementById("message");
var allvalid1,allvalid2,allvalid3,allvalid4,allvalid5=null;


password.onfocus = function() {
  document.getElementById("message").style.display = "block";
}
password.onblur = function() {
  document.getElementById("message").style.display = "none";
}
password.onkeyup = function() {

  // Validate lowercase letters 
  var lowerCaseLetters = /[a-z]/g;
  if(password.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
    allvalid1=1;
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
    allvalid1=0;
  }
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(password.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
    allvalid2=1;
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
    allvalid2=0;
  }
  // Validate characters
  var characters = /[!@#$%^&*_=+-]/g;
  if(password.value.match(characters)) {  
    character.classList.remove("invalid");
    character.classList.add("valid");
    allvalid3=1;
  } else {
    character.classList.remove("valid");
    character.classList.add("invalid");
    allvalid3=0;
  }
  // Validate numbers
  var numbers = /[0-9]/g;
  if(password.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
    allvalid4=1;
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
    allvalid4=0;
  }
   // Validate length
   if(password.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    allvalid5=1;
  } 
  else {
    length.classList.remove("valid");
    length.classList.add("invalid");
    allvalid5=0;
  }
  if((allvalid5==1) && (allvalid1==1) && (allvalid2==1) && (allvalid3==1) && (allvalid4==1)){
    message.classList.remove("alert-danger");
    message.classList.add("alert-success");
  }
  else{
    message.classList.remove("alert-success");
    message.classList.add("alert-danger");
  }
}
  
})
  $('#edituser').on('shown.bs.modal', function (event) {

    var button=$(event.relatedTarget)
    var usernamee=button.data('username')
    var useremail=button.data('useremail')
    var userid=button.data('userid')
    console.log(username)
    var modal=$(this)
    document.getElementById("userid").innerHTML=userid;
    modal.find('.modal-body #username').val(usernamee)
    modal.find('.modal-body #useremail').val(useremail)
    modal.find('.modal-body #userid').val(userid)

})
  $('#deleteuser').on('shown.bs.modal', function (event) {

    var button=$(event.relatedTarget)
    var usernamee=button.data('username')
    var userid=button.data('userid')
    var useremail=button.data('useremail')
    document.getElementById("userDeleteid").innerHTML =userid;
    document.getElementById("userDeleteusername").innerHTML =usernamee;
    document.getElementById("userDeleteuseremail").innerHTML =useremail;
    var modal=$(this)
    modal.find('.modal-body #userid').val(userid)

})
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/sparelabs/resources/views/admin/user/welcome.blade.php ENDPATH**/ ?>