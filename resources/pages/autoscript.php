<?php
    $xWallet = new Wallet();
    $xGroup = new Group();
  
    $groupWalletValue = $xGroup->getGroupWallet();
  
    for ($row = 0; $row < count($groupWalletValue); $row++) {
      $xWallet->setGroupWallet($groupWalletValue[$row][0], $groupWalletValue[$row][1]);
        }
  } 
  
?>