<?php
function preSetup( PDO $pdo ) {
}

function postSetup( PDO $pdo ) {
}

setupSchema( 'mysql:dbname=benchmark,host=ninetales', 'INT(11)', 'VARCHAR(1)', 'INT(1)', 'ENGINE=InnoDB', 'auto_increment' );
