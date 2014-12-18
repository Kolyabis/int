<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Система інтерактивного діалогу</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="/css/templates.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Добавляем новую запись, когда произошел клик по кнопке
            $("#FormSubmit").click(function (e) {
                e.preventDefault();
                if($("#contentText").val()==="") {
                    alert("Введите текст!");
                    return false;
                }
                var myData = "/content_txt/"+ $("#contentText").val();
                alert(myData);
                jQuery.ajax({
                    type: "POST", // HTTP метод  POST
                    //url: "response.php", //url-адрес, по которому будет отправлен запрос
                    url: "Novini/update", //url-адрес, по которому будет отправлен запрос
                    //dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
                    data:myData, //данные, которые будут отправлены на сервер (post переменные)
                    success:function(response){
                        $("#responds").append(response);
                        $("#contentText").val(''); //очищаем текстовое поле после успешной вставки
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        alert(thrownError); //выводим ошибку
                    }
                });
            });

            //Удаляем запись при клике по крестику
            $("body").on("click", "#responds .del_button", function(e) {
                e.preventDefault();
                var clickedID = this.id.split("-"); //Разбиваем строку (Split работает аналогично PHP explode)
                var DbNumberID = clickedID[1]; //и получаем номер из массива
                var myData = 'recordToDelete='+ DbNumberID; //выстраиваем  данные для POST
                $('#item_'+DbNumberID).addClass( "sel" ); //change bac
                $(this).hide();

                jQuery.ajax({
                    type: "POST", // HTTP метод  POST
                    url: "response.php", //url-адрес, по которому будет отправлен запрос
                    dataType:"text", // Тип данных
                    data:myData, //post переменные
                    success:function(response){
                        // в случае успеха, скрываем, выбранный пользователем для удаления, элемент
                        $('#item_'+DbNumberID).fadeOut("slow");
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        //выводим ошибку
                        alert(thrownError);
                    }
                });
            });
        });
    </script>
</head>
<body>
<div></div>

    <div id="content">
        <div>
            <div id="pageTitle">Система інтерактивного діалогу</div>
            <div style="text-align: center;">
                <div class="center">
                    <div>
                        <p style="float: left;">
                            <img id="foto" src="/images/model.png">
                            <br/>
                            <input id="old_vidpovid" type="button" value="Переглянути відповіді">
                        </p>
                        <span>
                            <?php
                            foreach($result as $user){
                                if($params['token'] == $user['token'] and !empty($user['id_user'])){
                                    $userId = intval($user['id_user']);
                                }
                            }
                            $data_tema = array('Tema pervaya','Tema vtoraya','Tema tretya');
                            $data_variantOtveta = array('Variant perviy','Variant vtoroy','Variant tretiy');
                            $data_menu = array('Novini'=>'Новини','Podiya'=>'Події','Baza'=>'Нормативно-правова база','Kerivnik'=>'Керівництво користувача','Arhiv'=>'Архів питання/відповіді');
                            $data = array(
                                'tema'          => $data_tema,
                                'variantOtveta' => $data_variantOtveta,
                                'menu'          => $data_menu);
                            ?>
                            <div class="content_wrapper">
                                <ul id="responds">
                                    <?php if(is_array($result)){; ?>
                                            <?php foreach($result as $list){; ?>
                                                <?php if($list['id_admin'] != 0){; ?>
                                                    <li style="margin-right: 20px; background-color: red; " id="item_'<?php echo $list['id']; ?>'">
                                                        <div class="del_wrapper"><a href="#" class="del_button" id="del-'<?php echo $list['id']; ?>'">
                                                                <img src="/images/icon_del.gif" border="0" />
                                                        </a></div>
                                                        <?php echo $list['text']; ?>
                                                    </li>
                                                <?php }else{; ?>
                                                    <li style="margin-left: 25px; background-color: blue; " id="item_'<?php echo $list['id']; ?>'">
                                                        <div class="del_wrapper"><a href="#" class="del_button" id="del-'<?php echo $list['id']; ?>'">
                                                                <img src="/images/icon_del.gif" border="0" />
                                                        </a></div>
                                                        <?php echo $list['text']; ?>
                                                    </li>
                                                <?php }; ?>
                                            <?php }; ?>
                                        <?php }else{; ?>
                                            HUY
                                        <?php }; ?>

                                </ul>
                                <div class="form_style">
                                    <input type="hidden" value="1"/>
                                    <input type="hidden" id="token" value="<?php echo $params['token']; ?>" />
                                    <input type="hidden" id="userId" value="<?php echo $userId; ?>"/>
                                    <textarea name="content_txt" id="contentText" cols="45" rows="5"></textarea>
                                    <button id="FormSubmit">ОТПРАВИТЬ</button>
                                </div>
                            <div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <br/>
            <div class="menu">
                <?php foreach($data['menu'] as $key_menu => $value_menu){; ?>
                    <span style="border-right: 2px solid #ffffff;  width: 15px;">
                                <a style="padding: 5px 7px 5px 7px; color:#ffffff;" href="/<?php echo $key_menu; ?>"><?php echo $value_menu; ?></a>
                            </span>
                <?php }; ?>
            </div>

        </div>

    </div>


<div></div>
</body>
</html>