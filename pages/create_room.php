<?php
$error = '';


if(isset($_POST['title']) AND isset($_POST['discription'])){
    echo htmlspecialchars($_POST['discription']);
    echo $_POST['title'];


    require_once './commons/mysql.php';




    $res = $Db->query("INSERT INTO `rooms`
 (`title`, `discription` , created_by) VALUES 
 (?,?,?);" ,
 [
    $_POST['title'],
    $_POST['discription'],
    $_SESSION['user_id']
]
    )->numAffectedRows();
    if($res > 0){
        header('Location: ./?page=rooms');
    }
}
?><div class='body page_padding '>

    <form class='form ' action='./?page=create_room' method='post'>
        <h1>Create Room</h1>
        <div>
            <input class='inp'  required type="text" value="<?php echo $_POST['title'] ?? '';?>" name='title' placeholder='Title'>
        </div>
        <div>
            <textarea  class='inp' required value="<?php echo $_POST['discription'] ?? '';?>" placeholder='Discription' name="discription"
                id="" cols="30" rows="10"></textarea>
        </div>

        <button class='arr' type='submit'>
            Submit
        </button>

        <div>

        </div>
        <?php
   if($error) {
    ?>
        <div class='error'>
            <?php echo $error?>
            <div>
                <?php
}
?>
    </form>
</div>
<style>
.form {
    width: min(500px, 100%);
    margin-inline: auto;
    gap: 1rem
}
.form input, .form textarea{
    padding: 0.5rem 0.7rem;
    border-radius: 0.5rem;
    font-size: 1.2rem;
}
.arr{
    text-align: center;
    background-color: #2980b9 !important;
    font-size: 1.5rem;
    border-radius: 2rem;
    margin-top: 2rem;
    font-weight: 700;
    color: white;
}
.arr:hover{
    background: blue !important;
}

</style>