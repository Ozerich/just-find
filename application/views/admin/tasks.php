<table class="tasks-list list">
    <thead>
    <tr>
        <th>№</th>
        <th>Ответ</th>
        <th>Код</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <? if (!Task::all()): ?>
    <tr>
        <td colspan="10" class="empty">Нет заданий</td>
    </tr>
        <? else: ?>
        <? foreach (Task::all() as $task): ?>
        <tr>
            <td><?=$task->id?></td>
            <td><?=$task->answer?></td>
            <td><?=$task->code?></td>
            <td><a href="admin/task/<?=$task->id?>" class="edit-icon"></a></td>
        </tr>
            <? endforeach; ?>
        <? endif; ?>
    </tbody>
</table>

<div class="list-buttons">
    <a class="new-link" href="admin/task/new">Новое задание</a>
</div>
