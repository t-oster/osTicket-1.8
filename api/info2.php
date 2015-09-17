<?php
@chdir(dirname(__FILE__).'/'); //Change dir.
require('api.inc.php');

$tickets = array();
//get ticket count based on the query so far..
$q = db_query("SELECT ticket.ticket_id, ticket.number, ticket.lastupdate, ticket.closed FROM ".TICKET_TABLE." ticket 
       LEFT JOIN ".TICKET_STATUS_TABLE. " status ON (status.id = ticket.status_id)
       WHERE ticket.closed > '2015-07-30' AND ticket.lastupdate > ticket.closed
       AND status.state <> 'open'
       ORDER BY ticket.lastupdate DESC
        ");
$res = db_fetch_array($q);
while ($res)
{
    $tickets []= $res;
    $res = db_fetch_array($q);
}
if (count($tickets) > 0)
{
    error_log("Es gibt wieder nicht-repoened tickets. Guckst du http://support.one-bath.de/api/info2.php", 1, "mail@thomas-oster.de");
}
?>
<html>
    <body>
        <h2>Nicht wiedergeöffnete Tickets</h2>
        <table>
            <thead>
                <tr><th>Ticket</th><th>Letztes Update</th><th>Geschlossen</th></tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $t):?>
                <tr>
                    <td><a href="http://support.one-bath.de/scp/tickets.php?id=<?php echo $t["ticket_id"];?>"><?php echo $t["number"];?></a></td>
                    <td><?php echo $t["lastupdate"];?></td>
                    <td><?php echo $t["closed"];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </body>
</html>