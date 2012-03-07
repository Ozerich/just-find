<form action="admin/team/new" method="post">
    <div class="new-team">
        <div class="maininfo">
            <div class="param teamname">
                <label for="name">Название команды:</label>
                <input type="text" name="name" maxlength="30" id="name"/>
            </div>

            <div class="param email">
                <label for="email">E-mail для входа:</label>
                <input type="text" name="email" maxlength="50" id="email"/>
            </div>

            <div class="param password">
                <label for="password">Пароль для входа:</label>
                <input type="text" name="password" id="password"/>
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
                    <option value="<?=$task->id?>"><?=$task->answer?></option>
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
                    <input type="text" name="player_name[0]" maxlength="30"/>
                </div>
                <div class="param">
                    <label>Фамилия:</label>
                    <input type="text" name="player_surname[0]" maxlength="30"/>
                </div>
                <div class="checkbox param">
                    <label>Преподаватель:</label>
                    <input type="checkbox" class="is_teacher" name="is_teacher[0]"/>
                </div>
                <div clas="param">
                    <label>Группа:</label>
                    <input type="text" class="group" name="player_group[0]" maxlength="6"/>
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
        </div>
        <br class="clear"/>

        <button id="new-player">Новый игрок</button>

        <input type="submit" value="Сохранить"/>
    </div>
</form>