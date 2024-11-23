<?php
header('Content-Type: application/json'); 

// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'kinhdoanhthoi');
if ($conn->connect_error) {
    echo json_encode(['error' => 'Kết nối cơ sở dữ liệu thất bại!']);
    exit;
}

// Lấy dữ liệu từ request
$ten_khach_hang = $_POST['ten_khach_hang'] ?? null;
$email = $_POST['email'] ?? null;
$so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
$ngay_sinh = $_POST['ngay_sinh'] ?? null;
$dia_chi = $_POST['dia_chi'] ?? null;

// Kiểm tra dữ liệu hợp lệ
if (!$ten_khach_hang || !$email || !$so_dien_thoai) {
    echo json_encode(['error' => 'Vui lòng nhập đầy đủ thông tin!']);
    exit;
}

// Thực hiện câu lệnh SQL cập nhật
$sql = "UPDATE customers SET 
        ten_khach_hang = ?, 
        email = ?, 
        so_dien_thoai = ?, 
        ngay_sinh = ?, 
        dia_chi = ? 
        WHERE ma_khach_hang = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['error' => 'Không thể chuẩn bị câu lệnh SQL!']);
    exit;
}

// Đảm bảo `ma_khach_hang` được truyền từ URL hoặc POST
$ma_khach_hang = $_GET['ma_khach_hang'] ?? null;
$stmt->bind_param('sssssi', $ten_khach_hang, $email, $so_dien_thoai, $ngay_sinh, $dia_chi, $ma_khach_hang);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Cập nhật thông tin thành công!']);
} else {
    echo json_encode(['error' => 'Lỗi khi cập nhật thông tin!']);
}

$stmt->close();
$conn->close();
?>
