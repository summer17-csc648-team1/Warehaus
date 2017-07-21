<?php

namespace App\Controller;

use Cake\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class QueryController extends AppController //should be AppController instead of Controller
{
    /**
     * @return \Cake\Http\Response|null
     * Find file by file name.
     * Return all files that match the input "name".
     */
    public function initialize() 
    {
        
    }
    
    public function seachBar()
    {
        
    }
    
    
    public function searchByName()
    {
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $name = explode("=",$this->request->data["Title"])[1]; //change 'name' to 'Title'
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
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $category = explode("=",$this->request->data["Category"])[1]; //change 'category' to 'Category'
            $files = array();
            try{
                $connection = ConnectionManager::get('default');
            }
            catch(Exception $error){
                $this->log($error->getMessage(), 'debug');
            }
            $results = $connection  //this was unused
                ->execute('SELECT * FROM Media, Categories 
                            WHERE Categories_Category_ID=CategoryID AND Category=\'', $category,'\';')
                ->fetchAll('assoc');
            
            /**add by Bo*/
            foreach ($results as $row) 
            {
                array_push($files, $row);
            }
            $this->response->body(json_encode($files));
            return $this->response;
        }
    }
    /**
     * @return \Cake\Http\Response|null
     * Find users whose username and password match the input "username" and "password"
     * Return all matching users.
     */
    
    
    public function searchByPrice() 
    {   
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $price = explode("=",$this->request->data["Price"])[1];
            $files = array();
            try {
                $connection = ConnectionManager::get('default');
            }
            catch (Exception $error) {
                $this->log($error->getMessage(), 'debug');
            }
            
            $results = $connection  //this is unused
                ->execute('SELECT * FROM Media WHERE Price=\'', $price,'\';')
                ->fetchAll('assoc');
            
            foreach ($results as $row) 
            {
                array_push($files, $row);
            }
            $this->response->body(json_encode($files));
            return $this->response;          
        }        
    }
    
    public function searchByMediaID()     //unnecessary
    {
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $mediaID = explode("=",$this->request->data["MediaID"])[1];
            $files = array();
            try {
                $connection = ConnectionManager::get('default');
            }
            catch (Exception $error) {
                $this->log($error->getMessage(), 'debug');
            }
            
            $results = $connection  //this is unused
                ->execute('SELECT * FROM Media, MediaAttributes
                            WHERE MediaID=MediaID AND MediaID =\'', $mediaID,'\';')             
                ->fetchAll('assoc');
            
            foreach ($results as $row) 
            {
                array_push($files, $row);
            }
            $this->response->body(json_encode($files));
            return $this->response;          
        }    
    }
    
    
    public function findUser(){
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $username = explode("=",$this->request->data["Username"])[1];
            $password = explode("=",$this->request->data["Password"])[1];
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