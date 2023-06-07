<?php

function isLoggedIn()
{
    return isset($_SESSION['username']);
}

function isAdminLoggedIn()
{
    return isset($_SESSION['admin_name']);
}

function isAdmin()
{
    if(isset($_SESSION['user_type']))
    {
        if($_SESSION['user_type']=='admin')
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    else
    {
        return FALSE;
    }
}
