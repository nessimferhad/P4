<?php

// Fichier contentant la fonction de redirection 

class Http
{
    public static function redirect(string $url): void
    {
        header("location: $url");
        exit();
    }
}
