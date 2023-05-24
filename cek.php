<?php
/**

**/
?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
  <title>PROJEK ALGAZA</title>
  <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php" style="color: #fff;">
      PROJEK Cari Lokasi
    </a>
  </nav>
<?php
$data_terakhir = 'log.txt';
$data = file_get_contents($data_terakhir);

$data_ = explode("=", $data);
$total_ = count($data_);
$total = $total_-1;
?>
  
  <div class="container">
    <h2 align="center" style="margin: 30px;">CARI BERDASARKAN ID</h2>
    ID terakhir didapatkan : 
<?php
$no = 0;
while ($no <= $total) {

echo $data_[$no].", ";
$no++;

}

?>

    <br/>


Total <?=$total?>

<CENTER>
        <div class="col-sm-3">
            <div class="form-group form-inline">

                <input type="text" name="s_keyword" id="s_keyword" value="<?=$_GET['id']?>" class="form-control">
            </div>
        </div>
</CENTER>        
    </div><hr>
<center>
    <div class="data"></div>
</center>
    </div><hr>

    <div class="text-center">© 2023 Copyright:
      <a href="https://instagram.com/b4lgaza"> BALGAZA</a>
  </div>

    <!-- Untuk Keperluan Demo Saya Menggunakan JQuery Online, Jika sobat menggunakan untuk keperluan developmen/production maka download JQuery pada situs resminya -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.data').load("data.php");
      $("#search").click(function(){
        var jurusan = $("#s_jurusan").val();
        var keyword = $("#s_keyword").val();
        $.ajax({
              type: 'POST',
              url: "data.php",
              data: {jurusan: jurusan, keyword:keyword},
              success: function(hasil) {
                  $('.data').html(hasil);
              }
          });
      });

  });
  </script>
  <script>
    $(document).ready(function(){
      load_data();
      function load_data(jurusan, keyword)
      {
        $.ajax({
          method:"POST",
          url:"data.php",
          data: {jurusan: jurusan, keyword:keyword},
          success:function(hasil)
          {
            $('.data').html(hasil);
          }
        });
      }
      $('#s_keyword').keyup(function(){
        var jurusan = $("#s_jurusan").val();
          var keyword = $("#s_keyword").val();
        load_data(jurusan, keyword);
      });
      $('#s_jurusan').change(function(){
        var jurusan = $("#s_jurusan").val();
          var keyword = $("#s_keyword").val();
        load_data(jurusan, keyword);
      });
    });
  </script>
</body>
</html>