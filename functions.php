<?php
function populateData( PDO $pdo ) {
	$pdo->beginTransaction();
	$s = $pdo->prepare( 'insert into benchmark (idata, sdata) values (:i, :s)' );
	for ( $x = 0; $x < 100000; $x ++ ) {
		$s->execute( array( ":i" => 1, ":s" => "a" ) );
		$s->execute( array( ":i" => 2, ":s" => "b" ) );
		$s->execute( array( ":i" => 3, ":s" => "c" ) );
		$s->execute( array( ":i" => 4, ":s" => "d" ) );
		$s->execute( array( ":i" => 5, ":s" => "e" ) );
	}
	$pdo->commit();
}

function setupSchema( $connectionString, $idType, $strType, $intType, $tableOptions, $idOptions ) {
	$pdo = new PDO( $connectionString, 'benchmark', 'benchmark' );
	$pdo->setAttribute( PDO::ERRMODE_EXCEPTION, 1 );
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

	preSetup( $pdo );

	@$pdo->exec( 'DROP TABLE benchmark' );
	$pdo->exec( '
CREATE TABLE benchmark (	
    id ' . $idType . ' NOT NULL ' . $idOptions . ', 
    sdata ' . $strType . ' NOT NULL, 
    idata ' . $intType . ' NOT NULL,
    PRIMARY KEY (id)
) ' . $tableOptions );
	$pdo->exec( 'CREATE INDEX i_sdata ON benchmark (sdata)' );
	$pdo->exec( 'CREATE INDEX i_idata ON benchmark (idata)' );

	postSetup( $pdo );
	populateData( $pdo );
}
