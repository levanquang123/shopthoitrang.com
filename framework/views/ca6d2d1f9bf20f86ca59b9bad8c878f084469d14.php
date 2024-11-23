
<?php $__env->startSection('main-content'); ?>
<section class="crancy-adashboard crancy-show">
    
    <br>
    <form role="form" method="POST" action="<?php echo e(route('update.sale', ['ma_khuyen_mai' => $khuyenmai->ma_khuyen_mai])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> 
        <div class="form-group">
            <label class="input-label" for="PhanTram">Tên loại sản phẩm</label>
            <input type="text" id="PhanTram" name="phan_tram_khuyen_mai" class="form-control" value="<?php echo e($khuyenmai->phan_tram_khuyen_mai); ?>" required>
            <label class="input-label" for="GiaApDung">Mức giá sử dụng khuyến mãi</label>
            <input type="text" id="GiaApDung" name="gia_ap_dung" class="form-control" value="<?php echo e($khuyenmai->gia_ap_dung); ?>"  required>
            <label class="input-label" for="Mota">Mô tả</label>
            <input type="text" id="Mota" name="mo_ta" class="form-control" value="<?php echo e($khuyenmai->mo_ta); ?>" required>
            <label class="input-label" for="MaAD">Mã áp dụng</label>
            <input type="text" id="MaAD" name="ma_ap_dung" class="form-control" value="<?php echo e($khuyenmai->ma_ap_dung); ?>" required>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" style="width: 100px;">Cập nhật</button>
        </div>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrators.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/edit/editsale.blade.php ENDPATH**/ ?>