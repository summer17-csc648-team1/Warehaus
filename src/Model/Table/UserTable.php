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
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->allowEmpty('email')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'customer', 'merchant']],
                'message' => 'Please enter a valid role'
            ]);
    }

    public function beforeSave($event,$entity,$options,$operation) 
    {
    }

}