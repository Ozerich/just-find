<a href="http://just-find.ru"><img src="images/logo.png" height="150" border="0"/></a>
<h1>Составы команд:</h1>
<ul class="team-list">
    <? foreach (Team::find('all', array('order' => 'pos asc')) as $team): ?>
    <li class="team-name-line">
        <span class="team-name"><?=$team->name?></span>
        <ul class="team-players">
            <li class="person-name-line operator">
                <span class="person-job">Оператор:</span>
                <span class="person-name"><?=$team->operator->fullname . ' (' . $team->operator->group . ')'?></span>
            </li>
            <? foreach ($team->players as $ind => $person): ?>
            <li class="person-name-line">
                    <span class="person-job">
                        <? if ($ind == 0): ?>Кукушка:
                        <? else: ?>
                        Игрок <?= ($ind) ?>:
                        <? endif; ?>
                    </span>
                <span class="person-name"><?=$person->fullname . ' (' . $person->group . ')'?></span>
            </li>
            <? endforeach; ?>
        </ul>
    </li>
    <? endforeach; ?>
</ul>