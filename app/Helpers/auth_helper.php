<?php

function loggedIn()
{
    $user = session()->get('user');
    if ($user and $user['isLoggedIn']) {
        return true;
    }
    return false;
}
function allowEdit($id)
{
    $user = session()->get('user');
    if ($user and $user['id'] === $id) {
        return true;
    }
    return false;
}
