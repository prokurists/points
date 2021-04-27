<br>

<?php

if ($transactionToCounter < 3){
  $transactionToRow = $transactionToCounter;
}

if (!EMPTY($transactionTo)){
for ($row = 0; $row < $transactionToRow; $row++) {

  echo "<div class='card'>
  <div class='card-header'>
  <div class='row'>
  <div class='col-sm-2'>
  <span class='badge badge-danger'>-".$transactionTo[$row][1]." POINTS </span>
  </div>
  <div class='col-sm-2'>
  <span class='badge badge-light'>Date: ".$transactionTo[$row][2]."</span>
  </div>
  <div class='col-sm-8'>
  Sent to: ".$transactionTo[$row][3]."";
  if ($deleteButtonEnabled){

echo  "<form action='/' method='POST'>
  <input type='hidden' name='deleteTransactionID' value='".$transactionTo[$row][4]."'>
  <input type='hidden' name='transactionAmount' value='".$transactionTo[$row][1]."'>
  <input type='hidden' name='emailTo' value='".$transactionTo[$row][3]."'>
  <button type='submit' class='ml-2 mb-1 close ' name='deleteTransaction' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button></form>";
}
  echo "</div></div>


  </div>
  <div class='card-body'>
      <p>".$transactionTo[$row][0]."</p>

  </div>

</div><br>";
}
echo "<div id='showMoreTo' class='collapse p-15'>";
for ($row = 3; $row < $transactionToCounter; $row++) {
     echo "<div class='card'>
    <div class='card-header'>
    <div class='row'>
    <div class='col-sm-2'>
    <span class='badge badge-danger'>-".$transactionTo[$row][1]." POINTS </span>
    </div>
    <div class='col-sm-2'>
    <span class='badge badge-light'>Date: ".$transactionTo[$row][2]."</span>
    </div>
    <div class='col-sm-8'>
    Sent to: ".$transactionTo[$row][3]."";
    if ($deleteButtonEnabled){
  
  echo  "<form action='/' method='POST'>
    <input type='hidden' name='deleteTransactionID' value='".$transactionTo[$row][4]."'>
    <input type='hidden' name='transactionAmount' value='".$transactionTo[$row][1]."'>
    <input type='hidden' name='emailTo' value='".$transactionTo[$row][3]."'>
    <button type='submit' class='ml-2 mb-1 close ' name='deleteTransaction' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button></form>";
  }
    echo "</div></div>
  
  
    </div>
    <div class='card-body'>
        <p>".$transactionTo[$row][0]."</p>
  
    </div>
    </div>
  ";
}
echo "</div>";
if ($transactionToCounter > 3){
  echo "  
  <a href='#showMoreTo' class='btn btn-dark' data-toggle='collapse'> show/hide all
    <span class='badge badge-success'  </span></a>
  ";}
  } else {
  echo "<div class='card'>
  <div class='card-header'>
  </div>
  <div class='card-body'>
      <p>No rates at this month.</p>
  </div>
</div>";

}
?>
