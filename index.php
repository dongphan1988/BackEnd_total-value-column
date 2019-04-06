<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    input your array length
    <input type="text" name="valueRow"/>
    input colum you want total value :
    <input type="text" name="valueColumn"/>
    please chosse column
    <input type="text" name="chosseColumn"/>
    <input type="submit" value="CHECK TOTAL"/>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $row = $_POST["valueRow"];
    $column = $_POST["valueColumn"];
    $chosse = $_POST["chosseColumn"];
    $array = [];
    if ($chosse < $column && $column >= 0 && $row >= 0 && $chosse >= 0) {
        for ($index = 0; $index < $row; $index++) {
            $array[] = [];
            for ($index2 = 0; $index2 < $column; $index2++) {
                $array[$index][] = mt_rand(0, 1000);
            }
        }
        showArray($array);
        indexEqual($array, $chosse);
        totalValueIn1Column($array, $chosse);
    } else {
        echo "pls again, column and row and chosse >=0, chosse <row !  ";
    }
}
// Hàm tính tổng các giá trị trên một cột mà bạn chọn;
function totalValueIn1Column($array, $chosse)
{
    echo "<h3>Total value in  one column</h3><br>";
    $total = 0;
    for ($index = 0; $index < count($array); $index++) {
        $total += $array[$index][$chosse];
    }
    echo $total;
}

// Hàm in ra các vị trí trong mảng
function showArray($array)
{
    echo "<h1>Your Array : </h1>";
    for ($index = 0; $index < count($array); $index++) {
        for ($index1 = 0; $index1 < count($array[$index]); $index1++) {
            echo "($index , $index1)" . " = " . $array[$index][$index1] . "<br>";
        }
    }
}

// Hàm in ra các vị trí trên một cột mà bạn chọn:
function IndexEqual($array, $chosse)
{
    echo "<h2>positions height equal width</h2>";
    for ($index = 0; $index < count($array); $index++) {
        echo "($index , $chosse) = " . $array[$index][$chosse] . "<br>";

    }

}

?>
</body>
</html>
