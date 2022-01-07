<?php
?>
</br>
<label>Привет <strong><?=$_SESSION['user']['login']?></strong>!</label>

<form method="post" action="">
    <input name="password" type="password" placeholder="Введите новый пароль">
    <input type="submit" value="Обновить">
</form>

<form method="post" action="">
    <input name="personal" type="text" placeholder="Введите новый ФИО">
    <input type="submit" value="Обновить">
</form>
