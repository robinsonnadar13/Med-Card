

<?php
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = "2002-09-27";
  //explode the date to get month, day and year
  $age = floor((time() - strtotime($birthDate)) / 31556926);
  echo $_age;
?>
