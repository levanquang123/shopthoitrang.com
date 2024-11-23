
<?php $__env->startSection('main-content'); ?>
<section class="crancy-adashboard crancy-show">
  <div class="container container__bscreen">
      <div class="row" style="display: flex" >
          <div class="col-xxl-8 col-12 crancy-main__column">
              <div class="crancy-body">
                  <div class="crancy-dsinner">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                          <div class="row" style="display: flex">
                              <div class="col-6 col-6 mg-top-30"  >
                                <form role="form" method="POST" action="<?php echo e(route('store.product')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                  <div class="crancy-product-card">
                                      <h4 class="crancy-product-card__title">
                                          Thông tin sản phẩm
                                          <a href="#"><img src="<?php echo e(asset('assets')); ?>/img/alert-circle.svg" /></a>
                                      </h4>
                                      <div class="crancy__item-form--group mg-top-25">
                                          <label class="crancy__item-label crancy__item-label-product">Tên sản phẩm</label>
                                          <input class="crancy__item-input" type="text" id="tenSanPham" name="ten_san_pham" required />
                                      </div>
                                      <div class="crancy__item-form--group mg-top-25">
                                          <label class="crancy__item-label crancy__item-label-product">Loại sản phẩm</label>
                                          <select id="chondanhmuc" name="ma_loai" class="form-control">
                                              <option value="">Chọn loại sản phẩm</option>
                                              <?php
                                              function renderCategoryOptions($categories, $level = 0) {
                                                  foreach ($categories as $item) {
                                                      echo '<option value="' . $item->ma_loai . '">' . str_repeat('-', $level) . ' ' . $item->ten_loai . '</option>';
                                                      if ($item->children->isNotEmpty()) {
                                                          renderCategoryOptions($item->children, $level + 1);
                                                      }
                                                  }
                                              }
                                              renderCategoryOptions($danhmuc);
                                              ?>
                                          </select>
                                      </div>
                                      <div class="crancy__item-form--group mg-top-25">
                                          <label class="crancy__item-label crancy__item-label-product">Giá nhập</label>
                                          <input class="crancy__item-input" type="text" id="giaNhap" name="gia_nhap" required />
                                      </div>
                                      <div class="crancy__item-form--group mg-top-25">
                                          <label class="crancy__item-label crancy__item-label-product">Giá bán</label>
                                          <input class="crancy__item-input" type="text" id="giaBan" name="gia_ban" required />
                                      </div>
                                      <div class="crancy__item-form--group mg-top-25">
                                          <label class="crancy__item-label crancy__item-label-product">Thương hiệu</label>
                                          <input class="crancy__item-input" type="text" id="thuongHieu" name="thuong_hieu" required />
                                      </div>
                                      <div class="crancy__item-form--group mg-top-25">
                                          <label class="crancy__item-label crancy__item-label-product">Chất liệu</label>
                                          <input class="crancy__item-input" type="text" id="chatLieu" name="chat_lieu" required />
                                      </div>
                                      <div class="crancy-product-card">
                                        <h4 class="crancy-product-card__title">
                                            Ảnh sản phẩm
                                            <a href="#"><img src="<?php echo e(asset('assets')); ?>/img/alert-circle.svg" /></a>
                                        </h4>
                                        <div class="crancy-product-card__img">
                                            <div class="row mg-btm-20">
                                                <label>Ảnh sản phẩm</label>
                                                <input type="file" class="form-control" id="duongDan" name="duong_dan[]" multiple required><br>
                                            </div>
                                        </div>
                                            <div >
                                                <label class="crancy__item-label crancy__item-label-product crancy-flex-between">Mô tả</label>
                                                <textarea class="ckeditor" id="editor1" placeholder="" required="required" name="mo_ta"></textarea>
                                            </div>  
                                      <br>
                                      <div style="text-align: center;">
                                          <button type="submit" class="btn btn-primary" style="width: 150px;">Thêm mới</button>
                                      </div>
                                    </div>
                                  </div>
                                 </form> 
                              </div>
                              <div class="col-6 col-6 mg-top-30">
                                <form role="form" method="POST" action="<?php echo e(route('create.productBT')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                <div class="crancy-product-card" >
                                    <h4 class="crancy-product-card__title">
                                        Chi tiết
                                        <a href="#"><img src="<?php echo e(asset('assets')); ?>/img/alert-circle.svg" /></a>
                                    </h4>
                                    <div class="crancy__item-form--group mg-top-25">
                                        <label class="crancy__item-label crancy__item-label-product crancy-flex-between">Sản phẩm
                                           
                                        </label>
                                        <div class="row" style="display: flex">
                                            <div class="form-group col-6">
                                                <label for="ma_mau">Sản phẩm</label>
                                                <input list="browsers" name="ten_san_pham" id="browser">
                                                <datalist id="browsers">
                                                    <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($sp->ten_san_pham); ?>"></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="crancy__item-form--group mg-top-25">
                                        <label class="crancy__item-label crancy__item-label-product crancy-flex-between">Màu sản phẩm
                                            
                                        </label>
                                        <div class="row" style="display: flex">
                                            <div class="form-group col-6">
                                                <label for="ma_mau">Chọn màu sắc:</label>
                                                <select class="form-control" name="ma_mau" id="maMau">
                                                    <option value="">Chọn màu sắc</option>
                                                    <?php $__currentLoopData = $mausac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($ms->ma_mau); ?>"><?php echo e($ms->mau); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="size-selection" class="crancy__item-form--group mg-top-25" style="display: block;">
                                        <label class="crancy__item-label crancy__item-label-product">Kích thước đã chọn</label><br>
                                        <div class="row" id="size-options" style="display: flex; flex-wrap: wrap;">
                                            <?php $__currentLoopData = $kichthuoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group crancy-form-checkbox__added col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                                                    <input class="d-none crancy-form-checkbox" type="checkbox" id="add<?php echo e($kt->ma_kich_thuoc); ?>" name="kich_thuoc" value="<?php echo e($kt->ma_kich_thuoc); ?>" onclick="handleCheckboxClick(this)"/>
                                                    <label class="crancy-form-label" for="add<?php echo e($kt->ma_kich_thuoc); ?>">
                                                        <?php echo e($kt->kich_thuoc); ?>

                                                        <span><i class="fas fa-times"></i></span>
                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <input type="hidden" id="selected_kich_thuoc" name="selected_kich_thuoc" value="">
                                        </div>
                                        <div class="crancy__item-form--group mg-top-25" id="quantity-selection">
                                            <label class="crancy__item-label crancy__item-label-product">Nhập số lượng</label>
                                            <div class="row" style="display: flex;">
                                                <input type="number" min="0" name="so_luong_ton">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="text-align: center">
                                        <button type="submit" class="btn btn-primary" style="width: 150px;">Thêm biến thể</button>
                                    </div>
                                </div>
                                </form>
                                </div>
                              </div>
                          </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<script src="ckeditor/ckeditor.js"></script>
<script>
    function handleCheckboxClick(checkbox) {
        var checkboxes = document.getElementsByName('kich_thuoc');
        var hiddenInput = document.getElementById('selected_kich_thuoc');
        if (checkbox.checked) {
            // Uncheck all other checkboxes
            checkboxes.forEach(function(cb) {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });
            hiddenInput.value = checkbox.value;
        } else {
            hiddenInput.value = '';
        }
    }
</script>


<?php echo $__env->make('administrators.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/administrators/add/addproduct.blade.php ENDPATH**/ ?>