
<?php $__env->startSection('main-content'); ?>
<section class="crancy-adashboard crancy-show">
    
    <br>
    <form role="form" method="POST" action="<?php echo e(route('update.category', ['ma_loai' => $danhmuc->ma_loai])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> 
        <div class="form-group">
            <label class="input-label" for="tenLoai">Tên loại sản phẩm</label>
            <input type="text" id="tenLoai" name="ten_loai" class="form-control" value="<?php echo e($danhmuc->ten_loai); ?>" required>
        </div>
        <div class="form-group">
            <label class="input-label" for="chondanhmuc">Chọn danh mục cha</label>
            <select id="chondanhmuc" name="ma_danh_muc_cha" class="form-control">
                <option value="">Chọn danh mục cha</option>
                <?php $__currentLoopData = $danhmucList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->ma_loai); ?>" <?php echo e($item->ma_loai == $danhmuc->ma_danh_muc_cha ? 'selected' : ''); ?>>
                        <?php echo e($item->ten_loai); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" style="width: 100px;">Cập nhật</button>
        </div>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrators.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/edit/editcategory.blade.php ENDPATH**/ ?>