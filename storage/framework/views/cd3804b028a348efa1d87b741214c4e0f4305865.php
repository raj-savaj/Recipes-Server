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
                        <div class="card-header">Update Menu</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Menu</h3>
                                </div>
                                <hr>
                                <form  action="<?php echo e(url('UpdateMenu')); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="mid" value="<?php echo e($menu[0]->id); ?>">
                                    <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Gujrati)</label>
                                        <input value="<?php echo e($menu[0]->name_Gujrati); ?>" id="ngujrati" name="nameG" type="text" class="form-control">
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Hindi)</label>
                                        <input value="<?php echo e($menu[0]->name_Hindi); ?>" id="Nhindi" name="nameH" type="text" class="form-control">
                                    </div>

                                     <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name(Englidh)</label>
                                        <input value="<?php echo e($menu[0]->name_English); ?>" id="Nenglish" name="nameE" type="text" class="form-control">
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
                                            <span id="payment-button-amount">Update Menu</span>
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
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>