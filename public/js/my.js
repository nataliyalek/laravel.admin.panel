/**  Подтверждение удаления заказа*/
$('.delete').click(function (){
    var res = confirm('Удалить заказ?');
    if(!res) return false;
});

/** Редактирование заказа*/
$('.redact').click(function (){
    var res = confirm('Вы можете изменить только комментарий?');
    if(res) return false;
});

/** Подтверждение удаления из БД */
$('.deletebd').click(function (){
    var res = confirm('Удалить из БД заказ?');
    if(res) {
        var ress = confirm('Вы уверенны, удалить заказ из БД?');
        if(!ress) return false;
    }
    if(!res) return false;
});
