<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Dashboard -->
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
<script src="js/demo/dashboard-demo.js"></script>

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/lang/es.js"></script>
<script>
  $(function() {
   $('[data-toggle="tooltip"]').tooltip()
 })

  $(document).ready(function() {
   $("#provincia").change(function() {
    $("#provincia option:selected").each(function() {
     elegido = $(this).val();
     $.post("../source.php", {
      elegido : elegido
    }, function(data) {
      $("#localidades").html(data);
    });
   });
  })
 });  

  $("textarea").each(function(){
    CKEDITOR.replace(this, {      
      customConfig: 'config.js'
    } );
  });
  
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
</body>

</html>

