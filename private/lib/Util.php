<?php

class Util {

    public static function todo($user, $comment = '')
    {
        throw new Exception("Todo (@{$user}): {$comment}");
    }
}