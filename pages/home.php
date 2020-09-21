<div class="row">
	<div class="col-md-12">
		<div class="panel panel-filled">
			<div class="panel-heading">
				<div class="panel-tools">
					<a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
					<a class="panel-close"><i class="fa fa-times"></i></a>
				</div>
		Login Token
			</div>
			<div class="panel-body">
				<p>Use your<code> Full token </code>for <code>login</code>, We will not save your token as well as will<code> secure </code>your token.</p>
				
					<div class="form-group"><label for="exampleInputEmail1"> Enter Your Full Token Below</label> <input type="text" class="form-control" id="token" name="token" placeholder="Put Token Here..."></div>
					<button id="login" class="btn btn-success" onclick="logintoken()">Login To Panel</button>
	

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#lienhe"> Get Token</button>



			</div>
		</div>
	</div>






<div class="row">


	<div class="col-md-8">
		<div class="panel panel-filled">
			<div class="panel-heading">
				<div class="panel-tools">
					<a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
					<a class="panel-close"><i class="fa fa-times"></i></a>
				</div>
				 Login Panel
			</div>
			<div class="panel-body">
			<p> If You Are Using <code>Reaction</code> Mobile Version And Not Login ? <p>
			<a class="btn btn-success btn-block" target="_blank" href="http://facebook.com/mstricks2"><i class="fa fa-cog" aria-hidden="true"></i> Click here. We Will Help To Set Up Bot For You♥ </a>
				<form action="login/login-sys.php" method="POST">
					<div class="form-group"><label for="exampleInputEmail1">Enter Your Facebook Email/Username</label> <input type="text" class="form-control" id="email" name="account" placeholder="Email/Username here..."></div>
					<div class="form-group"><label for="exampleInputPassword1">Enter Your Facebook Password</label> <input type="password" class="form-control" id="pass" name="password" placeholder="Password here..."></div>
					<button type="submit" class="btn btn-default">Login To System</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-filled">
			<div class="panel-heading">
				<div class="panel-tools">
					<a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
					<a class="panel-close"><i class="fa fa-times"></i></a>
				</div>
                 Statistical
				</div>
			<div class="panel-body">
			<p>The latest <code> user </code> information is updated here.</p>
				<div class="table-responsive">
					<table  class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Reaction</th>
								<th>Username</th>
								<th>Facebook IDs</th>
							</tr>
						</thead>
						<tbody>
						<?
						$res= @mysql_query("SELECT * FROM CamXuc LIMIT 5");
						while ($arr = mysql_fetch_array($res)) 
						{
						?>
							<tr>
								<td><?echo$arr['camxuc'];?></td>
								<td><?echo$arr['ten'];?></td>
								<td><?echo$arr['idfb'];?></td>
							</tr>
						<?}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
