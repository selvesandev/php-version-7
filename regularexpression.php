<?php

$subject = "Aaaaa aa BBBbb";

preg_replace_callback_array([
    '~[a]+~i' => function ($match) {
        echo '[a] ', $match[0] . '<br>';
    },
    '~[b]+~i' => function ($match) {
        echo '[b] ', $match[0] . '<br>';
    }
], $subject);

