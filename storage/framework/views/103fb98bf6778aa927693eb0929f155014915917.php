<?php $__env->startSection('title','Menu'); ?>

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
                        <div class="card-header">Add New Menu</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Menu</h3>
                                </div>
                                <hr>
                                <form  action="<?php echo e(url('SaveMenu')); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Gujrati)</label>
                                        <input id="ngujrati" name="nameG" type="text" class="form-control">
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Hindi)</label>
                                        <input id="Nhindi" name="nameH" type="text" class="form-control">
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Englidh)</label>
                                        <input id="Nenglish" name="nameE" type="text" class="form-control">
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="mimg" class="form-control-file">
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
            <div class="row m-t-30">
                <div class="col-md-12">
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Name(GUJRATI)</th>
                                    <th>Name(HINDI)</th>
                                    <th>Name(ENGLISH)</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $menues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($Menu->name_Gujrati); ?></td>
                                    <td><?php echo e($Menu->name_Hindi); ?></td>
                                    <td><?php echo e($Menu->name_English); ?></td>
                                    <td><img style="width: 150px;height: auto" src="<?php echo e(env('BUCKET_URL')); ?><?php echo e($Menu->image); ?>"></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" onclick="upd(<?php echo e($Menu->id); ?>)"  data-placement="top" title="" data-original-title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" onclick="dlt(<?php echo e($Menu->id); ?>)" data-placement="top" title="" data-original-title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
            function upd(id){
                if(confirm("Are You Sure Want To Update ?")){
                    location.href="<?php echo e(url('/UpdateMenu')); ?>/"+id;
                }

            }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>