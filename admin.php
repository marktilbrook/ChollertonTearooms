<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color: #bac884;">
    <?php
    // this connects to the database and checks if there is an error
    include 'database_conn.php';

    $sql = "SELECT forename, surname, postalAddress, landLineTelNo, mobileTelNo,
    email, sendMethod, catDesc FROM CT_expressedInterest JOIN CT_category
    ON CT_expressedInterest.catID = CT_category.catID
    ORDER BY surname";

    //this calls the query and assigns it to a variable
    $result = mysqli_query($dbConn, $sql);

    //this creates a style for the table and creates the table
    echo "<table style='2px solid black'>";
    echo "<tr>";
    echo '  <th><u>Forename </th>';
    echo '  <th><u>Surname </th>';
    echo '  <th><u>Postal Address </th>';
    echo '  <th><u>Landline Tel No </th>';
    echo '  <th><u>Mobile Tel No </th>';
    echo '  <th><u>Email </th>';
    echo '  <th><u>Send Method </th>';
    echo '  <th><u>Category </th>';
    echo '</tr>';

    //this adds the data into the specific table rows and columns
    while ($Row = mysqli_fetch_assoc($result)) {
      echo '<tr><td>' . $Row['forename'] . '</td><td>' . $Row['surname'] . '</td><td>'
        . $Row['postalAddress'] . '</td><td>'
        . $Row['landLineTelNo'] . '</td><td>'
        . $Row['mobileTelNo'] . '</td><td>'
        . $Row['email'] . '</td><td>'
        . $Row['sendMethod'] . '</td><td>'
        . $Row['catDesc'] . '</td></tr>';
    }
    echo '</table>';
    //this closes the database
    mysqli_close($dbConn);
    ?>

  </body>
</html>
