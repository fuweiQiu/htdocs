<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
$spreadsheet = IOFactory::load('/Users/qiufuwei/Desktop/投票系統/投票名單測試檔.xlsx');
$worksheet = $spreadsheet->getActiveSheet();
$data = [];
foreach ($worksheet->getRowIterator() as $row) {
    $rowData = [];
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    foreach ($cellIterator as $cell) {
        $rowData[] = $cell->getValue();
    }
    $data[] = $rowData;
};
$html = '<table>';
foreach ($data as $row) {
    $html .= '<tr>';
    foreach ($row as $cell) {
        $html .= '<td>' . $cell . '</td>';
    }
    $html .= '</tr>';
}
$html .= '</table>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家長會選舉系統</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1 class="header">家長會選舉系統</h1>
    <h5 class="notice">請注意表格若顯示不同步可能為瀏覽器緩存問題</h5>
    <div class="content">
        <div id="tableContainer">
            <?php echo $html?>
        </div>
        <div class="subcontent">
            
        </div>
    </div>
</body>
</html>