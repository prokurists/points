<br>

<?php
$xTotalSum = $xTransaction->getTotalValue($_SESSION["email"], $monthChoosen);
if ($xTotalSum){
  $totalSumText = "<div class='card'><div class='card-body'>Congratulations! You have received " . $xTotalSum. " POINTS in ".date("F", strtotime($monthChoosen))."!</div></div><br>";
} 



if (!EMPTY($transactionFrom)){
echo $totalSumText;
for ($row = 0; $row < $transactionFromRow; $row++) {
  echo "<div class='card'>
  <div class='card-body'>
  <div class='row'>
  <div class='col-sm'>
  <span class='badge badge-success'>".$transactionFrom[$row][1]." POINTS</span>
  </div>
  <div class='col-sm-8'>
  ".$transactionFrom[$row][0]."
</div></div>
  </div>
</div>

<br>";
}
echo "<div id='showMoreFrom' class='collapse p-15'>";
for ($row = 3; $row < $transactionFromCounter; $row++) {
  echo "<div class='card'>
  <div class='card-body'>
  <div class='row'>
  <div class='col-sm'>
  <span class='badge badge-success'>".$transactionFrom[$row][1]." POINTS</span>
  </div>
  <div class='col-sm-8'>
  ".$transactionFrom[$row][0]."
</div></div>
  </div>
</div>

<br>";
}
echo "</div>";
function getTotalAmount($totalAmount){
  if ($totalAmount > 1){
    echo "Congratulations! you got".$totalAmount." POINTS at ".date("F", strtotime($monthChoosen))."";
  } else {
    echo "You got no points at ".date("F", strtotime($monthChoosen))."";
  }
}
if ($transactionFromCounter > 3){
echo "  
<a href='#showMoreFrom' class='btn btn-dark' data-toggle='collapse'> show/hide all
  <span class='badge badge-success'  </span></a>
";}
} else {
  echo "<div class='card'>

  <div class='card-body'>
      <p>Unfortunately, there are no ratings at ".date("F", strtotime($monthChoosen))."</p>
  </div>
</div>";
}
?>