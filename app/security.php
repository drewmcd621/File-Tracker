<?php
require_once "sql.php";

function login($email, $pass)
{

  $sEmail = sqlSafe($email);
  $query = "SELECT id, password, enc_pass FROM users WHERE email = $email";
  $res = runQuery($query);

  if($row = $res->fetch_row())
  {
    $hash = $row['password'];
    $sEnc = $row['enc_pass'];
    $id = $row['id'];
    if($sEnc)
    {
      if(password_verify($pass, $hash))
      {
        updateLogon($id);
        return $id;
      }
    }
    else
    {
        if($has == $pass)
        {
          updateLogon($id);
          encryptPassword($pass, $id);
          return $id;
        }
    }
  }
  else
  {
    return null;
  }
  return null;
}

function encryptPassword($pass, $id)
{

}

function updateLogon($id)
{

}

?>
