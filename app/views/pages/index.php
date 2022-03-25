<?php

foreach ($data['users'] as $user){
    echo "Info : " . $user->user_name . $user->user_email;
    echo "<br>";
}