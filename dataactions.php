<?php

require 'connection.php';

$output = null;

if($_REQUEST['action'] == "SELECT"){
    
   $aColumns = array( 'motorista_nome', 'motorista_cel', 'motorista_email', 'idstatus');

    /* DB table to use */
    $sTable = "motoristas m";
    
    $sInner = " INNER JOIN
                    status s ON s.idstatus = m.motorista_status ";
    $sWhere = "WHERE m.id_motorista = {$_REQUEST['id']}";
    
    $sQuery = "
            SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
            FROM   $sTable
            $sInner    
            $sWhere
            ";

    $rResult = $gaSql['link']->query($sQuery) or fatal_error( 'MySQL Error: ' . $gaSql['link']->connect_errno);
    
    while ( $aRow = mysqli_fetch_array( $rResult ) )
    {
            $row = array();
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                    if ( $aColumns[$i] != ' ' )
                    {      
                        $row[$aColumns[$i]] = utf8_encode($aRow[ $aColumns[$i] ]);                      
                            
                    }
            }
            $output = $row;
    }  
}

if($_REQUEST['action'] == "UPDATE"){
    
    $aFields =  "`motorista_nome` =  '".utf8_decode($_REQUEST['nome'])."' ,`motorista_cel`  = '{$_REQUEST['cel_tim']}', `motorista_email` =  '".utf8_decode($_REQUEST['email'])."',
                `motorista_status`  = {$_REQUEST['status']}";
    
    $sWhere = "WHERE `id_motorista` = {$_REQUEST['id']}";
    $sTable = "motoristas";
    $sQuery = "
            UPDATE $sTable 
            SET $aFields
            $sWhere
            ";
    $rResult = $gaSql['link']->query($sQuery) or fatal_error( 'MySQL Error: ' . $gaSql['link']->connect_errno);
    
    $output = $rResult; 
}

if($_REQUEST['action'] == "INSERT"){
    
    $aFields = array( 'motorista_nome', 'motorista_cel', 'motorista_email');
    
    $aValues =  "'".utf8_decode($_REQUEST['nome'])."' ,'{$_REQUEST['cel_tim']}','".utf8_decode($_REQUEST['email'])."'";
    $sTable = "motoristas";
    $sQuery = "
            INSERT INTO $sTable 
            (`".str_replace(" , ", " ", implode("`, `", $aFields))."`)
            VALUES ($aValues)
            ";
    $rResult = $gaSql['link']->query($sQuery) or fatal_error( 'MySQL Error: ' . $gaSql['link']->connect_errno);
    
    $output = $rResult; 
}


if($_REQUEST['action'] == "DELETE"){
    
    $sWhere = "WHERE `id_motorista` = {$_REQUEST['id']}";    
    
    $sTable = "motoristas";
    
    $sQuery = "
            DELETE FROM $sTable 
            $sWhere
            ";
    $rResult = $gaSql['link']->query($sQuery) or fatal_error( 'MySQL Error: ' . $gaSql['link']->connect_errno);
}

$gaSql['link']->close();
echo json_encode( $output );




