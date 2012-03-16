<div class="current-task">
    <p class="block-header">Текущая загадка:</p>

    <div class="task"><?=$team->current_gametask->task->question?></div>
    <div class="hint">
        <span class="hint-header">Подсказка 1</span>

        <p class="hint-value"><?=$team->current_gametask->hint1_time ? $team->current_gametask->task->hint_1 : 'Недоступно'?></p>
    </div>
    <div class="hint">
        <span class="hint-header">Подсказка 2</span>

        <p class="hint-value"><?=$team->current_gametask->hint2_time ? $team->current_gametask->task->hint_2 : 'Недоступно'?></p>
    </div>
    <div class="hint">
        <span class="hint-header">Подсказка 3</span>

        <p class="hint-value"><?=$team->current_gametask->hint3_time ? $team->current_gametask->task->hint_3 : 'Недоступно'?></p>
    </div>
    <div class="hint">
        <span class="hint-header">Ответ - место</span>

        <p class="hint-value"><?=$team->current_gametask->answer_time ? $team->current_gametask->task->answer : 'Недоступно'?></p>
    </div>
</div>

<div class="tasks">
    <?srand(time());echo rand() % 100;?>
    <p class="block-header">Все загадки:</p>
    <? for ($i = 1; $i <= 6; $i++): ?>
    <div class="task">
        <span class="task-name">Загадка <?=$i?></span>
        <? if ($team->game_tasks[$i] && $team->game_tasks[$i]->open_time): ?>
        <span class="task-start"><?=$team->game_tasks[$i] && $team->game_tasks[$i]->open_time ? $team->game_tasks[$i]->open_time->format('H:i:s') : ''?></span>
        -
        <span class="task-time"><?=$team->game_tasks[$i] && $team->game_tasks[$i]->close_time ? $team->game_tasks[$i]->close_time->format('H:i:s') : ''?></span>
        <? else: ?>
        <span class="no-start">Недоступно</span>
        <? endif; ?>
    </div>
    <? endfor; ?>
</div>

<div class="team-information">
    <div class="place">
        Место в игре:
        <span>IV</span>
    </div>
</div>