<tr>
  <td>Select Root Category</td>
  <td>
    <select id='root'>
      <option>Clothes</option>
      <option>Footwear</option>
      <option>Accessories</option>
    </select>
  </td>
</tr>
<tr>
  <td>Select Category</td>
  <td>
    <select>
      <option>Clothes</option>
      <option>Footwear</option>
      <option>Accessories</option>
    </select>
    </td>
</tr>

<script src='js/jquery.js'></script>
<script>

$(document).ready(function(){
$("#root").change(function(){
var root = $("#root").find(":selected").text();
$.get("admin_database.php", {name:root}, function(status,data){
  optionsAsString = "<option>" + data + "</option>";
  $("#root").append( optionsAsString );
})
})


});


</script>