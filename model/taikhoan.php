<?php  
    function load_all_account() {
        $sql =  "SELECT * FROM account INNER JOIN role on account.role_id = role.role_id ORDER BY id DESC";
        $list_account = pdo_query($sql);
        return $list_account;
    }
function insert_account($user,$password,$phone_number,$email,$address,$role_id)
{
$sql = "INSERT INTO account(user,password,phone_number,email,address,role_id)
values('$user','$password','$phone_number','$email','$address','$role_id')";
pdo_execute($sql);
}
?>