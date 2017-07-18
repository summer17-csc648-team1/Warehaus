<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class QueryController extends Controller
{

    public function search() 
    {
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $name = explode("=",$this->request->data["name"])[1];
            $names = array();
            try {
                $connection = ConnectionManager::get('default');
            }
            catch (Exception $error) {
                $this->log($error->getMessage(), 'debug');
            }
            $results = $connection
                ->execute('SELECT * FROM Media WHERE Title like \'%' . $name . '%\'')
                ->fetchAll('assoc');
            
            foreach ($results as $row) 
            {
                array_push($names, $row);
            }
            $this->response->body(json_encode($names));

            return $this->response;
        }
    }
}