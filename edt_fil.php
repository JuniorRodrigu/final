<?php
                    
  include "conexao.php";
  $conn = connection();

  try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM distribuidora WHERE id=:id");
  $stmt->bindParam(':id', $id);
  $id           = $_GET['id'];
  $stmt->execute();

  // set the resulting array to associative
  foreach($stmt->fetchAll() as $k=>$v) {
    $id       = $v['id'];
    $filme     = $v['filme'];
    $genero    = $v['genero'];
    $tempo  = $v['tempo'];


  }
  } catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Filmes
  
  </title>
  <?php
    include "_includes/header.php";
  ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php
    include "_includes/leftnav.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Filme</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">editar dados </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" filme="form_distribuidora" method="POST" action="editar.php?id=<?php echo $id; ?>" >
            <div class="card-body">
              <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" required disabled value="<?php echo $id; ?>" >
              </div>
              <div class="form-group">
                <label for="filme">Nome</label>
                <input type="text" class="form-control" id="filme" name="filme" value="<?php echo $filme; ?>" required>
              </div>
              <div class="form-group">
                <label for="genero">CNPJ</label>
                <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $genero; ?>" required>
              </div>
              <div class="form-group">
                <label for="tempo">Celular</label>
                <input type="text" class="form-control" id="tempo" name="tempo" value="<?php echo $tempo; ?>">
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include "_includes/footer.php";
  ?>

</body>
</html>


