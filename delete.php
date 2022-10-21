<?php 
session_start();
$title = "Supprimer";
include_once "inc/db.php";
include_once "inc/get-student.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "partial/head.php" ?>
<body>
    <?php include_once "partial/header.php" ?>
    <main class="main-content">
        <h1>Supprimer les informations d'un étudiant</h1>
        <div class="container">
            <?php if($is_valid_id): ?>
                <table class="student">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $telephone; ?></td>
                        <td><?php echo $email; ?></td>
                    </tr>
                </tbody>
            </table>
            <form class="form-delete" action="treatment-delete.php" method="post">
                <input type="submit" name="delete" value="supprimer">
            </form>
            <?php else: ?>
                 <p class="feedback"><?php echo $feedback; ?></p>
            <?php endif; ?>
        </div>
    </main>
    <?php include_once "partial/footer.php" ?>
</body>
</html>