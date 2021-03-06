$(document).ready(function () {

    $('#new-player').click(function () {

        var player = $('.player.sample').clone().removeClass('sample').appendTo('.players').show();
        $(player).find('.delete-player').click(function () {
            $(this).parents('.player').remove();
            $('.player').not('.operator').each(function () {
                var ind = $('.player').index($(this));
                $(this).find('.num').html(ind);
                $(this).find('input, checkbox').each(function () {
                    $(this).attr('name', $(this).attr('for') + '[' + (ind - 1) + ']');
                });
            });
            return false;
        });

        var ind = $('.player').size() - 1;

        $(player).find('input').each(function () {
            $(this).attr('name', $(this).attr('for') + '[' + (ind - 1) + ']');
        });

        $(player).find('.num').html(ind);

        $(player).find('.is_teacher').change(function () {
            if ($(this).is(':checked'))
                $(this).parents('.player').find('.group').val('').attr('disabled', 'disabled');
            else
                $(this).parents('.player').find('.group').removeAttr('disabled');
        });

        return false;
    });

    $('.is_teacher').change(function () {
        if ($(this).is(':checked'))
            $(this).parents('.player').find('.group').val('').attr('disabled', 'disabled');
        else
            $(this).parents('.player').find('.group').removeAttr('disabled');
    });

    $('.delete-player').click(function () {
        $(this).parents('.player').remove();
        $('.player').not('.operator').each(function () {
            var ind = $('.player').index($(this));
            $(this).find('.num').html(ind);
            $(this).find('input, checkbox').each(function () {
                $(this).attr('name', $(this).attr('for') + '[' + (ind - 1) + ']');
            });
        });
        return false;
    });

    if ($('#submit-code').size())
        var timer = window.setInterval(function () {
            if ($('#submit-code').size())
                $.get('team/update', function (data) {
                    $('#team-content').empty().html(data);
                })
        }, 5000);

    $('#submit-code').click(function () {
        $(this).attr('disabled', 'disabled');
        $.ajax({
            url:'team/answer',
            data:'code=' + $('#code').val(),
            type:'post',
            success:function (data) {
                data = jQuery.parseJSON(data);
                if (data.result == 1) {
                    $('#team-content').html(data.html);
                    alert('Ответ коректен, ты молодец ага');
                    if (data.game_over) {
                        $('.answer-block').remove();;
                    }
                }
                else
                    alert('Зафейлил попытку');
            },
            complete:function () {
                $('#submit-code').removeAttr('disabled');
                $('#code').val('');
            }
        });
        return false;
    });

    if ($('#live-wrapper').size())
        var timer = window.setInterval(function () {
            $.get('live/update', function (data) {
                $('#live-wrapper').html(data);
            })
        }, 5000);

    $('.tasks-list .delete-icon, .team-list .delete-icon').click(function () {
        var link = $(this);
        $('#delete-confirm').dialog({buttons:{
            "Delete":function () {
                document.location = $(link).attr('href');
            },
            Cancel:function () {
                $(this).dialog("close");
            }}});
        return false;
    });

});

