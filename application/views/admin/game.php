<?= form_open('admin/game') ?>
<div class="game-setup">
    <p class="block-header">Настройки игры</p>

    <div class="game-setup-content">
        <div class="param">
            <label for="gameover">Текст по окончанию игры:</label>
            <textarea name="gameover" id="gameover"><?=Config::find_by_param('game_over_html')->value?></textarea>
        </div>
        <div class="param interval">
            <label for="hint1_interval">Интервал между условием и первой подсказкой (сек)</label>
            <input type="text" name="hint1_interval" id="hint1_interval" value="<?=Config::find_by_param('hint1_interval')->value?>"/>
        </div>

        <div class="param interval">
            <label for="hint2_interval">Интервал между первой подсказкой и второй подсказкой (сек)</label>
            <input type="text" name="hint2_interval" id="hint2_interval" value="<?=Config::find_by_param('hint2_interval')->value?>"/>
        </div>
        <div class="param interval">
            <label for="hint3_interval">Интервал между второй подсказкой и третей подсказкой (сек)</label>
            <input type="text" name="hint3_interval" id="hint3_interval" value="<?=Config::find_by_param('hint3_interval')->value?>"/>
        </div>

        <div class="param interval">
            <label for="answer_interval">Интервал между третей подсказкой и ответом (сек)</label>
            <input type="text" name="answer_interval" id="answer_interval" value="<?=Config::find_by_param('answer_interval')->value?>"/>
        </div>


        <input type="submit" value="Сохранить"/>
    </div>
</div>
</form>

<? if (Config::find_by_param('started_game')->value == 0): ?>
<a href="admin/game/start_game">Начать игру</a>
<? else: ?>
<a href="admin/game/stop_game">Остановить игру</a>
<? endif; ?>