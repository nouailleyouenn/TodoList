<?php 

$sql = 'SELECT * FROM todos';
$result = mysqli_query($conn, $sql);
$todos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php 
foreach ($todos as $todo_item) :?>
<?php if ($todo_item['IsChecked']) :?>
<div class="container">
            <div class="card my-3 w-75 checked">
                <div class="card-body text-center">
                    <p><?php echo $todo_item['Todo']; ?></p>
                    <br>
                    <p class="date">Ajouté le <?php echo $todo_item['JOUR']?>/<?php echo $todo_item['MOIS']?>/<?php echo $todo_item['ANNEE']?> à <?php echo $todo_item['HEURE']?>:<?php echo $todo_item['MINUTE']?> </p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <textarea name="TodoId" id="TodoId" style="display:none" value="IsCheckeID"><?php echo $todo_item['ID']; ?></textarea>
                        <input type="submit" name="UnCheckButton" value="Marquer comme non fait" class="btn btn-dark w-100">
                    </form>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <textarea name="TodoId" id="TodoId" style="display:none" value="IsCheckeID"><?php echo $todo_item['ID']; ?></textarea>
                        <input type="submit" name="Delette" value="Supprimer ce Todo ✖️" class="btn btn-danger w-50 font_size_10">
                    </form>
                </div>
            </div>
</div>
<?php else :?>

    <div class="container">
            <div class="card my-3 w-75 NoChecked">
                <div class="card-body text-center">
                    <p><?php echo $todo_item['Todo']; ?></p>
                    <p class="date">Ajouté le <?php echo $todo_item['JOUR']?>/<?php echo $todo_item['MOIS']?>/<?php echo $todo_item['ANNEE']?> à <?php echo $todo_item['HEURE']?>:<?php echo $todo_item['MINUTE']?> </p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <textarea name="TodoId" id="TodoId" style="display:none" value="IsCheckeID"><?php echo $todo_item['ID']; ?></textarea>
                        <input type="submit" name="CheckButton" value="Marquer comme fait ✓" class="btn btn-dark w-100">
                    </form>
                </div>
            </div>
</div>




<?php endif;?>
<?php endforeach;?> 

<?php 
if (isset($_POST['CheckButton'])) {
    $sql = "UPDATE todos SET IsChecked = 1 WHERE ID = ". $_POST['TodoId'];
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Le todo a bien été marqué comme fait";
        header("Refresh:0");
    }else{
        echo "Une erreur est survenue";
        echo $sql;
        echo $_POST['TodoID'];
        echo $_POST['CheckButton'];
    }
}


if (isset($_POST['UnCheckButton'])) {
    $sql = "UPDATE todos SET IsChecked = 0 WHERE ID = ". $_POST['TodoId'];
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Le todo a bien été marqué comme non fait";
        header("Refresh:0");
    }else{
        echo "Une erreur est survenue";
        echo $sql;
        echo $_POST['TodoID'];
        echo $_POST['CheckButton'];
    }
}




if (isset($_POST['Delette'])) {
    $sql = "DELETE FROM `Todos` WHERE `ID` = ". $_POST['TodoId'];
    $result = mysqli_query($conn, $sql);
    if($result){
        //echo "Le todo a bien été marqué comme non fait";
        header("Refresh:0");
    }else{
        echo "Une erreur est survenue";
        echo $sql;
        echo $_POST['TodoID'];
        echo $_POST['CheckButton'];
    }
}
