<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td img {
            display: block;
            margin: 0 auto;
            max-width: 40px;
            border-radius: 50%;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ddd;
            margin: 0 4px;
            transition: background-color 0.3s;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>THÔNG TIN NHÂN VIÊN</h1>
    <table>
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới Tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
        </tr>
        <?php
        // Danh sách thông tin nhân viên
        $employees = [
            ["A01", "Nguyễn thị Hải", "Nữ", "Hà Nội", "Tài Chính", 600],
            ["A02", "Trần văn Chính", "Nam", "Bình Định", "Quản Trị", 500],
            ["A03", "Lê Trần bạch Yến", "Nữ", "TP HCM", "Tài Chính", 700],
            ["A04", "Trần anh Tuấn", "Nam", "Hà Nội", "Kỹ Thuật", 800],
            ["B01", "Trần thanh Mai", "Nữ", "Hải Phòng", "Tài Chính", 800],
            ["B02", "Trần thị thu Thủy", "Nữ", "TP HCM", "Kỹ Thuật", 700],
            ["B03", "Nguyễn Thị Nở", "Nữ", "Ninh Bình", "Kỹ Thuật", 400]
        ];

        
        // Số lượng nhân viên trên mỗi trang
        $employees_per_page = 5;

        // Xác định trang hiện tại
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Tính toán chỉ số bắt đầu và kết thúc của nhân viên trên trang hiện tại
        $start_index = ($current_page - 1) * $employees_per_page;
        $end_index = $start_index + $employees_per_page - 1;

        // Hiển thị thông tin nhân viên cho từng trang
        for ($i = $start_index; $i <= $end_index && $i < count($employees); $i++) {
            $employee = $employees[$i];
            echo "<tr>";
            echo "<td>{$employee[0]}</td>";
            echo "<td>{$employee[1]}</td>";
            echo "<td>";
            if ($employee[2] === "Nữ") {
                echo "<img src='img/woman.jpg' alt='Woman' style='width: 60px;'>";
            } else {
                echo "<img src='img/man.jpg' alt='Man' style='width: 60px;'>";
            }
            echo "</td>";
            echo "<td>{$employee[3]}</td>";
            echo "<td>{$employee[4]}</td>";
            echo "<td>{$employee[5]}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <!-- Phân trang -->
    