<?php
      if(isset($_POST['username'])){
          $db = new mysqli("localhost", "root", "", "cociname");
          $stmt = $db->prepare("SELECT usuario FROM usuarios WHERE usuario = ? AND password = ?");
          $stmt->bind_param('ss', $_POST['username'], $_POST['password']);
          $stmt->execute();
          $stmt->store_result();

          if($stmt->num_rows() == 1){
              $stmt->bind_result($username);
              $stmt->fetch();
              exit; //salir
              //header("Location: http://www.google.com.ar/"); //con AJAX es inútil
          }
      }
?>
