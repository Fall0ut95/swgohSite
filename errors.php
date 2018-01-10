<!DOCTYPE html>
<head>
	<style>
	.error {
		width: 92%;
		margin: 0px auto;
		padding: 10px;
		border: 1px solid red;
		color: red;
		background: #F2DEDE;
		border-radius: 5px;
		text-align: left;
	}
	</style>
</head>
<body>
<?php if (count($errors) > 0): ?>
	<div class="error">
		<?php  foreach ($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>
</body>
</html>