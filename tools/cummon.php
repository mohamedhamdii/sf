<?php

function clean_data($data)
{
    return htmlspecialchars(strip_tags(($data)));
}

function crypt_password($data)
{
    return hash('ripemd160', $data);
}
