<?php
require 'functions.php';
function preSetup( PDO $pdo ) {
	@$pdo->exec( 'DROP SEQUENCE benchmark_seq' );
}

function postSetup( PDO $pdo ) {
	$pdo->exec( 'CREATE SEQUENCE benchmark_seq' );
	$pdo->exec( 'CREATE TRIGGER trg_benchmark_id 
BEFORE INSERT ON benchmark FOR EACH ROW
BEGIN
    :new.id := benchmark_seq.nextval; 
END;' );
}

setupSchema( 'oci:dbname=//ninetales:1521/XE', 'NUMBER(10,0)', 'VARCHAR2(1)', 'NUMBER(1,0)', 'TABLESPACE users', '' );
