<form action="admin/team/<?=$team->id?>" method="post">
    <div class="new-team">
        <div class="maininfo">
            <div class="param teamname">
                <label for="name">Название команды:</label>
                <input type="text" name="name" maxlength="30" value="<?=$team->name?>" id="name"/>
            </div>

            <div class="param email">
                <label for="email">E-mail для входа:</label>
                <input type="text" name="email" maxlength="50" value="<?=$team->email?>" id="email"/>
            </div>

            <div class="param password">
                <label for="password">Пароль для входа:</label>
                <input type="text" name="password" id="password" disabled="disabled"/>
            </div>
            <br class="clear"/>
        </div>
        <div class="tasks">
            <? for ($i = 1; $i <= 6; $i++): ?>
            <div class="task">
                <label>Загадка <?=$i?></label>
                <select name="task<?=$i?>">
                    <option value="0">Нет загадки</option>
                    <? foreach (Task::all() as $task): ?>
                    <option <?=$task->id == $team->task_$$i ? 'checked' : ''?>
                        value="<?=$task->id?>"><?=$task->answer?></option>
                    <? endforeach; ?>
                </select>
            </div>
            <? endfor; ?>
            <br class="clear"/>
        </div>

        <div class="players">

            <div class="player operator">
                <span class="header">Оператор</span>

                <div class="param">
                    <label>Имя:</label>
                    <input type="text" name="player_name[0]" value="<?=$team->operator->name?>" maxlength="30"/>
                </div>
                <div class="param">
                    <label>Фамилия:</label>
                    <input type="text" name="player_surname[0]" value="<?=$team->operator->surname?>" maxlength="30"/>
                </div>
                <div class="checkbox param">
                    <label>Преподаватель:</label>
                    <input type="checkbox" class="is_teacher" <?=$team->operator->is_teacher ? 'checked' : ''?>
                           name="is_teacher[0]"/>
                </div>
                <div class="param">
                    <label>Группа:</label>
                    <input type="text" class="group" value="<?=$team->operator->group?>" name="player_group[0]"
                           maxlength="6"/>
                </div>
            </div>

            <div class="player sample" style="display:none">
                <div class="header">Игрок <span class="num"></span>
                    <a href="#" class="delete-icon delete-player"></a>
                </div>

                <div class="param">
                    <label>Имя:</label>
                    <input type="text" for="player_name" maxlength="30"/>
                </div>
                <div class="param">
                    <label>Фамилия:</label>
                    <input type="text" for="player_surname" maxlength="30"/>
                </div>
                <div class="checkbox param">
                    <label>Преподаватель:</label>
                    <input type="checkbox" class="is_teacher" for="is_teacher"/>
                </div>
                <div clas="param">
                    <label>Группа:</label>
                    <input type="text" class="group" for="player_group" maxlength="6"/>
                </div>
            </div>
            <? foreach ($team->players as $ind=>$player): ?>

            <div class="player">
                <div class="header">Игрок <span class="num"><?=($ind + 1)?></span>
                    <a href="#" class="delete-icon delete-player"></a>
                </div>

                <div class="param">
                    <label>Имя:</label>
                    <input type="text" name="player_name[<?=$ind?>]" value="<?=$player->name?>" maxlength="30"/>
                </div>
                <div class="param">
                    <label>Фамилия:</label>
                    <input type="text" name="player_surname[<?=$ind?>]" value="<?=$player->surname?>" maxlength="30"/>
                </div>
                <div class="checkbox param">
                    <label>Преподаватель:</label>
                    <input type="checkbox" class="is_teacher" <?=$player->is_teacher ? 'checked' : ''?> name="is_teacher[<?=$ind?>]"/>
                </div>
                <div clas="param">
                    <label>Группа:</label>
                    <input type="text" class="group" name="player_group[<?=$ind?>]" value="<?=$player->group?>" maxlength="6"/>
                </div>
            </div>
            <? endforeach; ?>
        </div>
        <br class="clear"/>

        <button id="new-player">Новый игрок</button>

        <input type="submit" value="Сохранить"/>
    </div>
</form>