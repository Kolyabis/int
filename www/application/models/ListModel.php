<?php
class ListModel{
    public function isertList($file,$params = null){
        $dbhost ='localhost';
        $dbuser ='root';
        $dbpass ='';
        $dbname='int';
        $sqlchar='utf8';
        try{
            $db = new PDO ( 'mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
            $db->query ( 'SET character_set_connection = '.$sqlchar );
            $db->query ( 'SET character_set_client = '.$sqlchar );
            $db->query ( 'SET character_set_results = '.$sqlchar );
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        if(is_array($params)){
            print_r($params);
        }
        ob_start();
        include(__DIR__.'/'.$file);
        return ob_get_clean();
    }

    public function insertUser($file,$params = null){
        $dbhost ='localhost';
        $dbuser ='root';
        $dbpass ='';
        $dbname='int';
        $sqlchar='utf8';
        try{
            $db = new PDO ( 'mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
            $db->query ( 'SET character_set_connection = '.$sqlchar );
            $db->query ( 'SET character_set_client = '.$sqlchar );
            $db->query ( 'SET character_set_results = '.$sqlchar );
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        if(is_array($params)){
            if(isset($params['pidpriemstvo'])){
                $pidpriemstvo = urldecode(stripslashes(strip_tags($params['pidpriemstvo'])));
            }
            if(isset($params['edrpo'])){
                $edrpo = intval($params['edrpo']);
            }
            if(isset($params['mail'])){
                $mail = $params['mail'];
            }
            if(isset($params['tema'])){
                $tema = $params['tema'];
            }
            if(isset($params['tel'])){
                $tel = $params['tel'];
            }
            if(isset($params['text'])){
                $text = urldecode(stripslashes(strip_tags($params['text'])));
            }
            if(isset($params['otvet'])){
                $otvet = $params['otvet'];
            }
            if(isset($params['token'])){
                $token = $params['token'];
            }
        }

        $today = date("d.m.Y H:i:s");
        $lastId = $db->lastInsertId();
        try{
            $q = $db->prepare("INSERT INTO users
                                    (id, pidpriemstvo, edrpo, mail, tel, tema, textarea, variantOtveta, session, data)
                               VALUES ($lastId , '$pidpriemstvo', $edrpo, '$mail', '$tel', '$tema', '$text', '$otvet', '$token', '$today')");
            $query = $q->execute();
            if($query){
                header("Location: /Novini/index/token/".$token);
            }
        }catch (PDOException $e){
                $e->getMessage();
        }

        ob_start();
        include(__DIR__.'/'.$file);
        return ob_get_clean();
    }
}
