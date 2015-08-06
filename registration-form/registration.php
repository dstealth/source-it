<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <title>Регистрация</title>
</head>
<body>
<h1>РЕГИСТРАЦИЯ</h1>
<h3>Для регистрации заполните все данные анкеты</h3>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h4>Загрузите фотографию: </h4>
    <input type=file name=uploadfile>
    <input type=submit value=Загрузить></form>
</form>
<br/>
<br/>

<form action="reg-output.php" method="post">

    <label>Имя</label>
    <input type="text" name="name">
    <br/><br/>

    <label>Фамилия</label>
    <input type="text" name="surname">
    <br/><br/>

    <label>Дата рождения</label>
    <select name="day">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
    </select>

    <select name="month">
        <option value="1">Января</option>
        <option value="2">Февраля</option>
        <option value="3">Марта</option>
        <option value="4">Апреля</option>
        <option value="5">Мая</option>
        <option value="6">Июня</option>
        <option value="7">Июля</option>
        <option value="8">Августа</option>
        <option value="9">Сентября</option>
        <option value="10">Октября</option>
        <option value="11">Ноября</option>
        <option value="12">Декабря</option>
    </select>

    <select name="year">
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
    </select>
    <br/><br/>

    <h4>В случае утери пароля, с помощью чего Вы хотите его восстановить:</h4>
    <label>
        <input type="radio" name="password_restore" value="mail">ящика электронной почты
    </label>
    <br/>
    <label>
        <input type="radio" name="password_restore" value="tel">мобильного телефона
    </label>
    <br/>
    <label>
        <input type="radio" name="password_restore" value="none">не буду восстанавливать
    </label>
    <br/><br/>

    <h4>Выберите куда отправлять новые уведомления</h4>
    <label>
        <input type="checkbox" name="new_notification_on_mail" value="yes">на электронную почту
    </label>
    <br/>
    <label>
        <input type="checkbox" name="new_notification_on_tel" value="yes">на мобильный телефон
    </label>
    <br/>
    <label>
        <input type="checkbox" name="new_notification_on_home" value="yes">на домашний почтовый ящик
    </label>
    <br/><br/>

    <button type="submit">Зарегистрироватся</button>

</form>
</body>
</html>