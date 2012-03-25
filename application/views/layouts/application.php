<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <base href="<?=base_url()?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description"
          content="Увлекательная игра для студентов и преподавателей БГУИРа, в которой просто каждый должен принять участие ;). Состоится 29-го марта в 15:00."/>

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>

    <link href="css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>

    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/hide_menu.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
    <script src="js/jquery.countdown.js" type="text/javascript"></script>

    <script src="http://api-maps.yandex.ru/1.1/index.xml?key=ABJpNU8BAAAA7DJJYwIAZ-55hTSw_JH7ofFYmUDOA52U2XkAAAAAAAAAAACtiLFKo1fMWXgiJNSC3kvTnBP71Q=="
            type="text/javascript"></script>
    <script type="text/javascript">

        if(document.all && !document.getElementsByClassName)
            document.location = 'ie';

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
                    alert('GO GO GO!!!');
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
            <li><a href="about">Об игре</a></li>
            <li><a href="rules">Правила</a></li>
            <li><a href="teams">Команды</a></li>
            <li><a href="sponsors">Спонсоры</a></li>
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

<div id='statCounter' style="display:none;">
    <!--Akavita counter start-->
    <script type="text/javascript">var AC_ID = 53024;
    var AC_TR = false;
    (function () {
        var l = 'http://adlik.akavita.com/acode.js';
        var t = 'text/javascript';
        try {
            var h = document.getElementsByTagName('head')[0];
            var s = document.createElement('script');
            s.src = l;
            s.type = t;
            h.appendChild(s);
        } catch (e) {
            document.write(unescape('%3Cscript src="' + l + '" type="' + t + '"%3E%3C/script%3E'));
        }
    })();
    </script>
    <span id="AC_Image"></span>
    <noscript><a target='_top' href='http://www.akavita.by/'>
        <img src='http://adlik.akavita.com/bin/lik?id=53024&it=1'
             border='0' height='1' width='1' alt='Akavita'/>
    </a></noscript>
    <!--Akavita counter end-->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter12501043 = new Ya.Metrika({id:12501043, enableAll:true, webvisor:true});
                }
                catch (e) {
                }
            });
        })(window, "yandex_metrika_callbacks");
    </script>
    <script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
    <noscript>
        <div><img src="//mc.yandex.ru/watch/12501043" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</div>
</body>
</html>