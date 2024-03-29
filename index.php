<?php
	include("includes/check_session.inc");
	include('includes/dbc.php');
	include('DB/reports/dashboard_qc.inc');
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<?php include("includes/head.inc"); ?>
		<?php include("includes/js.inc"); ?>
		<title>
			QI Metrics Home
		</title>
	</head>
	<body>
	<div id="page-container">
		<div id="content-wrap">
		<header class="jumbotron mt-4">
		<div class="container logo_div">
					<div class="display-1 mb-4">
						<img src="images/logo_metrix-sm.png" alt="logo">
						<div class="logo_text">
						QMETRIX
						</div>
					</div>
				</div>
		</header>
		<div class="container">
		<?php include("includes/nav.inc"); ?>
		<h2 class="mt-5 mb-2 head_text text-center">Welcome to QMetrix <?php echo $fname ?>!</h2>
		<br>
		<h3 class="mb-5 text-center">Metrics for the Week of 
			<?php
				$monday = date('F jS', strtotime('monday this week'));
				$sunday = date('F jS, Y', strtotime('sunday this week'));
				echo $monday." - ".$sunday;
			?>
		</h3>
		<h3 class="mt-5 mb-4">QI Department Metrics</h3>
          <div class="row mb-4">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body card-body-dash">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-parking mdi-48px text-warning"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Projects</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
						<?php
									include('includes/dbc.php');
									$query = "SELECT *,
									COUNT(pr_id) as 'Total_Projects'
									FROM `time_log`
									WHERE 1=1
									AND tl_date BETWEEN DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -0 DAY)
									AND DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -6 DAY)";
									$result = mysqli_query($con,$query);
									while ($rows = mysqli_fetch_array($result))
									{
									echo $rows['Total_Projects'];
									}
								?>
						</h3>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0">
                    Active Projects in QI
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body card-body-dash">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-format-list-checks mdi-48px text-success"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Test Cases</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
						<?php
									include('includes/dbc.php');
									$query = "SELECT  SUM(cont_gram_pass)+SUM(cont_gram_fail)+SUM(func_pass)+SUM(func_fail)+SUM(non_func_pass)+SUM(non_func_fail) as 'Total_Executed'
									FROM `tc_execution`
									WHERE 1=1
									AND exec_date BETWEEN DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -0 DAY)
									AND DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -6 DAY)";
									$result = mysqli_query($con,$query);
									while ($rows = mysqli_fetch_array($result))
									{
									echo $rows['Total_Executed'];
									}
								?>
						</h3>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0">
                    Test Cases Executed by QI
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body card-body-dash">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-bug-outline text-danger mdi-48px"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Defects</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
						<?php
									include('includes/dbc.php');
									$query = "SELECT SUM(cg_critical)+SUM(cg_major)+SUM(cg_minor)+SUM(func_critical)+SUM(func_major)+SUM(func_minor)+SUM(nonf_critical)+SUM(nonf_major)+SUM(nonf_minor) as 'Total_Defects'
									FROM `defects`
									WHERE 1=1
									AND df_date BETWEEN DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -0 DAY)
									AND DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -6 DAY)";
									$result = mysqli_query($con,$query);
									while ($rows = mysqli_fetch_array($result))
									{
									echo $rows['Total_Defects'];
									}
								?>
						</h3>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0">
                     Defects Found by QI
                  </p>
                </div>
              </div>
			</div>
			<br>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body card-body-dash">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-format-title text-info mdi-48px"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Tickets</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
						<?php
									include('includes/dbc.php');
									$query = "SELECT *,
									COUNT(tl_id) as 'Total_Tickets'
									FROM `time_log`
									WHERE 1=1
									AND tl_date BETWEEN DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -0 DAY)
									AND DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -6 DAY)";
									$result = mysqli_query($con,$query);
									while ($rows = mysqli_fetch_array($result))
									{
									echo $rows['Total_Tickets'];
									}
								?>
						</h3>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0">
                    Tickets Worked by QI
                  </p>
                </div>
              </div>
            </div>
			</div>
			<br>
			<h3 class="my-5">My Lead</h3>
		  <br>
		  <h3 class="my-5">My QC</h3>
		  <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body" style="background-color:#11294F">
                  <div class="row d-none d-sm-flex mb-4">
                    <div class="col-4">
                      <h5 class="text-center">Test Cases Written</h5>
                      <p class="text-center">
					  <?php
									include('includes/dbc.php');
									$query = "SELECT SUM(tc_cont_gram)+SUM(tc_func)+SUM(tc_non_func) as 'Analyst_TCW'
									FROM `tc_creation`
									WHERE 1=1
									AND tc_date BETWEEN DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -0 DAY)
									AND DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -6 DAY)
									AND user_id=$user_id";
									$result = mysqli_query($con,$query);
									while ($rows = mysqli_fetch_array($result))
									{
									echo $rows['Analyst_TCW'];
									}
								?>
					  </p>
                    </div>
                    <div class="col-4">
                      <h5 class="text-center">Test Cases Executed</h5>
                      <p class="text-center">
					  <?php
									include('includes/dbc.php');
									$query = "SELECT SUM(cont_gram_pass)+SUM(cont_gram_fail)+SUM(func_pass)+SUM(func_fail)+SUM(non_func_pass)+SUM(non_func_fail) as 'Analyst_TCE' 
									FROM `tc_execution` WHERE 1=1 AND exec_date BETWEEN DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -0 DAY) 
									AND DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -6 DAY) AND user_id=$user_id";
									$result = mysqli_query($con,$query);
									while ($rows = mysqli_fetch_array($result))
									{
									echo $rows['Analyst_TCE'];
									}
								?>
					  </p>
                    </div>
                    <div class="col-4">
                      <h5 class="text-center">Defects Found</h5>
                      <p class="text-center">
					  <?php
									include('includes/dbc.php');
									$query = "SELECT SUM(cg_critical)+SUM(cg_major)+SUM(cg_minor)+SUM(func_critical)+SUM(func_major)+SUM(func_minor)+SUM(nonf_critical)+SUM(nonf_major)+SUM(nonf_minor) as 'Analyst_TCD'
									FROM `defects`
									WHERE 1=1
									AND df_date BETWEEN DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -0 DAY)
									AND DATE_SUB(CURDATE(),INTERVAL WEEKDAY(CURDATE()) -6 DAY)
									AND user_id=$user_id";
									$result = mysqli_query($con,$query);
									while ($rows = mysqli_fetch_array($result))
									{
									echo $rows['Analyst_TCD'];
									}
								?>
					  </p>
                    </div>
                  </div>
				  <canvas id="myChart" height="150" style="background-color: #EDEADF;"></canvas>
					<script>
					var ctx = document.getElementById("myChart").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
								labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday","Sunday"],
								datasets: [
									{
										label: 'Test Cases Written',
										data: [<?php echo $tc_total;?>],
										backgroundColor: 'rgba(165,26,77, 0.2)',
										borderColor: 'rgba(165,26,77,1)',
										borderWidth: 1
						},
						{
										label: 'Test Cases Executed',
										data: [<?php echo $tce_total;?>],
										backgroundColor: 'rgba(0,140,192, 0.2)',
										borderColor: 'rgba(0,140,192)',
										borderWidth: 1
						},
						{
										label: 'Defects Found',
										data: [<?php echo $df_total;?>],
										backgroundColor: 'rgba(0,121,38, 0.2)',
										borderColor: 'rgba(0,121,38,1)',
										borderWidth: 1
						}
								]
						},
						options: {
								scales: {
										yAxes: [{
												ticks: {
														beginAtZero:true
												}
										}]
								}
						}
					});
					</script>

                </div>
              </div>
            </div>
		  </div>
	


		<?php include("includes/to_top.inc"); ?>
		
</div>
</div>
	<?php include("includes/footer.inc"); ?>
</div>
</body>
</html>