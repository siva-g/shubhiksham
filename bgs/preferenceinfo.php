<!DOCTYPE html>
<html>
<head>
  <?php include 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Member Preferences
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">


    <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
                <li ><a href="#revenue-chart" data-toggle="tab">Basic Preference informations</a></li>
                <li ><a href="#revenue-chart" data-toggle="tab">Basic Location preference</a></li>
                <li ><a href="#revenue-chart" data-toggle="tab"> Basic Professional preference</a></li>           
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

        </section>
      
      
      
  </section>
    <!-- /.content -->
  </div>
<?php include 'footer.php'; ?>
</body>
</html>
