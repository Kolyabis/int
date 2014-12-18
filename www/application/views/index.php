<?php //session_start(); ?>
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
</head>
<body>
<div></div>

    <div id="content">
        <div>
            <div id="pageTitle">Система інтерактивного діалогу</div>
            <div class="center">
                <div>
                    <p style="float: left;">
                        <img id="foto" src="/images/model.png">
                        <br/>
                        <input id="old_vidpovid" type="button" value="Переглянути відповіді">
                    </p>
                    <span id="forma">
                        <?php
                        //print_r($params);
                        $data_tema = array('Tema pervaya','Tema vtoraya','Tema tretya');
                        $data_variantOtveta = array('Variant perviy','Variant vtoroy','Variant tretiy');
                        $data_menu = array('Novini'=>'Новини','Podiya'=>'Події','Baza'=>'Нормативно-правова база','Kerivnik'=>'Керівництво користувача','Arhiv'=>'Архів питання/відповіді');
                        $data = array(
                            'title'  => 'Заповніть контактну штформацію',
                            'pidpriemstvo'  => 'Підприємство/П.І.Б',
                            'edrpo'         => 'ЄДРПОУ*',
                            'mail'          => 'E-mail*',
                            'tel'           => '(xxx)xxx-xx-xx*',
                            'tema'          => $data_tema,
                            'text'          => 'Текст звернення',
                            'variantOtveta' => $data_variantOtveta,
                            'menu'          => $data_menu);
                        ?>
                        <p>
                            <?php if(is_array($data)) {; ?>
                            <span style="font-weight: bold; width: 300px;">
                                    <?php echo $data['title']; ?>
                                </span>
                                <form action="" id="goUser" method="post">
                                    <input type="hidden" value="<?php  ?>"/>
                                    <input id="otstup" class="pidpriemstvo" type="text" name="pidpriemstvo" size="40" placeholder="<?php echo $data['pidpriemstvo']; ?>"><br/>
                                    <input id="otstup" class="edrpo" type="text" name="edrpo" size="40" placeholder="<?php echo $data['edrpo']; ?>"><br/>
                                    <input id="otstup" class="mail" type="text" name="mail" size="40" placeholder="<?php echo $data['mail']; ?>"><br/>
                                    <input id="otstup" class="tel" type="text" name="tel" size="40" placeholder="<?php echo $data['tel']; ?>"><br/><br/>
                                    <select id="otstup" class="tema" style="width: 314px;" name="tema" >
                                        <option value="0">Оберіть тему звернення</option>
                                        <?php foreach($data['tema'] as $key => $value){; ?>
                                            <option value="<?php echo $key+1; ?>"><?php echo $value; ?></option>
                                        <?php }; ?>
                                    </select><br/><br/>
                                    <textarea id="otstup" class="textarea" rows="7" cols="41" name="text" placeholder="<?php echo $data['text']; ?>"></textarea><br/><br/>
                                    <select id="otstup" class="variantOtveta" style="width: 314px;" name="variantOtveta" >
                                        <option value="0">Оберіть спосіб отрімання відповіді</option>
                                        <?php foreach($data['variantOtveta'] as $k => $v){; ?>
                                            <option value="<?php echo $k+1; ?>"><?php echo $v; ?></option>
                                        <?php }; ?>
                                    </select><br/>
                                    <input id="submit" type="button" value="Відправити звернення" onclick="submitGo()">
                                </form>
                                <pre>
                                <?php //print_r($data); ?>
                                </pre>
                    <?php }; ?>
                        </p>
                    </span>
                </div>
            </div>
            <br/>
            <div class="menu">
                <?php foreach($data['menu'] as $key_menu => $value_menu){; ?>
                    <span style="border-right: 2px solid #ffffff;  width: 15px;">
                                <a style="padding: 5px 7px 5px 7px; color:#ffffff;" href="/<?php echo $key_menu; ?>"><?php echo $value_menu; ?></a>
                            </span>
                <?php }; ?>
            </div>

        </div>
        <div class="clear"></div>
    </div>


<div></div>
</body>
</html>