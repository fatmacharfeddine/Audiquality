<?php include "Header.php"; ?>


<!-- //header-ends -->
<!-- main content start -->
<?php
foreach ($css_files as $file) : ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<div class="main-content">

	<!-- content -->
	<div class="container-fluid content-top-gap">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb my-breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
			</ol>
		</nav>
		<div class="welcome-msg pt-3 pb-4">
			<h1>Hi <span class="text-primary">Auditor</span>, Welcome </h1>
			<p></p>
		</div>
		<div>
			<a href='<?php echo site_url('Auditor/Chapters') ?>'>Chapters</a> |
			<a href='<?php echo site_url('Auditor/Subjects') ?>'>Subjects</a> |
			<a href='<?php echo site_url('Auditor/Questions') ?>'>Questions</a> |
			<a href='<?php echo site_url('Auditor/Responses') ?>'>Responses</a> |
			<a href='<?php echo site_url('Auditor/Department') ?>'>Departments</a> |
			<a href='<?php echo site_url('Auditor/Questions') ?>'>Year</a>

		</div>
		<div style='height:20px;'></div>
		<div style="padding: 10px">
			<?php echo $output; ?>
		</div>
		<?php foreach ($js_files as $file) : ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
	</div>
	<!-- //content -->
</div>
<!-- main content end-->
</section>
<!--footer section start-->
<?php include "Footer.php"; ?>