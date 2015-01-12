<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

@chdir(dirname(__FILE__).'/'); //Change dir.
require('api.inc.php');

$qfrom=' FROM '.TICKET_TABLE.' ticket '.
       ' LEFT JOIN '.TICKET_STATUS_TABLE. ' status
            ON (status.id = ticket.status_id) '.
       ' LEFT JOIN '.DEPT_TABLE.' dept ON ticket.dept_id=dept.id ';

$qwhere =" WHERE status.state='open' AND ticket.dept_id <> 3  ";//AND ticket.isanswered=0 ";
//get ticket count based on the query so far..
$total=db_count("SELECT count(DISTINCT ticket.ticket_id) $qfrom $sjoin $qwhere");

header("Content-Type: application/json");
echo json_encode(array("open_tickets" => $total));