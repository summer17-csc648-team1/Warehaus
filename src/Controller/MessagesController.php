<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 *
 * @method \App\Model\Entity\Message[] paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{   
    public function initialize()
    {   
        parent::initialize();
        $this->loadComponent('Flash');
    }
        
    public function messages()
    {
        $user1 = "John";    //need to retrieve data from DB
        $user2 = "Current_User";    //need to retrieve data from DB
        $message = $_POST["Message"];
        $date = date('m/d/Y');
        
        $this->set('Merchant', $user1 );
        $this->set('Patron', $user2);
        
        
        $Attributes = [
            "User1" => $user1,
            "User2" => $user2,
            "Message" => $message,
            "Date" => $date
        ];
        
        $query = new QueryDB();
        
        if ($this->request->is('post')) 
        {
            $query->InsertMessages($Attributes);
            $this->Flash->success(__("Message sent!"));
        }
    }
    
}

?>