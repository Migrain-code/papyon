<?php

use Illuminate\Support\Facades\Broadcast;

/*Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('private-channel.user.{id}', function ($user, $id){
    return $user->id == $id;
});*/
Broadcast::channel('order-channel', function ($user) {
    // Define logic to authorize the user, e.g., check user role or ID
    return true; // Adjust as needed
});
