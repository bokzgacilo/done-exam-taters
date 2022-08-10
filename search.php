<?php
  require_once 'dbconfig.php';

  $keyword = $_POST['keyword'];

  $query = $db->query("SELECT * FROM user
  WHERE username LIKE '$keyword'
  OR lastname LIKE '$keyword'
  OR firstname LIKE '$keyword'
  OR gender LIKE '$keyword'
  OR age LIKE '$keyword'
  OR gender LIKE '$keyword'
  OR contact LIKE '$keyword'
  OR email LIKE '$keyword'
  OR street LIKE '$keyword'
  OR barangay LIKE '$keyword'
  OR municipality LIKE '$keyword'" ) or die("Failed to row row!");

  if ($query){
    echo "No Record.";
  }
  
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
      "; 
    };

?>