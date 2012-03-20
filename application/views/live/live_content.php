<div id="live-content">
    <table class="result-table">
        <tbody>
        <tr class="team-names">
            <th>&nbsp;</th>
            <? foreach ($top_teams as $team): ?>
            <th><?=$team->name?></th>
            <? endforeach; ?>
        </tr>
        <? for ($i = 1; $i <= 6; $i++): ?>
        <tr>
            <td>Загадка <?=$i?></td>
            <? foreach ($top_teams as $team): $task = $team->game_tasks[$i];
            $class_name = '';
            if ($task->open_time) {
                if (!$task->close_time)
                    $class_name = 'in_progress';
                else
                    $class_name = $task->is_solved ? 'success' : 'no_success';
            }
            else $class_name = 'no_start';
            ?>

            <td class="<?=$class_name?>">
                <? if ($task->open_time): ?>
                <?= $task->open_time->format('h:i:s') ?>
                - <?= $task->close_time ? $task->close_time->format('h:i:s') : '' ?>
                <? else: ?>
                Недоступно
                <? endif; ?>
            </td>
            <? endforeach; ?>
        </tr>
            <? endfor; ?>

        <tr class="status">
            <td colspan="12">
                СТАТУС
            </td>
        </tr>

        <tr class="team-names">
            <th>&nbsp;</th>
            <? foreach ($bottom_teams as $team): ?>
            <th><?=$team->name?></th>
            <? endforeach; ?>
        </tr>

        <? for ($i = 1; $i <= 6; $i++): ?>
        <tr>
            <td>Загадка <?=$i?></td>
            <? foreach ($top_teams as $team): $task = $team->game_tasks[$i];
            $class_name = '';
            if ($task->open_time) {
                if (!$task->close_time)
                    $class_name = 'in_progress';
                else
                    $class_name = $task->is_solved ? 'success' : 'no_success';
            }
            else $class_name = 'no_start';
            ?>

            <td class="<?=$class_name?>">
                <? if ($task->open_time): ?>
                <?= $task->open_time->format('h:i:s') ?>
                - <?= $task->close_time ? $task->close_time->format('h:i:s') : '' ?>
                <? else: ?>
                Недоступно
                <? endif; ?>
            </td>
            <? endforeach; ?>
        </tr>
            <? endfor; ?>
        </tbody>
    </table>
</div>