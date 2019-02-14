<?php
/**
 * Created by PhpStorm.
 * User: smith
 * Date: 2019-02-12
 * Time: 16:12
 */

include('header.php');

if (isset($_POST)) {
    $expenseArray = [];
    $total = 0; // เงินรวม
    $totalIn = 0; // รวมเงินเข้า
    $totalOut = 0; // รวมเงินออก

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["userMail"];
    $namefile = $_FILES['filepath']['type'];

    $mimes = array('text/comma-separated-values','text/csv','application/vnd.ms-excel');

    if (in_array($_FILES['filepath']['type'],$mimes)) {
        echo "<script>
                alert('File type incorrect! - $namefile ');
                window.location.href = \"home.php\";
              </script>>";


    }else{
        $file = fopen($_FILES["filepath"]["tmp_name"], "r") or die("Unable to open file!");

        while (!feof($file)) {
            $line_of_data[] = fgetcsv($file);
        }
        fclose($file);

        $expenseArray = $line_of_data;
        $lap = 0;
        foreach ($line_of_data as $row) {
            if ($lap == 0) {

            } else {
                //echo $row[1].' '.$row[2].' '.$row[3].' '.$row[4].'<br>';
                $type = strtoupper($row[1]);
                if ($type == 'TRUE') {
                    $total += $row[4];
                    $totalIn += $row[4];
                }
                if ($type == 'FALSE') {
                    $total -= $row[4];
                    $totalOut += $row[4];
                }
            }
            $lap++;
        }
    }
}

//    while (!feof($file)){
//        $content=fgetcsv($file);
//        $count=count($content);
//        for ($i=0;$i<$count;$i++){
//            echo $content[$i]."\t";
//        }
//        echo "<br>";
//    }

//    return $expenseArray; // คืนค่า array
//    echo $total.' >>> TOTAL'.'<br>';
//    echo $totalIn.' >>> TOTAL-IN'.'<br>';
//    echo $totalOut.' >>> TOTAL-OUT';

?>

<body>
<div class="container-fluid">
    <div class="card intable cardColor cardStyleMargin">
        <div>
            <h1 class="headerText">Your Expense Summery</h1>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card cardColor text-center colorCardDecore">
                    <div class="card-header" style="font-size: 16px; padding: 8px; font-weight: bold">
                        INFORMATION
                    </div>
                    <div class="card-body" style="font-size: 16px; padding: 8px;"><?php echo 'Name: '.$fname.' '.$lname."<br>"."<div style=\"padding-top: 5px\">E-mail: $email</div>"?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card cardColor text-center colorCardDecore">
                    <div class="card-header" style="font-size: 16px; padding: 8px; font-weight: bold">
                        TOTAL
                    </div>
                    <div class="card-body" style="font-size: 16px; padding: 8px;"><?php echo $total; ?></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card cardColor text-center colorCardDecore">
                    <div class="card-header" style="font-size: 16px; padding: 8px; font-weight: bold">
                        TOTAL INCOME
                    </div>
                    <div class="card-body" style="font-size: 16px; padding: 8px"><?php echo $totalIn; ?></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card cardColor text-center colorCardDecore">
                    <div class="card-header" style="font-size: 16px; padding: 8px; font-weight: bold">
                        TOTAL EXPENSE
                    </div>
                    <div class="card-body" style="font-size: 16px; padding: 8px"><?php echo $totalOut; ?></div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr style="color: white;background-color: #e14641">
                <th scope="col">#</th>
                <th scope="col">TYPE</th>
                <th scope="col">DATE</th>
                <th scope="col">NAME</th>
                <th scope="col">PRICE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 1; $i< sizeof($line_of_data) ; $i++) {
                $typeInput = strtolower($line_of_data[$i][1]);
                if ($i > 0){
                    if ($typeInput == "true") {
                        $type = "Income";
                        $color = "#3ab41c";
                    }else if($typeInput == "false") {
                        $type = "Expense";
                        $color = "#d21b00";
                    }
                    echo "
                    <tr>
                    <td>" . $line_of_data[$i][0] . "</td>
                    <td style='color: ".$color.";'>" . $type . "</td>
                    <td>" . $line_of_data[$i][2] . "</td>
                    <td>" . $line_of_data[$i][3] . "</td>
                    <td>" . $line_of_data[$i][4] . "</td>
                    </tr>
                    ";
                }
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
</body>

