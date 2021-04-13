<?php

namespace classes;

// Hàm điều hướng trang
class Redirect
{
    public function __construct($url)
    {
        if ($url) {
            echo '<script>location.href="' . $url . '";</script>';
        }
    }
}