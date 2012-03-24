<tr class="text-status">
    <td colspan="100">
        Команда "<?=$this->team->name?>" получила подсказку <?=$hint_num?>
    </td>
</tr>
<tr class="status">
    <td colspan="100">
        <table class="status-table">
            <thead>
            <tr>
                <th>Название команды</th>
                <th>Место</th>
                <th>Время получения</th>
            </tr>
            </thead>
            <tbody>
            <tr class="status-info">
                <td><?=$this->team->name?></td>
                <td><?=$this->team->place?></td>
                <td><?=$task->open_time->format('H:i:s') . ' - ' .($task->close_time ? $task->close_time->format('H:i:s') : 'не отгадана')?></td>
            </tr>
            <tr>
                <td><?=$task->task->question?></td>
                <td colspan="2"><?=$hint?></td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>