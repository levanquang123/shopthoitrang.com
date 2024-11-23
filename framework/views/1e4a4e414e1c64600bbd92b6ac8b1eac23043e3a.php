
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
    <form role="form" method="POST" action="<?php echo e(route('store.sale')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label class="input-label" for="PhanTram">Phần trăm khuyến mãi</label>
            <input type="text" id="PhanTram" name="phan_tram_khuyen_mai" class="form-control" placeholder="Ví dụ 20" required>
            <label class="input-label" for="GiaApDung">Mức giá sử dụng khuyến mãi</label>
            <input type="text" id="GiaApDung" name="gia_ap_dung" class="form-control" placeholder="chỉ cần nhập giá tiền để dùng khuyến mãi." required>
            <label class="input-label" for="Mota">Mô tả</label>
            <input type="text" id="Mota" name="mo_ta" class="form-control" required>
            <label class="input-label" for="MaAD">Mã áp dụng</label>
            <input type="text" id="MaAD" name="ma_ap_dung" class="form-control" required>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary" style="width: 150px;">Thêm mới</button>
        </div>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrators.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/add/addsale.blade.php ENDPATH**/ ?>