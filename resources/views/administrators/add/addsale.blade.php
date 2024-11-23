@extends('administrators.layouts.master')
@section('main-content')
<section class="crancy-adashboard crancy-show">
    @if(Session::has('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{!! Session::get('success') !!}</strong>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    <br>
    <form role="form" method="POST" action="{{ route('store.sale') }}">
        @csrf
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
@endsection
