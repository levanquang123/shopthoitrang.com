
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
    <form role="form" method="POST" action="<?php echo e(route('store.category')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label class="input-label" for="tenLoai">Tên loại sản phẩm</label>
            <input type="text" id="tenLoai" name="ten_loai" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="input-label" for="chondanhmuc">Chọn danh mục</label>
            <select id="chondanhmuc" name="ma_danh_muc_cha" class="form-control">
                <option value="">Chọn danh mục</option>
                <?php $__currentLoopData = $danhmuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->ma_loai); ?>"><?php echo e($item->ten_loai); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" style="width: 150px; ">Thêm mới</button>
        </div>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrators.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/add/addcategory.blade.php ENDPATH**/ ?>