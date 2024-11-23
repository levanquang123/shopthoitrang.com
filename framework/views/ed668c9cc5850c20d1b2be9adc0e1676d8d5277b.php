
<?php $__env->startSection('main-content'); ?>
<section class="crancy-adashboard crancy-show">
    <h2>Thời gian</h2>
    <hr>
    <div class="container container__bscreen">
        <div class="row">  
            <label>Thống kê theo tháng</label>
            <div class="col-6">
                <label>Chọn thời gian bắt đầu</label>
                <input type="date">
            </div>
            <div class="col-6">
                <label>chọn ngày kết thúc</label>
                <input type="date">
            </div>
        <button>Tìm kiếm</button>
        </div>
   
    <hr>
        <div>
            <p>Tổng doanh thu</p>
            <p>Tổng vốn</p>
            <p>Lợi Nhuận</p>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrators.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/list/statistical.blade.php ENDPATH**/ ?>