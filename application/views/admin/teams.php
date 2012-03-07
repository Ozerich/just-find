<table class="team-list">
    <thead>
    <tr>
        <th>Позиция</th>
        <th>Название</th>
        <th>Оператор</th>
    </tr>
    </thead>
    <tbody>
        <? if(!Team::all()): ?>
        <tr><td colspan="10" class="empty">Нет команд</td></tr>
        <? else: ?>
            <? foreach(Team::all() as $team): ?>
                <tr>
                    <td><?=$team->pos?></td>
                    <td><?=$team->name?></td>
                    <td><?=$team->operator ? $team->operator->fullname : 'Нет оператора'?></td>
                    <td><a href="admin/team/<?=$team->id?>" class="edit-icon"></a></td>
                </tr>
            <? endforeach; ?>
        <? endif; ?>
    </tbody>
</table>

<a href="admin/team/new">Новая команда</a>