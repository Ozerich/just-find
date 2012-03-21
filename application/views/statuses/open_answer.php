<tr class="text-status">
    <td colspan="100">
        Команда "<?=$this->team->name?>" получила ответ
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
                <td><?=$task->open_time->format('h:i:s') . ' - ' .($task->close_time ? $task->close_time->format('h:i:s') : 'не отгадана')?></td>
            </tr>
            <tr>
                <td><?=$task->task->question?></td>
                <td colspan="2"><?=$task->task->answer?></td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>