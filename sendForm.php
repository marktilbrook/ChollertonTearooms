<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Send Form Script</title>
  </head>
  <body style="background-color: #bac884;">

    <?php
    // this connects to the database and checks if there is an error
    include 'database_conn.php';

     // delcare and check that the variables are not null
    $forename = isset($_REQUEST['forename']) ? $_REQUEST['forename'] : null;
    $surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : null;
    $postalAddress = isset($_REQUEST['postalAddress']) ? $_REQUEST['postalAddress'] : null;
    $landLineTelNo = isset($_REQUEST['landLineTelNo']) ? $_REQUEST['landLineTelNo'] : null;
    $mobileTelNo = isset($_REQUEST['mobileTelNo']) ? $_REQUEST['mobileTelNo'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $sendMethod = isset($_REQUEST['sendMethod']) ? $_REQUEST['sendMethod'] : null;
    $catID = isset($_REQUEST['catID']) ? $_REQUEST['catID'] : null;

     //this checks that the fields are not empty
    if (empty($forename) || empty($surname) || empty($postalAddress)
    || empty($mobileTelNo) || empty($email) || empty($sendMethod) || empty($catID))
    {
    	echo "<p>Details missing! Try again.";
    }
    else {
      //this creates the sql query to be used
      $insertSQL = "INSERT INTO CT_expressedInterest (forename, surname, postalAddress,
         landLineTelNo, mobileTelNo, email, sendMethod, catID) VALUES ('$forename',
            '$surname','$postalAddress', '$landLineTelNo', '$mobileTelNo',
             '$email', '$sendMethod', '$catID')";

   	  //This calls the query method and checks that it works.
      //After the method is called, the user is redirected to see information about their
      // request form which they just submitted.
      if ($dbConn->query($insertSQL) === TRUE) {
        $style='border: 1px black dashed; display:inline-block; width:auto';
        echo "<p><b>Your feedback request has been added into our system!</b></p>";
        echo "<p><b>Your feedback request is as follows:</b></p>";
        echo "<br><p style='{$style}'><b><u>Forename:</u></b> $forename  <b><u>Surname:</u></b> $surname</p>";
        echo "<br><p style='{$style}'><b><u>Postal Address:</u></b> $postalAddress</p>";
        echo "<br><p style='{$style}'><b><u>Landline Tel No:</u></b> $landLineTelNo</p>";
        echo "<br><p style='{$style}'><b><u>Mobile Tel No:</u></b> $mobileTelNo</p>";
        echo "<br><p style='{$style}'><b><u>Email:</u></b> $email</p>";
        echo "<br><p style='{$style}'><b><u>Send Method:</u></b> $sendMethod</p>";
        echo "<br><p style='{$style}'><b><u>Category of Info:</u></b> $catID</p>";

        //these statments display an image appropriate to what category of information they have selected
        if ($catID == 'c1') {
          echo "<br><br><p style='font-size: 26px'><b>You have selected information regarding our Tea Room</b></p>";
          echo '<img src="tearoom.jpg" alt="tearoom" />';
        }
        elseif ($catID == 'c2') {
          echo "<br><br><p style='font-size: 26px'><b>You have selected information regarding our Craft Shop</b></p>";
          echo '<img src="craftshop.jpg" alt="craftshop" />';
        }
        elseif ($catID == 'c3') {
          echo "<br><br><p style='font-size: 26px'><b>You have selected information regarding our Village Store</b></p>";
          echo '<img src="villagStore.jpg" alt="village store" />';
        }
        elseif ($catID == 'c4') {
          echo "<br><br><p style='font-size: 26px'><b>You have selected information regarding our Post Office</b></p>";
          echo '<img src="postOffice.jpg" alt="craftshop" />';
        }
        else {
          echo "<br><br><p style='font-size: 26px'><b>You have selected information regarding our Bed and Breakfast</b></p>";
          echo '<img src="bed.jpg" alt="bed and breakfast" />';
        }
      }
      else {
        echo "Details not added" .$dbConn->error;
      }
   		mysqli_close($dbConn);
    }









     ?>

  </body>
</html>
