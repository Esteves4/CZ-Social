<?php
require_once("conecta.php");

$resultado = mysql_query("Select conta_id from contas where nome='lucas'");

while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
    printf("ID: %s", $row['conta_id']);

}

?>
