<?php $__env->startSection('content'); ?>     
<div class="row">
  <div class="col-sm-9"></div>
  <div class="col-sm-3" style="margin-top:60px">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser" >Add User</button>
  </div>
</div>
<div class="row" >
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
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
        <form action="<?php echo e(route('admin.user.add')); ?>" method="POST"  enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="user-name" class="col-form-label">User Neme:</label>
            <input type="text" class="form-control"name="user-name" id="user-name" required>
          </div>
          <div class="form-group">
            <label for="user-name" class="col-form-label">User Password:</label>
            <input type="password" class="form-control"name="user-pass" id="user-pass" required>
          </div>
          <div class="form-group">
            <label for="user-email" class="col-form-label">User Email:</label>
            <input type="email" class="form-control" name="user-email" id="user-email"  required>
          </div>
          <div class="form-group">
            <label for="user-image" class="col-form-label">User Image:</label>
            <input type="file" class="form-control" name="user-image"  id="user-image" >
          </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit"   class="btn btn-success">Add User</button>
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

    var span = document.getElementById("username"); 
    var userid=button.data('userid')
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