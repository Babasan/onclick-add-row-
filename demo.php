<?php

$db_server="localhost";
$db_username="root";
$db_password="root";//in window leave it blank
$db_name="dbname";//your database name

//connectionwith database using mysqli

$baba=mysqli_connect("$db_server","$db_username","$db_password", "$db_name") or die("Could not babaect Database") ;


foreach($_REQUEST as $var=>$val)$$var=$val;


$errors=array();
 if($caller=='self')
 {
  
  if(empty($req_name)) $errors['req_name']="Empty";
  
  if(empty($errors))
  {	
	
		$transaction_id=time();
	  for($i=0;$i<count($sub_req);$i++)
		{
			$sub_name=$sub_req[$i];
			$evdenc=$evedence[$i];
			$q="INSERT INTO demo (id, req_name, sub_name, evedence, transaction_id) 
			VALUES (NULL,  '$req_name', '$sub_name', '$evdenc', '$transaction_id')";
			mysqli_query($baba,$q) or die($q.mysqli_error($baba));
			
		}
		$success= "<div align='center'><h3><center><font color=green>Record Saved Successfully</font></center></h3></div>";
		$req_name="";
  } 
  else
    {
	$success="<center><font color=red size=+1>Oh ! Somthing went wrong.</font></center>";
    }	
 } 
?>
<script type='text/javascript' src='jquery-1.7.min.js'></script>
<script type='text/javascript'>
			$(document).ready(function(){		
				
				$('.del').live('click',function(){
					$(this).parent().parent().remove();
				});
				
				$('.add').live('click',function(){
					$(this).val('Delete');
					$(this).attr('class','del danger');
					var appendTxt = '<tr><th><input type=text name=sub_req[] /></th> <th><textarea name=evedence[] /></textarea></th> <th><input type=button class=add success value=Add /></th></tr>';
					$('#table1 tr:nth-last-child(1)').after(appendTxt);			
				});        
			});
		</script> 
<div class='text-shadow'><h2><span class='mif-user-plus mif-3x'></span>&nbsp; Demo</h2></div>

<?php echo $success;?>

		 <hr  class='bg-blue'/>
		 <br>
<form method='post' action='demo.php'>
				
				<div class='row cells3' align='center'>								
							<div class='cell'>
											<div class='text-shadow'>
													<h4>Recquirement Name<font color=red>&nbsp;*</font></h4>
											</div>
							</div>
							<div class='cell colspan2'>
											<div class='input-control text full-size text success'>
													<input type='text' name='req_name' >
													<font color=red><?php echo $errors['req_name'];?></font>
											</div>
													
							</div>				
				</div>
					<br>
					<br>
					<br>
					<div class='row cells3'>								
							<table id='table1' class='table  hovered cell-hovered' width='100%' >					
								<tr class='success'>
									<th>Sub Recquirement</th>
									<th>Evidence</th>
									<th>&nbsp;</th>
								</tr>                 
								<tr>
									<th><input type='text'   name='sub_req[]' /></th>
									<th><textarea name='evedence[]' /></textarea></th>
									<th><input type='button' class='add' value='Add' /></th>
								</tr>
							</table>			
						</div>
								
				</div>
			<br>
<div class='row cells3'>	
				<div class='cell '></div>
						<div class='cell colspan='2' align='center'>
						<input type='hidden' name='caller' value='self'>
					<button type='sub_reqit' class='button success'><span class='mif-checkmark '></span>&nbsp;Submit&nbsp;</button>
						</div>
</div>
</form>
