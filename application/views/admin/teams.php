<form action="admin/teams" method="post">
    <table class="adminteam-list list">
        <thead>
        <tr>
            <th>Позиция</th>
            <th>Название</th>
            <th>Оператор</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <? if (!$teams): ?>
        <tr>
            <td colspan="10" class="empty">Нет команд</td>
        </tr>
            <? else: ?>
            <? foreach ($teams as $team): ?>
            <tr>
                <td><input type="text" size="2" maxlength="2" name="pos[<?=$team->id?>]" class="team-position" value="<?=$team->pos?>"/></td>
                <td><?=$team->name?></td>
                <td><?=$team->operator ? $team->operator->fullname : 'Нет оператора'?></td>
                <td><a href="admin/delete/team/<?=$team->id?>" class="delete-icon"></a>&nbsp;<a href="admin/team/<?=$team->id?>" class="edit-icon"></a></td>
            </tr>
                <? endforeach; ?>
            <? endif; ?>
        </tbody>
    </table>

    <div class="list-buttons">
        <input type="submit" value="" class="save-icon"/>
        <a href="admin/team/new" class="new-link">Новая команда</a>
        <br class="clear"/>
    </div>

    <div id="delete-confirm" style="display:none">
        Ты удаляешь команду! Ты уверен?
    </div>
</form>