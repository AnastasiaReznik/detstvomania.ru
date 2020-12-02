<?php
namespace app\models;
use app\core\Model;
//модель личной страницы
class PersonalInfo extends Model {

public function getPersonInfo($id_user)
{
   return $this->db->queryAll('users', 'id', $id_user);
}
public function save_change($name,$lastName, $email, $sex, $birthday, $id_user)
{
   if ($lastName == '') {
      $lastName = 'NULL';
   } 
   if ($sex == '') {
      $sex = 'NULL';
   } 
   if ($birthday == '') {
      $birthday = '00-00-0000';
   } 
      // $query_update = [$name, $lastName, $email, $sex, $birthday, $id_user];
      $query_update = $this->db->query("UPDATE users SET `email` = '$email', `firstName` = '$name', `lastName` = '$lastName', `sex` = '$sex', `birthdate` = '$birthday' WHERE `id` = '$id_user'"); //UPDATE cart SET `count` = (`count`+ $count) WHERE `product_id` = $id_product AND `client_id` = $id_user
      return $query_update;
 }
}