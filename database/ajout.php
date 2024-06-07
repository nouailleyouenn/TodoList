<?php

$todo ='';
$todoErr = '';
$formAffichage = false;

if (isset($_POST['AddTodo'])) {
    if (empty($_POST['Todo'])) {
        $todoErr = 'Please enter a todo';
    } else {
        $todo = filter_var($_POST['Todo'], FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if ($todoErr == '') {
    $todo = $_POST['Todo'];
    $todoErr = '';
    $HEURE = date('H');
    $MINUTE = date('i');
    $ANNEE = date('Y');
    $MOIS = date('m');
    $JOUR = date('d');
    $sql="INSERT INTO `Todos`(`IsChecked`, `Todo`, `ANNEE`, `MOIS`, `JOUR`, `HEURE`, `MINUTE`) VALUES ('0','$todo', '$ANNEE', '$MOIS', '$JOUR', '$HEURE','$MINUTE')";
    
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Le todo a bien été ajouté";
        header("Refresh:0");
        $formAffichage = true;
    }else{
        echo "Une erreur est survenue";
        echo $sql;
}
}
}

if(isset($_POST['FormAffi'])){
    $formAffichage = true;
}

?>

<?php if ($formAffichage == false) :?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="form-group">
    <button type="submit" name="FormAffi" class="image-button">
            <img src="/php/ToDoList/IMG/plus.png" alt="Envoyer">
    </button>

</form>
<?php endif;?>

<?php if ($formAffichage == true) :?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="form-group">
            <div class="mb-3 p-3">
            <label for="Todo" class="form-label">Todo :</label>
            <textarea name="Todo" id="Todo" placeholder="Entrez ici votre tâche :" class="form-control" required ></textarea>
            </div>
            <div class="mb-3 p-3">
                <button type="submit" name="AddTodo" value="Envoyer" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
    </form>

<?php endif;?>
