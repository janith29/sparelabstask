<?php $__env->startSection('content'); ?>     

  
<div >

<img src="/img/Grocery.jpg" alt="Flowers in Chania" style="height: 100%;no-repeat;background-size: cover;min-height: 100%;filter: blur(8px);-webkit-filter: blur(8px);">
<div class="w3-display-middle bg-text" >
  <div class="card bg-primary">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">User count</h4>
    </div>
    <div class="card-body">
      <h4 class="card-title"  style="text-align: center"><?php echo e($counts['user']); ?></h4>
    </div>
  </div>
  <div class="card bg-primary" style="margin-top:60px">
    <div class="card-header bg-info">
      <h4 class="card-title" style="text-align: center">Product count</h4>
    </div>
    <div class="card-body" style="text-align: center">
      <h4 class="card-title"><?php echo e($counts['product']); ?></h4>
    </div>
  </div>
</div>   
</div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/janith/okto zone/PHP developer/sparelabs/resources/views/admin/welcome.blade.php ENDPATH**/ ?>