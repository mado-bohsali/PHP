<?php

/*
    $_POST: We used $_GET earlier in this chapter. $_POST is similar, but with one difference.
    $_GET fetches you the values from a query string, whereas $_POST contains the data from a form on any PHP page.
    $_FILES: If a file is uploaded from a form on a page, its information is available in the $_FILES array.
    $_COOKIE: This allows basic text information to be stored as a cookie on the client's browser to be saved for later.
              A common example of this is if you log in to a website and tick Remember me, a cookie will be saved on the browser,
              which will be read on the next visit.
    $_REQUEST: This contains the combined information of $_GET, $_POST, and $_COOKIE.
    $_SESSION: These are session variables that are used to maintain state in the application.
               They allow values to be saved in memory for the duration of a session.
               This could be a username that is saved and displayed on the page while the session exists.
    $GLOBALS: This contains all variables that are available to a script.
    It includes variables, data from $_GET, $_POST, any file upload data, session info, and cookie information.
 */


//Print server information - each item out on to a new line, making it easier to read (rendered as an HTML tag)
session_start();
print("Server information:\n");
print_r($_SERVER,true);
print("Cookie information:\n");
print_r($_COOKIE);

$_COOKIE[session_name()] = "Initial Session";

if(array_key_exists('refcode', $_GET)){
    setcookie('ref', $_GET['refcode'], time()+60*60*24);
    echo sprintf('The referral code [%s] was stored in a cookie. ' .
         'Reload the page to see the cookie value above. ' .
         '<a href="super-cookie.php">Clear the query string.', $_GET['refcode']);
} else {
    echo sprintf('<p>No referral code was set in query string</p>');
}

echo sprintf('Referral code sent by browser after request-response cycle is [%s]', 
    array_key_exists('ref', $_COOKIE) ? $_COOKIE['ref']: 'NONE');
    
echo PHP_EOL;
print("Session information (provided by application NOT PHP engine):\n
Store logged-in user data and temporary data like shopping cart items and flash messages\n");
print_r($_SESSION);

if(!session_start()){
    echo "Cannot initiate or resume session!\n";
} else {
    echo "Session already running!\n";
    echo "Session name ".session_name()."\n";
    echo "Session ID ".session_id(). "- belongs to the user accessing the page - stored as a cookie.\n";
    echo $_COOKIE[session_name()]."\n";
}
