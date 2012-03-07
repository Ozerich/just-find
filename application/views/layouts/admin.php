<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <base href="<?=base_url()?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description"
          content="Увлекательная игра для студентов и преподавателей БГУИРа, в которой просто каждый должен принять участие ;). Состоится в конце марта."/>

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>

    <link href="css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>

    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/hide_menu.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
    <script src="js/jquery.countdown.js" type="text/javascript"></script>

    <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?47"></script>
    <script type="text/javascript">
        VK.init({apiId:2798948, onlyWidgets:true});
    </script>
    <script src="http://api-maps.yandex.ru/1.1/index.xml?key=ABJpNU8BAAAA7DJJYwIAZ-55hTSw_JH7ofFYmUDOA52U2XkAAAAAAAAAAACtiLFKo1fMWXgiJNSC3kvTnBP71Q=="
                type="text/javascript"></script>
        <script type="text/javascript">

            window.onload = function () {
                $("#YMapsID").css("height", $(document).height() + "px");
                var map = new YMaps.Map(document.getElementById("YMapsID"));
                map.setCenter(new YMaps.GeoPoint(27.534174, 53.903068), 15, YMaps.MapType.HYBRID);
                toggleDown();
            }
            $(function () {
                $('#counter').countdown({
                    image:'images/digits.png',
                    timerEnd:function () {
                        alert('Регистрация окончена');
                    }
                });
            });
        </script>
    <title><?=isset($page_title) ? $page_title : ''?> / Just-Find.ru</title>
</head>
<body>

<div id="YMapsID"></div>
<div id="hit_area"></div>
<div id="menu_holder">
    <div id="nav">
        <ul>
            <li><a href="index">На главную</a></li>
            <li><a href="admin/teams">Команды</a></li>
            <li><a href="admin/tasks">Задание</a></li>
            <li><a href="registration">Соревнование</a></li>
        </ul>
    </div>
</div>


<div id="hit_area2">
    <div id="container">
        <div class="transparency">
              </div>
        <div class="content">

            <?=$page_content?>

        </div>
    </div>
</div>

</body>
</html>