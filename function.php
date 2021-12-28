<?php
function my_filter($var, $type = "int")
{
    switch ($type) {
        case 'srting':
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_MAGIC_QUOTES) : '';
            break;
        case 'url':
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_URL) : '';
            break;
        case 'email':
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_EMAIL) : '';
            break;
        case 'int':
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_NUMBER_INT) : '';
            break;
    }
    return $var;
}

function user_login()
{
    global $admin_array;
    $user_name = my_filter($_POST['user_name'], "string");
    if (in_array($user_name, $admin_array)) {
        $_SESSION['user_name'] = $user_name;
    }
}
