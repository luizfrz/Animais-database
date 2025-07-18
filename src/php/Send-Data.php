<?php
   $servidor = 'Entrada';
   $porta = 3306;
   $user = 'root';
   $password = '';
   $bancozoo = 'Animalesco';

   $conection = new mysqli($servidor, $user, $password, $bancozoo, $porta);
   
   if ($conection->connect_error) {
       die("Conexão falhou, tente novamente: " . $conection->connect_error);
   }
   echo "Conectado com sucesso";
   
   $sendpet = $_POST['sendpet'];

   $putzoo = $conection->prepare("INSERT INTO Entrada (zoopot) VALUES (?)");
   if (!$putzoo) {
       die('Erro na tentativa: ' . $conection->error);
   }
   $putzoo->bind_param("s", $sendpet);
   if (!$putzoo->execute()) {
       die('Erro ao inserir os dados: ' . $putzoo->error);
   }
   $putzoo->close();
   $conection->close();

   header("Location: thanks.html");

   exit();
  ?>
   
   
