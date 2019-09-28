<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>

    <?php
include 'koneksi.php';
?>

<div class="col-sm-6" style="padding-top: 20px; padding-bottom: 20px;">
<h3>Data</h3>
<hr>
      <span class="pull-left"><a href="#add" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
          <table class="table table-stripped table-hover datatab">
              <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Work</th>
                  <th>Salary</th>
                  </tr>
              </thead>
                  <tbody>
                  <?php
                  $query = mysql_query("SELECT name.* , work.name, category.salary FROM name INNER JOIN work ON name.id_work = work.id INNER JOIN category on name.id_salary = category.id");
                  $no = 1;
                  while ($data = mysql_fetch_array($query))
                  {
                  ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['salary']; ?></td>
                    <td>
                <!-- Button untuk modal -->
                <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>">Edit</a>
                <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#del<?php echo $data['id']; ?>">Delete</a>

<!-- delete data -->
<div class="modal fade" id="del<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
    <?php
      $del=mysql_query("select * from name where id='".$data['id']."'");
      $drow=mysql_fetch_array($del);
    ?>
    <div class="container-fluid">
      <h5><center>ID: <strong><?php echo $drow['id']; ?></strong></center></h5>
            </div>
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            </div>

        </div>
    </div>
</div>

</td>
</tr>
<!--========================================================================================================================================-->

<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id']; ?>" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
                <h4 class="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
      <div class="modal-body">
          <form role="form" action="edit.php" method="get">

              <?php
              $id = $data['id'];
              $query_edit = mysql_query("SELECT * FROM name WHERE id='$id'");
              while ($row = mysql_fetch_array($query_edit)) {
              ?>

                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                  <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                  </div>

                  <div class="form-group">
                      <label>Work</label>
                        <select class="browser-default custom-select" name="id_work">
                              <?php
                            $query_mysql = mysql_query("SELECT * FROM work");
                            while($data = mysql_fetch_array($query_mysql)){

                            ?>
                            <option value="<?php echo $data['id'] ?>" name="id_work"  selected><?php echo $data['name'] ;?></option>
                            <?php
                            }
                            ?>

                        </select>
                  </div>

              <div class="form-group">
                  <label>Salary</label>
                    <select class="browser-default custom-select" name="id_salary">
                          <?php
                        $query_mysql = mysql_query("SELECT * FROM category");
                        while($data = mysql_fetch_array($query_mysql)){

                        ?>
                        <option value="<?php echo $data['id'] ?>" name="id_salary" selected><?php echo $data['salary'] ;?></option>
                        <?php
                        }
                        ?>

                  </select>
              </div>

      <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

      <?php
      }
      ?>
      </form>
    </div>
</div>

  </div>
</div>

      <?php
      }
      ?>
      </tbody>
  </table>
</div>
<!--========================================================================================================================================-->

<!-- modal add data -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="modalLabel">Add Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>


      <div class="modal-body">
        <form class="" action="function_user.php" method="post">

          <div class="form-group">
            <div class="row">
            <label class="col-sm-3 control-label text-right">Nama <span class="text-red">*</span></label>
            <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value=""></div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
            <label class="col-sm-3 control-label text-right">Work <span class="text-red">*</span></label>
            <div class="col-sm-8">
              <select class="browser-default custom-select" name="id_work">
                <option selected>work</option>
                <?php
              $query_mysql = mysql_query("SELECT * FROM work");
              while($data = mysql_fetch_array($query_mysql)){

            ?>
            <option value="<?php echo $data['id'] ?>" name=""><?php echo $data['name'] ;?></option>
            <?php
          }
          ?>

              </select>
            </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
            <label class="col-sm-3 control-label text-right">Salary <span class="text-red">*</span></label>
            <div class="col-sm-8">
              <select class="browser-default custom-select" name="id_salary">
                <option selected>Salary</option>
                <?php
              $query_mysql = mysql_query("SELECT * FROM category");
              while($data = mysql_fetch_array($query_mysql)){

            ?>
            <option value="<?php echo $data['id'] ?>" name=""><?php echo $data['salary'] ;?></option>
            <?php
          }
          ?>

              </select>
            </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
          </div>
          </form>
      </div>


    </div>
  </div>

</div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script>
      $(document).ready(function() {
      $('.datatab').DataTable();
      } );
    </script> -->
</html>
