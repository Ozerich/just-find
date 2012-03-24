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
    <link href="css/ui-darkness/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css"/>

    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
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
<!--[if lt IE 7]>  <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>    <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>      <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>      <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>        <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>        <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>      </div>      <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>      <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>      <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>      <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>    </div>  </div>  <![endif]-->
<div id="YMapsID"></div>
<div id="hit_area"></div>
<div id="menu_holder">
    <div id="nav">
        <ul>
            <li><a href="index">На главную</a></li>
            <li><a href="admin/teams">Команды</a></li>
            <li><a href="admin/tasks">Задание</a></li>
            <li><a href="admin/game">Соревнование</a></li>
            <li><a href="admin/logout">Выход</a></li>
        </ul>
    </div>
</div>


<div id="hit_area2">
    <div id="container">
        <div class="transparency">
              </div>
        <div class="content admin-content">

            <?=$page_content?>

        </div>
    </div>
</div>

</body>
</html>