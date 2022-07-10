<?php

function url(string $path): string
{
    return $_SERVER['SCRIPT_NAME'] . $path;
}