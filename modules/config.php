<?php
        const HOST = "localhost";
        const PORT = "3306";
        const DBNAME = "la_tresse";
        const CHARSET = "utf8";

        const DBUSER = "root";
        const DBPASS = "";

        $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";charset=" . CHARSET . "";
        $pdo = new PDO($dsn, DBUSER, DBPASS);