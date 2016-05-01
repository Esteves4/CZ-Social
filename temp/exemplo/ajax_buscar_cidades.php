<?php
include('conexao.php');
$estado = $_GET['estado'];
$sql = "SELECT * FROM cad_cidades WHERE est_id = $estado ORDER BY cid_nome";
$res = mysql_query($sql, $conexao);
$num = mysql_num_rows($res);
for ($i = 0; $i < $num; $i++) {
  $dados = mysql_fetch_array($res);
  $arrCidades[$dados['cid_id']] = utf8_encode($dados['cid_nome']);
}
?>

<label>Cidades:</label>
<select name="cidade" id="cidade">
  <?php foreach($arrCidades as $value => $nome){
    echo "<option value='{$value}'>{$nome}</option>";
  }
?>
</select>