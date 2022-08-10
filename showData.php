<?php 
  include 'dbconfig.php';
  
  $sql = "SELECT * FROM user";
  $query = $db->query($sql);

  while($row = $query->fetchArray()){
    echo "
      <tr>
        <td name='username'>@".$row['username']."</td>
        <td>".$row['lastname']."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['age']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['email']."</td>
        <td>".$row['street']."</td>
        <td>".$row['barangay']."</td>
        <td>".$row['municipality']."</td>
      </tr>
    "; }

?>