<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserTable extends Table
{
    public function beforeSave(Event $event)
    {
        $entity = $event->getData('entity');

        // Make a password for digest auth.
        $entity->digest_hash = DigestAuthenticate::password(
            $entity->username,
            $entity->plain_password,
            env('SERVER_NAME')
        );
        return true;
    }
    public function InsertUser($email, $user, $pass){
      $email = strtolower(trim($email));
      $user = trim($user);

      $options = ['cost' => 12];
      $hash = password_hash($pass, PASSWORD_BCRYPT, $options);

      $sgll = "insert into 'User' ( 'Username','Password', 'Email') VALUES  (:username, :password, :email)";
      $query = $this->mydb->prepare($sql);
      $param = [':username' => $user, ':password' => $hash, ':email' => $email];

      $query->execute($param);
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->allowEmpty('role', 'A role is required')
            ->allowEmpty('email')
          //  ->add('role', 'inList', [
              //  'rule' => ['inList', ['admin', 'customer', 'merchant']],
              //  'message' => 'Please enter a valid role'

		            $this->_db->insert(PREFIX."User",$data);
		              //return $this->_db->lastInsertId('memberID');
	}

    }

    public function beforeSave($event,$entity,$options,$operation)
    {
    }

}
