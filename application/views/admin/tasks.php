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
        <? foreach (Task::all() as $ind=>$task): ?>
        <tr>
            <td><?=($ind + 1)?></td>
            <td><?=$task->answer?></td>
            <td><?=$task->code?></td>
            <td><a href="admin/delete/task/<?=$task->id?>" class="delete-icon"></a>&nbsp;<a href="admin/task/<?=$task->id?>" class="edit-icon"></a></td>
        </tr>
            <? endforeach; ?>
        <? endif; ?>
    </tbody>
</table>

<div class="list-buttons">
    <a class="new-link" href="admin/task/new">Новое задание</a>
</div>

<div id="delete-confirm" style="display:none">
    Ты удаляешь загадку! Ты уверен?
</div>
