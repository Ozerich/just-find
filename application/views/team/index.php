<div id="team-content"><?=$team_content?></div>

<br class="clear"/>

<? if(!$is_game_over): ?>
<div class="answer-block">
    <span>Введите код:</span>
    <input type="text" size="8" maxlength="8" id="code"/>
    <button id="submit-code">Отправить</button>
</div>
<? endif; ?>