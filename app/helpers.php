<?php

/**
 * @return \App\Models\User
 */
function currentUser()
{
    return auth()->user();
}