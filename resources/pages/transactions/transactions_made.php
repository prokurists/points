<br>

<?php
       $xUser = new User();

if ($transactionToCounter < 3){
  $transactionToRow = $transactionToCounter;
}

if (!EMPTY($transactionTo)){
for ($row = 0; $row < $transactionToRow; $row++) {

  echo "
  <div class='card'>
  <div class='card-header'>
  <div class='row'>
  <div class='col-sm-10 align-self-start'>
  <span class='badge badge-danger'>".$transactionTo[$row][1]." POINTS  </span>|
  Sent to: ".$xUser->getUserName($transactionTo[$row][3])."  |
  Comment: ".$transactionTo[$row][0]."</div><div class='col-sm align-self-end'>";

  if ($deleteButtonEnabled){
  echo  "<form action='/' method='POST'>
  <input type='hidden' name='deleteTransactionID' value='".$transactionTo[$row][4]."'>
  <input type='hidden' name='transactionAmount' value='".$transactionTo[$row][1]."'>
  <input type='hidden' name='emailTo' value='".$transactionTo[$row][3]."'>
  <button type='submit' class='ml-2 mb-1 close ' name='deleteTransaction' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button></form>";
  }
  echo "
  </div></div></div></div><br>";
}
echo "<div id='showMoreTo' class='collapse p-15'>";

for ($row = 3; $row < $transactionToCounter; $row++) {
  echo "
  <div class='card'>
  <div class='card-header'>
  <div class='row'>
  <div class='col-sm-10 align-self-start'>
  <span class='badge badge-danger'>".$transactionTo[$row][1]." POINTS </span>
  Sent to: ".$xUser->getUserName($transactionTo[$row][3])."  
  Comment: ".$transactionTo[$row][0]."</div><div class='col-sm align-self-end'>";

  if ($deleteButtonEnabled){
  echo  "<form action='/' method='POST'>
  <input type='hidden' name='deleteTransactionID' value='".$transactionTo[$row][4]."'>
  <input type='hidden' name='transactionAmount' value='".$transactionTo[$row][1]."'>
  <input type='hidden' name='emailTo' value='".$transactionTo[$row][3]."'>
  <button type='submit' class='ml-2 mb-1 close ' name='deleteTransaction' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button></form>";
  }
  echo "
  </div></div></div></div><br>";
}
echo "</div>";
if ($transactionToCounter > 3){

  echo "  
  <a href='#showMoreTo' class='btn btn-dark' data-toggle='collapse'>
   show/hide all
  <span class='badge badge-success'  </span></a>
  ";}
  } else {
  echo "
  <div class='card'>
  <div class='card-header'>
  <p>No rates at this month.</p>
  </div></div>
  ";

}
?>
