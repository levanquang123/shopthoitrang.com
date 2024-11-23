
<?php $__env->startSection('maininter-content'); ?>
<section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if(session('error')): ?>
                alert("<?php echo e(session('error')); ?>");
            <?php endif; ?>
            <?php if(session('success')): ?>
                alert("<?php echo e(session('success')); ?>");
            <?php endif; ?>
        });
    </script>
    <form action="<?php echo e(route('addToCart')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="detail row">
        <div class="col-6" style="display: flex">
            <div class="col-3">
                <div>
                    <?php if($sanpham->hinhAnhs->isNotEmpty()): ?>
                        <?php $__currentLoopData = $sanpham->hinhAnhs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hinh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="thumbnail" style="margin-left: 30px" >
                                <img class="thumbnail-image" src="<?php echo e(asset('storage/images/' . $hinh->duong_dan)); ?>" alt="<?php echo e($sanpham->ten_san_pham); ?>" onclick="changeMainImage('<?php echo e(asset('storage/images/' . $hinh->duong_dan)); ?>')"
                                style="height: 165px">
                            </div><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p>Không có hình ảnh</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-9">
                <?php if($sanpham->hinhAnhs->isNotEmpty()): ?>
                <input name="image" type="hidden" value="<?php echo e($sanpham->hinhAnhs->first()->duong_dan); ?>">
                    <img id="mainImage" name="image" src="<?php echo e(asset('storage/images/' . $sanpham->hinhAnhs[0]->duong_dan)); ?>" alt="<?php echo e($sanpham->ten_san_pham); ?>">
                <?php else: ?>
                    <p>Không có hình ảnh</p>
                <?php endif; ?>
                <div style="margin-left: 10px">
                    <p><?php echo $sanpham->mo_ta; ?></p>
                  </div>
            </div>
            <script>
                function changeMainImage(imageSrc) {
                    document.getElementById('mainImage').src = imageSrc;
                }
            </script>
        </div>
      <div class="col-6" style="width: 100%; height: 100%;">
        <div>
          <h2 style="font-weight: bold;"><?php echo e($sanpham->ten_san_pham); ?></h2>
          <p style="font-size: 18px; font-weight: bold; color: black">Giá bán:<span style="font-size: 40px; font-weight: 900; color: red" > <?php echo e(number_format( $sanpham->gia_ban,0,'.','.')); ?></span> VND</p>
          <p>
            <div  style="font-size: 20px">Màu sắc: </div><br>
            <div style="margin-left: 10px">
                <?php
                $seenColors = [];
            ?>

            <?php $__currentLoopData = $sanpham->bienThe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bienThe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $maMauChiTiet = $bienThe->mau->ma_mau_chi_tiet;
                    $mamau = $bienThe->mau->ma_mau;
                ?>

                <?php if(!in_array($maMauChiTiet, $seenColors)): ?>
                    <input name="selected_colors[]" type="checkbox" class="color-ck" value="<?php echo e($mamau); ?>" style="background-color: <?php echo e($maMauChiTiet); ?>;"
                           onclick="selectSingleColor(this)">
                    <?php
                        $seenColors[] = $maMauChiTiet;
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </p>
          <div  style="font-size: 20px">Kích thước:</div><br>
         <div style="display: flex; width: 80%; text-align: center; height: 50px; font-weight: bold;font-size: 24px;flex-wrap: wrap;
                        gap: 20px; color: #000">
                <?php
                     $hasSize = false;
                    $displayedSizes = [];
                ?>
                <?php $__currentLoopData = $sanpham->bienThe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bienThe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($bienThe->kichThuoc && !in_array($bienThe->kichThuoc->ma_kich_thuoc, $displayedSizes)): ?>
                    <input name="selected_size[]" type="checkbox" value="<?php echo e($bienThe->kichThuoc->ma_kich_thuoc); ?>" class="size size-option"
                            onclick="selectSize(this)" id="add<?php echo e($bienThe->kichThuoc->ma_kich_thuoc); ?>" style="display: none">
                    <div class="chonsize" id="chonsize<?php echo e($bienThe->kichThuoc->ma_kich_thuoc); ?>" style="border: 1px solid #000; width: 100px; height: 50px;">
                        <label for="add<?php echo e($bienThe->kichThuoc->ma_kich_thuoc); ?>" style="margin-top: 12px"><?php echo e($bienThe->kichThuoc->kich_thuoc); ?></label>
                    </div>
                    <?php
                     $hasSize = true;
                        $displayedSizes[] = $bienThe->kichThuoc->ma_kich_thuoc;
                    ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
      <br>
        <div style="font-size: 20px">Chọn số lượng: </div><br>
            <div style="margin-left: 10px; display: flex">
                <div class="quantity buttons_added form-minimal" style="border: 2px solid black; width: 170px; height: 52px; background-color: white;">
                    <input type="button" value="-" class="minus button is-form" onclick="decreaseQuantity()">
                    <input type="number" id="quantity" step="1" min="1" max="" name="so_luong" value="1" placeholder="" inputmode="numeric" readonly>
                    <input type="button" value="+" class="plus button is-form" onclick="increaseQuantity()">
                </div>
                <div>
                    <input type="hidden" name="ma_san_pham" value="<?php echo e($bienThe->ma_san_pham); ?>">
                    <button type="submit" id="add-to-cart-button" onclick="addToCart()" style="border: 2px solid black; background-color: white; width: 300px; height: 52px; font-size: 20px; font-weight: bold; width: 460px;" title="Thêm vào giỏ hàng">Thêm vào giỏ hàng
                </div>
            </div>
            <br>
            <div style="margin-left: 10px">
                
                </div>
        <br>
      <div>
      </div>
        </div>
      </div>
    </div>
    </form>
    <br>
    <br>

 
        <div style="text-align: center">
            <div class="horizontal-line">
                <hr class="line">
                <h2 style="text-transform: capitalize; font-size: 50px; font-weight: bold">Sản phẩm liên quan</h2><br>
                <hr class="line">
            </div>


            <div class="row" style="display: flex; margin: auto;">

                    <a class="left"  role="button" data-slide="prev" style="margin-top: 10%">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-2">
                        <!-- Hiển thị từng sản phẩm liên quan -->
                        <div class="airi-product product-wrapper">
                            <div class="product-inner">
                                <!-- Hình ảnh sản phẩm -->
                                <figure class="product-image">
                                    <div class="product-image--holder product-img thumbnail">
                                        <a href="<?php echo e(route('increase-view', ['ma_san_pham' => $sp->ma_san_pham])); ?>">
                                            <?php if($sp->hinhAnhs->isNotEmpty()): ?>
                                                <img src="<?php echo e(asset('storage/images/' . $sp->hinhAnhs->first()->duong_dan)); ?>" style="height: 300px" alt="<?php echo e($sp->ten_san_pham); ?>" class="primary-image">
                                                <?php if($sp->hinhAnhs->count() > 1): ?>
                                                    <img src="<?php echo e(asset('storage/images/' . $sp->hinhAnhs[1]->duong_dan)); ?>" style="height: 300px" alt="<?php echo e($sp->ten_san_pham); ?>" class="secondary-image">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/images/' . $sp->hinhAnhs->first()->duong_dan)); ?>" style="height: 300px" alt="<?php echo e($sp->ten_san_pham); ?>" class="secondary-image">
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <img src="default_primary_image_url" alt="<?php echo e($sp->ten_san_pham); ?>" class="primary-image">
                                                <img src="default_secondary_image_url" alt="<?php echo e($sp->ten_san_pham); ?>" class="secondary-image">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </figure>
                                <!-- Thông tin sản phẩm -->
                                <div class="product-info text-center">
                                    <h3 class="product-title popup_cart_title" style="height:42px;">
                                        <a href="<?php echo e(route('increase-view', ['ma_san_pham' => $sp->ma_san_pham])); ?>"><?php echo e($sp->ten_san_pham); ?></a>
                                    </h3>
                                    <!-- Thêm các chi tiết sản phẩm (giá, đánh giá, ...) -->
                                    <div class="product-rating">
                                        <span>
                                            <span class="shopify-product-reviews-badge" data-id="<?php echo e($sp->ma_san_pham); ?>"></span>
                                        </span>
                                    </div>
                                    <span>
                                        <span class="btn btn-danger" style="font-weight:bolder"><?php echo e(number_format($sp->gia_ban, 0, '.', '.')); ?> VNĐ</span>
                                    </span>
                                    <!-- Các đặc điểm khác của sản phẩm -->
                                    <div class="product-color-swatch product-color">
                                        <ul class="grid-color-swatch">
                                            <!-- Swatch màu sắc hoặc các tính năng khác -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a class="right" role="button" data-slide="next" style="margin-top: 10%">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </div>
  </form>
</section>
<br><br>
<script>
// SỐ LƯỢNG
    function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);
            var maxQuantity = parseInt(quantityInput.max);

            if (!maxQuantity || currentQuantity < maxQuantity) {
                quantityInput.value = currentQuantity + 1;
                validateQuantity();
            }
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
                validateQuantity();
            }
        }

        function validateQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);
            var maxQuantity = parseInt(quantityInput.max);
            <?php $__currentLoopData = $sanpham->bienThe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bienThe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                var soLuongTon = parseInt('<?php echo e($bienThe->so_luong_ton); ?>');
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            if (maxQuantity && currentQuantity > maxQuantity) {
                quantityInput.value = maxQuantity;
                currentQuantity = maxQuantity;
            }
            if (currentQuantity > soLuongTon) {
                quantityInput.value = soLuongTon;
            }
        }
// MÀU

// KÍCH THƯỚC


</script>
<style>
    .horizontal-line {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .line {
            flex: 1;
            border: none;
            border-top: 1px solid black; /* Đổi màu sắc hoặc chiều dài tại đây */
            margin: 3px 10px; /* Khoảng cách giữa đường ngang và chữ */
        }

        .text {
            font-family: 'Trebuchet MS', sans-serif;
            font-size: 50px; /* Đổi kích thước font tại đây nếu cần */
            white-space: nowrap; /* Đảm bảo chữ không xuống dòng */
        }
</style>

    <style>
        strong{
            font-weight:bold;
            color: black;
            font-size: 18px
        }
      </style>
      <style>
        .quantity.buttons_added {
            display: flex;
            align-items: center;
        }
        .quantity.buttons_added .button {
            width: 50px;
            height: 50px;
            text-align: center;
            background-color: white;
            border: none;
            font-size: 18px;
            font-weight: bold;
        }

        .quantity.buttons_added input[type="number"] {
            text-align: center;
            width: 70px;
            height: 50px;
            border: none;
            box-sizing: border-box;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    <style>
        .color-ck {
            width: 40px !important;
            height: 40px !important;
            border-radius: 50% !important;
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            outline: none !important;
            cursor: pointer !important;
            border: 2px solid #999 !important;
            margin: 5px !important;
        }

        .color-ck:checked {
            border-color: #000 !important; 
        }
    </style>
    <script>
        function selectSingleColor(checkbox) {
            // Deselect all checkboxes
            const checkboxes = document.querySelectorAll('.color-ck');
            checkboxes.forEach(cb => {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });
        }


    </script>

<style>
    .size {
        margin: 20px;
    }
    .box {
        width: 100px;
        height: 100px;
        background-color: white;
        border: 1px solid black;
    }
</style>

<script>
    function selectSize(checkbox) {
        var checkBoxes = document.querySelectorAll('.size-option');
        var divs = document.querySelectorAll('.chonsize');

        // Uncheck all checkboxes and reset all div styles
        checkBoxes.forEach(function(item) {
            if (item !== checkbox) {
                item.checked = false;
            }
        });
        divs.forEach(function(item) {
            item.style.backgroundColor = '';
            item.style.color = 'black'; // Reset background color
        });

        // Change background color of selected div
        if (checkbox.checked) {
            var divId = 'chonsize' + checkbox.value;
            var selectedDiv = document.getElementById(divId);
            selectedDiv.style.backgroundColor = '#000';
            selectedDiv.style.color = 'white';
        }
    }
    </script>
   

<script>
    function validateSelection() {
        var selectedColors = document.querySelectorAll('input[name="selected_colors[]"]:checked');
        var selectedSizes = document.querySelectorAll('input[name="selected_size[]"]:checked');

        if (selectedColors.length === 0) {
            alert("Vui lòng chọn màu sắc.");
            return false;
        }

        if (selectedSizes.length === 0) {
            alert("Vui lòng chọn kích thước.");
            return false;
        }

        return true;
    }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.maininterface', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\src_ThoiTrang\resources\views/customer/detailinter.blade.php ENDPATH**/ ?>