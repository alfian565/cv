<?php
    include 'config.php';
    include 'header.php';
?>
<html>
<head>
    <title>Tambahkan Admin</title>
    <style>
        .input-group{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>	
	<div class="container">
		<div class="tambah-admin">
			<form action="tambah_admin_act.php" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
                    <h3>Masukkan Data Admin</h3>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="uname">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
					<div class="input-group">			
						<input type="submit" class="btn btn-primary" value="Tambahkan Admin">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>