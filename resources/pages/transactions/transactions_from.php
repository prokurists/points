<br>

<?php
$xTotalSum = $xTransaction->getTotalValue($_SESSION["email"], $monthChoosen);
if ($xTotalSum){
  $totalSumText = "<div class='card'><div class='card-header'>Congratulations! You have received " . $xTotalSum. " POINTS this month!</div></div><br>";
} 

if ($transactionFromCounter < 3){
  $transactionFromRow = $transactionFromCounter;
  
}

if (!EMPTY($transactionFrom)){
  echo "<span class='badge badge-secondary'>Transactions recieved: </span>";
echo $totalSumText;
for ($row = 0; $row < $transactionFromRow; $row++) {
  echo "<div class='card'>
  <div class='card-header'>
  <span class='badge badge-success'>+".$transactionFrom[$row][1]." POINTS</span>
  <small class='text-muted text-right'>".$transactionFrom[$row][2]."</small>

  </div>
  <div class='card-body'>
      <p>".$transactionFrom[$row][0]."</p>
  </div>

</div>

<br>";
}
echo "<div id='showMoreFrom' class='collapse p-15'>";
for ($row = 3; $row < $transactionFromCounter; $row++) {
  echo "<div class='card'>
  <div class='card-header'>
  <span class='badge badge-success'>+".$transactionFrom[$row][1]." POINTS</span>
  <small class='text-muted text-right'>".$transactionFrom[$row][2]."</small>

  </div>
  <div class='card-body'>
      <p>".$transactionFrom[$row][0]."</p>
  </div>

</div>

<br>
";
}
echo "</div>";
function getTotalAmount($totalAmount){
  if ($totalAmount > 1){
    echo "Congratulations! you got".$totalAmount." POINTS this month!";
  } else {
    echo "You got no points this month!";
  }
}
if ($transactionFromCounter > 3){
echo "  
<a href='#showMoreFrom' class='btn btn-dark' data-toggle='collapse'> show/hide all
  <span class='badge badge-success'  </span></a>
";}
} else {
  echo "<div class='card'>
  <div class='card-header'>
  </div>
  <div class='card-body'>
      <p>Unfortunately, there are no ratings this month</p>
  </div>
</div>";
}
?>