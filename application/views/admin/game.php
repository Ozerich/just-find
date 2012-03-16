<?= form_open('admin/game') ?>
<div class="game-setup">
    <p class="block-header">Настройки игры</p>

    <div class="game-setup-content">
        <div class="param">
            <label for="gameover">Текст по окончанию игры:</label>
            <textarea name="gameover" id="gameover"><?=Config::find_by_param('game_over_html')->value?></textarea>
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