<?php
$money_res=0;
session_start();
print("Map :");
require_once("data.txt");
require_once("check_function.php");
require_once("room_factory.php");
require_once("room.php");
require_once("map.php");
require_once("player.php");
require_once("chest_room.php");
require_once("empty_room.php");
require_once("monster_room.php");


$output = "";
$coin = 0;
$res = 0;
$file = fopen("data.txt", "r");


$User = new Player();
$User->start_game($file);
?>


<?php


$num = (isset($_SESSION['num'])) ? $_SESSION["num"] : 0;
$num++;

$_SESSION["num"] = $num;
if ($num>1) {
    echo '        <b> Refresh to start game! </b>         ';
}

if (isset($_POST['postid'])) {

   # if(if_able($User->h,$_POST['name'])){
    if (1) {

        #print("dir: " . $_POST['name']);
        if (!isset($_SESSION['data'])) {
            $_SESSION['data'] = array($_POST['name']);
        } else {
            array_push($_SESSION['data'], $_POST['name']);
        }


        for ($i = 0; $i < count($_SESSION['data']) - 1; $i++) {
            $User->choose_step((int)$_SESSION['data'][$i]);
        }
        if (!isset($_SESSION['cons'])) {
            $_SESSION['cons'] = 0;
        }
        $output = "";
        $add = $User->choose_step((int)$_SESSION['data'][count($_SESSION['data']) - 1]);
        $_SESSION['cons'] += $add;
        $res = $_SESSION["cons"];
        $coin = $add;
    } else {
        print "You put wrong directory";
    }
}

?>

<?php
if (isset($_POST['myActionName'])) {
    for($i=1;$i<=1;$i++) {
        session_destroy();
    }
}
?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Game</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

</head>
<body>
<style>
    .center {
        text-align: center;
    }
</style>
<center class="center">

    <form name="feedback" method="POST">
        <input name="postid" type="hidden" value="1234">
        <label>Direction: <input type="text" name="name"></label>


        <input type="submit" name="send" value="Send">
    </form>

    <form action="index.php" method="POST">
        <input name="myActionName" type="submit" value="Refresh"/>
    </form>


    <center>heey</center>
    <center>Coordinata <?php $b = $User->h;
        print("$b->x   $b->y ") ?></center>
    <center> <?php print(can_go($User->h)); ?></center>
    <center> <?php print($output);
        $output = ""; ?></center>
    <center> Money added <?php print($coin); ?></center>
    <center> All money <?php print($res); ?></center>
    <center> <?php $b = $User->h;
        if ($b->x == $b->max_x and $b->y == $b->max_y) {
            print("Congratulations! You won!");
            $money_res=$res;
        } ?></center>
    <center></center><?php
    echo '<img src="image/pers.gif" />';
    echo '<img src="image/chest.gif" />';
    echo '<img src="image/mons1.gif" />';
    ?></center>
<center> В этой игре тебе необходимо добраться из левого нижнего угла карты до правого верхнего. </center>
<center>На пути тебе могут встречаться пустые комнаты,комнаты с монстром, или даже с сокровищем. </center>
<center>Не бойся,ионстры не кусаются! Твой счёт не станет отрицательным. </center>
<center>Набери как моно больше бонусов к концу игры </center>
<center>Ты можешь выбирать направления,перемещаясь между дверями </center>
<center>Для того,чтобы пойти Up, введи в поле 1 </center>
<center>Для того,чтобы пойти Down, введи в поле 2 </center>
<center>Для того,чтобы пойти Left, введи в поле 3 </center>
<center>Для того,чтобы пойти Right, введи в поле 4 </center>
<center>Для того,чтобы заново,нажми Refresh, тебе об этом сказано в верхней части страницы </center>
<center>Для того,чтобы заново,нажми Refresh, тебе об этом сказано в верхней части страницы </center>
<center>Эта надпись должна исчезнуть </center>


</body>
</html>