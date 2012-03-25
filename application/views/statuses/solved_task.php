<tr class="text-status">
    <td colspan="100">
        Команда "<?=$this->team->name?>" отгадала загадку
    </td>
</tr>
<tr class="status">
    <td colspan="100">
        <table class="status-table">
            <tbody>
            <tr class="status-info">
                <td class="team-name-caption">Название команды</td>
                <td class="team-name"><?=$this->team->name?></td>
                <td class="place-caption">Место</td>
                <td class="place"><?=$this->team->place?></td>
                <td class="time-caption">Время получения</td>
                <td class="time"><?=$task->open_time->format('H:i:s') . ' - ' . ($task->close_time ? $task->close_time->format('H:i:s') : 'не отгадана')?></td>
            </tr>
            <tr class="task-info">
                <td colspan="4"><?=$task->task->question?></td>
                <td colspan="2"><?=$task->task->answer?></td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>