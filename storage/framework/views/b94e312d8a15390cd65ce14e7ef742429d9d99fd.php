<
<?php $__env->startSection('title','submenu'); ?>

<?php $__env->startPush('css'); ?>
<style>
.main-content {
    padding-top: 25px !important;
    min-height: 100vh;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row ">
                <div class="offset-md-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">Add New SubMenu</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Sub Menu</h3>
                                </div>
                                <hr>
                                <form  action="<?php echo e(url('savesubmenu')); ?>" method="post" enctype="multipart/form-data">

                                    <div>
                                    <label>Menu</label>
                                    <select name = "drpmenu" id="league" class="form-control">
                                        <?php $__currentLoopData = $menues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($Menu->id); ?>"><?php echo e($Menu->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    </div>

                                     <div>
                                    <label>SubMenu</label>
                                    <select name = "drpmenu" id="league" class="form-control">
                                      
                                    </select>

                                    </div>
                                   
                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">SubMenu Name</label>
                                        <input id="name" name="subname" type="text" class="form-control">
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="simg" class="form-control-file">
                                        </div>
                                    </div>
                                    <div>
                                        <?php echo e(csrf_field()); ?>

                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Add Menu</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        
            function dlt(id){
                if(confirm("Are You Sure Want To Delete ?")){
                    location.href="<?php echo e(url('/delete')); ?>/"+id;
                }

            }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>