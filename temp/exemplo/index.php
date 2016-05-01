<?php
include('conexao.php');
$sql = "SELECT * FROM cad_estados ORDER BY est_sigla";
$res = mysql_query($sql, $conexao);
$num = mysql_num_rows($res);
for ($i = 0; $i < $num; $i++) {
  $dados = mysql_fetch_array($res);
  $arrEstados[$dados['est_id']] = $dados['est_sigla'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
    function buscar_cidades(){
      var estado = $('#estado').val();
      if(estado){
        var url = 'ajax_buscar_cidades.php?estado='+estado;
        $.get(url, function(dataReturn) {
          $('#load_cidades').html(dataReturn);
        });
      }
    }
    </script>
  </head>
  <body style="font-size: 12px; font-family: 'Arial'">
    <h2>Exemplo para carregar cidade/estado por JQuery</h2>
    <form>
      <div>
      <label>Estado:</label>
      <select name="estado" id="estado" onchange="buscar_cidades()">
        <option value="">Selecione...</option>
        <?php foreach ($arrEstados as $value => $name) {
          echo "<option value='{$value}'>{$name}</option>";
        }?>
      </select>
      </div>
      <div id="load_cidades">
        <label>Cidades:</label>
        <select name="cidade" id="cidade">
          <option value="">Selecione o estado</option>
        </select>
      </div>
    </form>
  </body>
</html>