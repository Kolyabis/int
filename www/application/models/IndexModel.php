<?php
class IndexModel{
    public function listGo($file,$params = null){
        if(is_array($params)){
            if(isset($params['token']) and !empty($params['token'])){
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
                $token = $db->quote($params['token']);
                $query = $db->query("SELECT id, id_admin, id_user, id_kto, id_razgovora, text, token, data FROM list WHERE token=$token");
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        ob_start();
        include(__DIR__.'/'.$file);
        return ob_get_clean();
    }

}
