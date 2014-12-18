/**
 * Created by O.Zabiyaka on 01.12.14.
 */
function submitGo(){
    var pidpriemstvo = $('.pidpriemstvo').val();
    pidpriemstvo = encodeURIComponent(pidpriemstvo);
    var edrpo = $('.edrpo').val();
    var mail = $('.mail').val();
    var tel = $('.tel').val();
    var tema = $('.tema').val();
    var textarea = $('.textarea').val();
    textarea = encodeURIComponent(textarea);
    var variantOtveta = $('.variantOtveta').val();
    var url = window.location.href;
    var valid = true;
    if(pidpriemstvo.length < 3){
        $(".pidpriemstvo").focus();
        alert('Поле ( Підприємство/П.І.Б ) не коректно заповнене!');
        return valid = false;
    }else if(edrpo.length < 3){
        $(".edrpo").focus();
        alert('Поле ( ЄДРПОУ* ) не коректно заповнене!');
        return valid = false;
    }else if(mail.length < 3){
        $(".mail").focus();
        alert('Поле ( E-mail* ) не коректно заповнене!');
        return valid = false;
    }else if(tel.length < 3){
        $(".tel").focus();
        alert('Поле ( ТЕЛЕФОН* ) не коректно заповнене!');
        return valid = false;
    }else if(tema == 0){
        $(".tema").focus();
        alert('Поле ( Тема ) не коректно заповнене!');
        return valid = false;
    }else if(textarea.length < 3){
        $(".textarea").focus();
        alert('Поле ( Текст звернення* ) не коректно заповнене!');
        return valid = false;
    }else if(variantOtveta == 0){
        $(".variantOtveta").focus();
        alert('Поле ( Отримання відповіді ) не коректно заповнене!');
        return valid = false;
    }

    url = url.split(" ");
    if(url[3] == undefined){
        var controller = 'Novini';
    }else{
        var controller = url[3];
    }
    if(url[4] == undefined){
        var action = 'insert';
    }else{
        var action = url[4];
    }

    linkUrl = '/'+controller+'/'+action+'/pidpriemstvo/'+pidpriemstvo+'/edrpo/'+edrpo+'/mail/'+mail+'/tema/'+tema+'/tel/'+tel+'/text/'+textarea+'/otvet/'+variantOtveta;
    window.location.href = linkUrl;
}