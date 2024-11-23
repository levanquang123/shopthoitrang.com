
<?php $__env->startSection('main-content'); ?>
<section class="crancy-adashboard crancy-show">
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong><?php echo Session::get('success'); ?></strong>
        </div>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong><?php echo e(Session::get('error')); ?></strong>
        </div>
    <?php endif; ?>
    <br>
    <form role="form" method="POST" action="<?php echo e(route('store.size')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label class="input-label" for="kichThuoc">kích thước</label>
            <input type="text" id="Kichthuoc" name="kich_thuoc" class="form-control" required>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" style="width: 150px;">Thêm mới</button>
        </div>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrators.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/add/addsize.blade.php ENDPATH**/ ?>