<form action="admin/task/<?=$task->id?>" method="post">

    <div class="new-task">

        <div class="param">
            <label for="task">Загадка:</label>
            <textarea name="question" id="task"><?=$task->question?></textarea>
        </div>

        <div class="param">
            <label for="hint1">Подсказка 1:</label>
            <textarea name="hint1" id="hint1"><?=$task->hint_1?></textarea>
        </div>

        <div class="param">
            <label for="hint2">Подсказка 2:</label>
            <textarea name="hint2" id="hint2"><?=$task->hint_2?></textarea>
        </div>

        <div class="param">
            <label for="hint3">Подсказка 3:</label>
            <textarea name="hint3" id="hint3"><?=$task->hint_3?></textarea>
        </div>

        <div class="answer-block">
            <div class="param answer">
                <label for="answer">Ответ:</label>
                <input type="text" name="answer" id="answer" value="<?=$task->answer?>"/>
            </div>
            <div class="param code">
                <label for="code">Код:</label>
                <input type="text" name="code" id="code" maxlength="8" value="<?=$task->code?>"/>
            </div>
            <br class="clear"/>
        </div>

        <input type="submit" value="Сохранить"/>
    </div>

</form>