<
<?php $__env->startSection('title','submenu'); ?>

<?php $__env->startPush('css'); ?>
<style>
.main-content {
    padding-top: 25px !important;
    min-height: 100vh;
}

.ck.ck-editor__main>.ck-editor__editable {
    background: var(--ck-color-base-background);
    height: 200px !important;
    border-radius: 0;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="card-header">Add New SubMenu</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Sub Menu</h3>
                                </div>
                                <hr>
                                <form  action="<?php echo e(url('savesubmenu')); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Menu</label>
                                        <select name = "drpmenu" id="league" class="form-control">
                                            <?php $__currentLoopData = $SubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($Menu->id); ?>"><?php echo e($Menu->name_English); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        </div>
                                        </div>
                                       
                                         <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="name" class="control-label mb-1">Recipes-Gujrati-Name</label>
                                            <input id="name" name="subname" type="text" class="form-control">
                                        </div>
                                        </div>

                                         <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="name" class="control-label mb-1">Recipes-Hindi-Name</label>
                                            <input id="rechindi" name="hindirecipy" type="text" class="form-control">
                                        </div>
                                        </div>

                                         <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="name" class="control-label mb-1">Recipes-English-Name</label>
                                            <input id="receng" name="englishrecipy" type="text" class="form-control">
                                        </div>
                                        </div>

                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col col-md-6">
                                                <label for="file-input" class=" form-control-label">Image</label>
                                                <input type="file" id="file-input" name="simg" class="form-control-file">
                                            </div>
                                        </div>
                                        </div>
                                 
                                                                             
                                        <div class="form-group col-md-12">
                                             <label class="control-label"><b>Gujrati</b></label>
                                            <textarea class="form-control ht" id="ckeditor" name="disgujrati">
                                             
                                            </textarea>
                                        </div>

                                           <div class="form-group col-md-12">
                                            <label for="name" class="control-label"><b>Hindi</b></label>
                                            <textarea class="form-control ht" id="ckeditor1" name="dishindi">

                                             </textarea>
                                        </div>

                                         <div class="form-group col-md-12">
                                            <label for="name" class="control-label mb-1"><b>English</b></label>
                                            <textarea class="form-control ht" id="ckeditor2" name="disenglish">
                                             </textarea>
                                        </div>
                                        <div class="form-group offset-md-4 col-md-4">
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"><span id="payment-button-amount">Add Sub-Menu</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>

                                         <div>
                                            <?php echo e(csrf_field()); ?>

                                                
                                        </div>
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

     <script src="https://cdn.ckeditor.com/4.10.1/full-all/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'disgujrati' );
            CKEDITOR.replace( 'dishindi' );
            CKEDITOR.replace( 'disenglish' );
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>