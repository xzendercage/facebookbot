<div class="row">
	<div class="col-md-6">
		<div class="panel panel-filled">
			<div class="panel-heading">
				<div class="panel-tools">
					<a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
					<a class="panel-close"><i class="fa fa-times"></i></a>
				</div>
Dashboard Menu			</div>
			<div class="panel-body">
				<p>Hello <code><?=$_SESSION['ten'];?></code> Your Fb ID <code><?=$_SESSION['idfb'];?></code></p>
				<?
					$check= @mysql_query("SELECT * FROM CamXuc WHERE idfb = '".$_SESSION[idfb]."'");
					$arr = @mysql_fetch_array($check);
					if(mysql_num_rows($check) < 1)
					{
						$status = 'Not Slected';
					}
					else
					{
						$key = 1;
					 	$input = '<input type="hidden" name="capnhat"  value="capnhat">';
					 	$status = ' '.$arr[camxuc];
					 } 
				?>
				<p>Reaction: <code><?=$status;?></code></p>
				<form action="post/action.php" method="POST">
					<div class="radio"><label> <input type="radio" name="reaction" id="LOVE" value="LOVE" checked="checked"> Reaction: LOVE </label></div>
					<div class="radio"><label> <input type="radio" name="reaction" id="WOW" value="WOW">Reaction: WOW </label></div>
					<div class="radio"><label> <input type="radio" name="reaction" id="HAHA" value="HAHA">Reaction: HAHA </label></div>
					<div class="radio"><label> <input type="radio" name="reaction" id="SAD" value="SAD">Reaction: SAD </label></div>
					<div class="radio"><label> <input type="radio" name="reaction" id="ANGRY" value="ANGRY">Reaction: ANGRY </label></div>
					<div class="radio"><label> <input type="radio" name="reaction" id="THANKFULL" value="THANKFULL">Reaction: THANKFULL </label></div>
					<div class="radio"><label> <input type="radio" name="reaction" id="ANGRY" value="tatbot">Turn Off </label></div>
					<?if($key==1)echo $input;?>
					<center><button type="submit" class="btn btn-w-md btn-success"><?if($key==1)echo "Update Bot"; else echo "Active Bot";?></button>
				</form>
				</center>                      
			</div>
		</div>
	</div>
	<div class="col-md-6">
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
								<th>Name</th>
								<th>IDs</th>
							</tr>
						</thead>
						<tbody>
						<?
						$res= @mysql_query("SELECT * FROM CamXuc  LIMIT 5");
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