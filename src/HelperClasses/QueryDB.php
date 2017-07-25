<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/20/17
 * Time: 12:12 PM
 */
namespace App\HelperClasses;

use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
use Cake\Auth;
use App\Model\Table;

///All Methods are straight forward, The searches in media take a variable parameter.
///
/// The search by table column takes a table parameter a column parameter and a value parameter
/// which is used to search against. The search functions return a JSON result, you must decode
/// it into an array to work with it or keep it as a JSON object and send it to the view for easy
/// use
///
///The Insert functions will return a boolean dependant on whether or not it was successful.
///
///The Attributes parameter for Insert is a Key Value Array that should name its keys precisely
///as they are named in the database. For example if I were to Insert into Messages I would create
// an array like this:
//
//$Attributes = [
//     "User1" => "3"
//     "User2" => "5"
//     "Message" => "Hey whats up"
//     "Date => '2003-12-31 01:02:03'
// ];
//
//Then pass that to an instance of QueryDB like so
//$Query = new QueryDB()
//$Query->InsertMessages($Attributes);
// Success!
//
//
class QueryDB
{
    public $connection = "";
    function __construct($ConnectionName = 'default')
    {
        try {
            $this->connection = ConnectionManager::get($ConnectionName);
        }
        catch (Exception $error) {
            $this->log('Could not connect to database ' . $ConnectionName . ' with error: ' . $error->getMessage(), 'debug');
        }
    }
    function SearchMediaByTitle($title)
    {
        $names = array();
        $results = $this->connection
            ->execute('SELECT * FROM Media WHERE Title like \'%' . $title . '%\'')
            ->fetchAll('assoc');
        foreach ($results as $row)
        {
            array_push($names, $row);
        }
        $JSONResponse = json_encode($names);
        return $JSONResponse;
    }
    function SearchMediaByCategory($category)
    {
        $ResultArray = array();
        $results = $this->connection
            ->execute('SELECT * FROM Media M
                       JOIN Categories C ON C.CategoryID = M.Categories_Category_ID
                       WHERE Category LIKE ' . '\'%'. $category . '%\';')
            ->fetchAll('assoc');

        foreach ($results as $row)
        {
            $row["User_UserID"] = $this->GetUsernameByID($row["User_UserID"]);
            array_push($ResultArray, $row);
        }
        $JSONResponse = json_encode($ResultArray);

        return $JSONResponse;
    }
    function SearchTableByColumn($table,$column,$value)
    {
        $ResultArray = array();
        $results = $this->connection
            ->execute('SELECT * FROM ' . $table .
                       'WHERE ' . $column .  ' = \'' . $value . '\';')
            ->fetchAll('assoc');

        foreach ($results as $row)
        {
            array_push($ResultArray, $row);
        }
        $JSONResponse = json_encode($ResultArray);

        return $JSONResponse;
    }
    function GetIDByUsername($name)
    {
        $results = $this->connection
            ->execute('SELECT * FROM User
                       WHERE Username = \'' . $name . '\';')
            ->fetchAll('assoc');

        $JSONResponse = json_encode($results[0]);

        return $JSONResponse;

    }
    function GetUsernameByID($ID)
    {
        $results = $this->connection
            ->execute('SELECT * FROM User
                        WHERE UserID = \'' . $ID . '\';' )
            ->fetchAll('assoc');

        return $results[0]["Username"];
    }
    function GetCategories()
    {
        $results = $this->connection
            ->execute('SELECT Category FROM Categories')
            ->fetchAll('assoc');
        return json_encode($results);
    }
    function InsertMedia($Attributes)
    {
        $result = $this->connection->insert('Media',
            [
                'Title' => $Attributes['Title'],
                'FileLocation' => $Attributes['FileLocation'],
                'ThumbnailLocation' => $Attributes['ThumbnailLocation'],
                'MediaType' => $Attributes['MediaType'],
                'Format' => $Attributes['Format'],
                'DateUploaded' => $Attributes['DateUploaded'],
                'Price' => $Attributes['Price'],
                'Categories_Category_ID' => $Attributes['Categories_Category_ID'],
                'User_UserID' => $Attributes['User_UserID']
            ]);
        if ($result->errorInfo()[0] = 0000) {
            return true;
        } else {
            return false;
        }
    }
    function InsertCategory($Category)
    {
        $Categories = $this->connection
            ->execute('SELECT * FROM Categories WHERE Category = \'' . $Category . '\';' )
            ->fetchAll('assoc');
        if(empty($Categories)) {
            $result = $this->connection->insert('Categories',
                [
                    'Category' => $Category
                ]
            );
            if ($result->errorInfo()[0] = 0000) {
                return true;
            } else {
                return false;
            }
        }
    }
    function InsertMessages($Attributes)
    {
        $result = $this->connection->insert('Messages',
            [
                'User1' => $Attributes['User1'],
                'User2' => $Attributes['User2'],
                'Message' => $Attributes['Message'],
                'Date' => $Attributes['Date']
            ]);
        if ($result->errorInfo()[0] = 0000) {
            return true;
        } else {
            return false;
        }
    }
    function InsertTransactions($Attributes)
    {

        $result = $this->connection->insert('Transactions',
            [
                'OrderDate' => $Attributes['OrderDate'],
                'SoldBy' => $Attributes['SoldBy'],
                'PurchasedBy' => $Attributes['PurchasedBy'],
            ]);
        if ($result->errorInfo()[0] = 0000) {
            return true;
        } else {
            return false;
        }
    }
}