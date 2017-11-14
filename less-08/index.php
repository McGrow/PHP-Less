
<?php require_once './src/includer.php'; ?>

    <h1>Страница Login</h1>

<form class="frm sub sub3" action="hw8.php" method="post">
    <h2>Форма автоизации</h2>
    <div class="block">
        <label for="login">Login</label>
        <input type= "text" name="login" placeholder="Введите логин">
    </div>
    <div class="block">
        <label for="password">Password</label>
        <input type= "password" name="password"placeholder="Введите пароль">
    </div>
    <div class="lastbut"><button type="submit" class="butsub">ОТПРАВИТЬ</button></div>
</form>

<?php require_once './page_parts/footer.php';?>
