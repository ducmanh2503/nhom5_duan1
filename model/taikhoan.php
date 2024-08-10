<?php
function load_all_account()
{
    $sql =  "SELECT * FROM account INNER JOIN role on account.role_id = role.role_id ORDER BY account_id DESC";
    $list_account = pdo_query($sql);
    return $list_account;
}

function load_avatar_account()
{
    $sql =  "SELECT `avatar` FROM account WHERE role_id = 1";
    $avatar_account = pdo_query_value($sql);
    return $avatar_account;
}
function load_avatar_account_bl($account_id) {
    $sql =  "SELECT `avatar` FROM account WHERE account_id=$account_id ";
    $avatar_account = pdo_query($sql);
    return $avatar_account;
}

function insert_account($user, $password, $phone_number, $email, $address)
{
    $sql = "INSERT INTO account(user,`password`,phone_number,email,`address`)
values('$user','$password','$phone_number','$email','$address')";
    pdo_execute($sql);
}

function update_account($account_id, $user, $pass, $phone_number, $email, $address, $status) {
    $sql = "UPDATE account SET user = ?, password = ?, phone_number = ?, email = ?, address = ?, status = ? WHERE account_id = ?";
    pdo_execute($sql, $user, $pass, $phone_number, $email, $address, $status, $account_id);
}

function update_account_client($account_id, $avatar, $user, $pass, $phone_number, $email, $address)
{
    $sql = "update account set avatar='$avatar', user='$user', password='$pass',phone_number='$phone_number', email='$email', address='$address' where account_id='$account_id'";
    pdo_execute($sql);
}

function update_account_admin($user, $password, $phone_number, $email, $address, $account_id)
{
    $sql = "UPDATE `account` SET `user` = '$user', `password` = '$password', `phone_number`='$phone_number',`email`='$email',`address`='$address' WHERE account_id = '$account_id'";
    pdo_execute($sql);
}
function checkuser($user, $pass)
{
    $sql = "SELECT * FROM account WHERE user='$user' AND password='$pass'";
    $check = pdo_query_one($sql);
    return $check;
}
function checkemail($email)
{
    $sql = "SELECT * FROM account WHERE email='$email'";
    $email = pdo_query_one($sql);
    return $email;
}

function check_username($user)
{
    $sql = "SELECT * FROM `account` WHERE `user` = '$user'";
    $user = pdo_query_one($sql);
    return $user;
}

function load_one_account($account_id)
{
    $sql = "SELECT * FROM account WHERE account_id = $account_id";
    $account = pdo_query_one($sql);
    return $account;
}