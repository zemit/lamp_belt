<?php
class Data extends CI_Model {
     function addUser($newUser)
     {
     	// $checkEmpty=$this->db->query("SELECT * FROM users")->result_array();
     	// $querystr="INSERT INTO users (name, alias, email, password, birthday, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
        
      //   $values = array($newUser['fullName'], $newUser['alias'], $newUser['email'], $newUser['password'], $newUser['timeStamp']); 
      //   $this->db->query($querystr,$values);
     }
     function loginUser($newUser)
     {

     	 $querystr = "SELECT * FROM users WHERE email = ? AND password = ?";
     	 $values = array($newUser['email'],$newUser['password']);
     	 return $this->db->query($querystr, $values)->row_array();
     }
     function ShowUserInfo($id)
     {
     	$querystr = "SELECT * FROM users LEFT JOIN messages ON users.id = messages.user_id LEFT JOIN comments ON comments.message_id = message_id WHERE users.id = ?";
     }
     function DisplayAllUsers()
     {
     	$querystr = "SELECT * FROM users";
     	return $this->db->query($querystr)->result_array();
     }
     function getUserByID($userID) {
            $sqlStr = "SELECT * FROM users WHERE id = ?";
            return $this->db->query($sqlStr, $userID)->row_array();
     }
     function deleteUser($userID)
     {
     	$sqlStr = "DELETE FROM users WHERE id = ?";
     	return $this->db->query($sqlStr, $userID);
     }
}
?>