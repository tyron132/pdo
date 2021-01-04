<?php include 'connection.php';?>

<!DOCTYPE html>
<html>
  <head>
    <title>Afficher les données de la table users</title>
    <meta charset="utf-8">
  </head>
  <body>
  <h1>Liste des utilisateurs</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date</th>
        </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['id']); ?></td>
       <td><?php echo htmlspecialchars($row['lastname']); ?></td>
       <td><?php echo htmlspecialchars($row['firstname']); ?></td>
       <td><?php echo htmlspecialchars($row['date']); ?></td>
     </tr>
     <?php endwhile; ?>

   </tbody>
 </table>
  </body>
</html>