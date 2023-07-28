<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/><!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
    <title>hm</title>
</head>
<body class="container">
<?php
require_once('lib/Classes/PHPExcel.php');
$file = 'phapluatFull.xlsx';
//Tiến hành xác thực file
$objFile = PHPExcel_IOFactory::identify($file);
$objData = PHPExcel_IOFactory::createReader($objFile);

//Chỉ đọc dữ liệu
$objData->setReadDataOnly(true);

// Load dữ liệu sang dạng đối tượng
$objPHPExcel = $objData->load($file);

//Lấy ra số trang sử dụng phương thức getSheetCount();
// Lấy Ra tên trang sử dụng getSheetNames();

//Chọn trang cần truy xuất
$sheet = $objPHPExcel->setActiveSheetIndex(0);

//Lấy ra số dòng cuối cùng
$Totalrow = $sheet->getHighestRow();
//Lấy ra tên cột cuối cùng
$LastColumn = $sheet->getHighestColumn();

//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

//Tạo mảng chứa dữ liệu
$data = [];

//Tiến hành lặp qua từng ô dữ liệu
//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
for ($i = 2; $i <= $Totalrow; $i++) {
    //----Lặp cột
    for ($j = 0; $j < $TotalCol; $j++) {
        // Tiến hành lấy giá trị của từng ô đổ vào mảng
        $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
        ;
    }
}

//Hiển thị mảng dữ liệu
// echo '<pre>';
// var_dump($data);
    echo 
'<form action="index.php" method="post" class="mb-5 pt-5">
<div class="input-group shadow">
  <input
    type="text"
    name="keyword"
    class="form-control"
    placeholder="Nhập câu hỏi?"
    aria-label="Keyw"
  />
  <input class="btn btn-outline-primary" type="submit" value="Tìm kiếm">
  <a class="btn btn-outline-danger text-decoration-none" href="/">Xem tất cả</a>

</div>        

    </form>';

if (isset($_POST['keyword'])) {
        $keyword = strtolower($_POST['keyword']);
        // echo "<table border=\"1\">";
        // echo "<tr>";
        // echo "<th>Câu hỏi</th>";
        // echo "<th>Trả lời</th>";
        // // echo "<th>Đáp án</th>";
        // echo "</tr>";
        foreach ($data as $row) {

            if (strstr(strtolower($row[5]), $keyword)) {
                echo "<div class='card '>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>Câu hỏi:</h5>";
                echo "<p class='fs-500'>$row[5]</p>";
               // echo "<p class='card-text'> $row[6] </p>";
                echo "</div>";
                echo "<div class='card-footer'><span class='fw-bold'>Đáp án chính xác:</span> <span class='text-success'>$row[7]</span></div>";
                echo "</div>";
            } 

        }
        // echo "</table>";
    } else{
        echo '<table class="table align-middle mb-0 bg-white">';
// Thêm tiêu đề
echo '<tr>';
echo '<th class="text-warning">Câu hỏi</th>';
echo '<th class="text-primary">Trả lời</th>';
echo '<th class="text-success">Đáp án đúng</th>';
// echo '<th>Tiêu đề cột 4</th>';
echo '</tr>';
// Lặp qua mảng dữ liệu
foreach ($data as $row) {
    // Tạo một dòng mới trong bảng
    echo '<tr>';

    // Lặp qua các cột trong hàng, bỏ qua 3 cột đầu tiên
    for ($i = 5; $i < 8; $i++) {
        // Hiển thị giá trị của cột

        echo '<td class="fw-bold mb-1" style="font-size: 0.9rem">' . $row[$i] . '</td>';
    }

    // Kết thúc dòng
    echo '</tr>';
}

// Kết thúc bảng
echo '</table>';
    
    }


?>

</body>
</html>
