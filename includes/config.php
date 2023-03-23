<?php  
// if ($_SERVER['HTTP_HOST'] == 'localhost') {
//     session_start();
//     define("DB_NAME", "escape");
//     define("DB_HOST", "localhost");
//     define("DB_USER", "escape");
//     define("DB_PASSWORD", "fFh7k5X2grH64A");
// } else {
//     session_start();
//     define("DB_NAME", "daruom4733_esacape");
//     define("DB_HOST", "mysql-daruom4733.alwaysdata.net");
//     define("DB_USER", "260920");
//     define("DB_PASSWORD", "fFh7k5X2grH64A");
// }

session_start();
    define("DB_NAME", "daruom4733_esacape");
    define("DB_HOST", "mysql-daruom4733.alwaysdata.net");
    define("DB_USER", "260920");
    define("DB_PASSWORD", "fFh7k5X2grH64A");

    define("DIFFICULTY", [
        null,
        "FACILE",
        "INTERMÉDIAIRE",
        "CONFIRMÉ",
        "EXPERT",
      ]);
?>