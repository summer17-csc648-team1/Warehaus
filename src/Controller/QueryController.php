<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class QueryController extends Controller
{

    /**
     * @return \Cake\Http\Response|null
     * Find file by file name.
     * Return all files that match the input "name".
     */
    public function searchByName()
    {
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $name = explode("=",$this->request->data["name"])[1];
            $files = array();
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
                array_push($files, $row);
            }
            $this->response->body(json_encode($files));

            return $this->response;
        }
    }

    public function searchByCategory(){
        if($this->request->is('ajaz')){
            $this->autoRender = false;
            $category = explode("=",$this->request->data["category"])[1];
            $files = array();
            try{
                $connection = ConnectionManager::get('default');
            }
            catch(Exception $error){
                $this->log($error->getMessage(), 'debug');
            }
            $results = $connection
                ->execute('SELECT * FROM Media, Categories 
                            WHERE Categories_CategoryID=CategoryID AND Category=\'', $category,'\';')
                ->fetchAll('assoc');
        }
    }


    /**
     * @return \Cake\Http\Response|null
     * Find users whose username and password match the input "username" and "password"
     * Return all matching users.
     */
    public function findUser(){
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $username = explode("=",$this->request->data["username"])[1];
            $password = explode("=",$this->request->data["password"])[1];
            $user = array();
            try {
                $connection = ConnectionManager::get('default');
            }
            catch (Exception $error) {
                $this->log($error->getMessage(), 'debug');
            }
            $results = $connection
                ->execute('SELECT * FROM User WHERE Username=\'', $username, '\' AND Password=\'', $password, '\';')
                ->fetchAll('assoc');

            foreach ($results as $row)
            {
                array_push($user, $row);
            }
            $this->response->body(json_encode($user));

            return $this->response;
        }
    }
}