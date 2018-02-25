<?php
/**
 * Created by PhpStorm.
 * User: mlang
 * Date: 18.02.18
 * Time: 18:35
 *
 * Hi there, this class is the starting point of
 * our guestbook application.
 * Its purpose is to load classes that we need (autoloading) and process the
 * request till we can generate a response and send it back (boostraping).
 *
 */

//Make sure that whenever this script is executed, we are in it's directory.
chdir(__DIR__);

/**
 * Class Autloader
 * Demonstrates the inclusion of files at runtime.
 * Once registered through spl_autoload_register (see below)
 * The classLoader function will be called once an object is
 * created. Through this mechanism, we can later include many
 * libraries without needing to know where exactly their files are saved.
 */
class Autloader
{
    /**
     * @param string $name
     */
    public static function classLoader(string $name)
    {

        if (file_exists('guestbook/'.$name .'.php')) {
            include 'guestbook/'.$name .'.php';
        }

    }
}

spl_autoload_register('Autloader::classLoader');


/*
Simply checking a parameter to decide which class to load
Call http://127.0.0.1:8811/index.php?action=post or
http://127.0.0.1:8811/index.php?action=comment */

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'Comment') {
        $comment = new Comment();
    }
    if ($_GET['action'] == 'Post') {
        $comment = new Post();
    }
}

