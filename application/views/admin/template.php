
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Color Admin<?= isset($title) ? ' | '.$title : ''; ?></title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  
  <!-- ================== BEGIN BASE CSS STYLE ================== -->

  <?php $this->load->view('admin/partials/css.php'); ?>
  <?php
    if (isset($css)) {
      foreach ($css as $value) {
        echo "<link rel='stylesheet' href='".base_url($value)."'/>";
      }
    }
  ?>  
  <!-- ================== END BASE CSS STYLE ================== -->

  <?php $this->load->view('admin/partials/js.php'); ?>
  <?php
    if (isset($js)) {
      foreach ($js as $value) {
        echo "<script src='".base_url($value)."'></script>";
      }
    }
  ?>
</head>
<body>
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <?php
    $this->load->view('admin/partials/header.php');    
    ?>
    
    <!-- begin #sidebar -->
    <?php
    $this->load->view('admin/partials/sidebar.php');
    ?>
    
    <!-- begin #content -->
    <?php
      // $this->load->view('admin/partials/content.php');
      echo $content;
    ?>
    <!-- end #content -->
    
    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
  </div>
  <!-- end page container -->
  
</body>
</html>

