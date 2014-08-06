<?php 
include_once 'includes/connect.php';
if($_REQUEST['country_id'])
{
    $statesSQL = 'select * from states where Country_ID = "'.$_REQUEST['country_id'].'" AND State_Name LIKE "'.$_REQUEST['term'].'%"';
    $execStateSQL = mysql_query($statesSQL) or die('Error Fetching States'.mysql_error());
    ?>
    <table style="width:100%;margin-top:2px; margin-bottom:2px;background: <?php echo DEFAULT_ROW_BG;?>;border:1px solid #DEDDDD ">
	    <?php if(mysql_num_rows($execStateSQL)>0){
	    	$counter=0;
			while($states = mysql_fetch_array($execStateSQL)) { $counter++?>
				<tr id="<?php echo 'row_'.$counter; ?>" class="list <?php if($counter==1)echo "auto"; ?>">
					<td style="width:100%;">
                        <a href="javascript:void(0)" id="state_<?php echo $states['State_ID']; ?>" style="float:left;width:100%" onmouseout="change_bg(this.id,'<?php echo SELECT_ROW_BG;?>','<?php echo SELECT_ROW_TEXT;?>','<?php echo DEFAULT_ROW_BG;?>','<?php echo DEFAULT_TEXT;?>');" onmouseover="changebghover(this.id,'<?php echo SELECT_ROW_BG;?>','<?php echo SELECT_ROW_TEXT;?>','<?php echo DEFAULT_ROW_BG;?>','<?php echo DEFAULT_TEXT;?>')" onclick="make_text(this.id)" onblur="make_text(this.id)"><?php echo $states['State_Name']; ?></a>
					</td>
				</tr>
			<?php }	
		}
		else {?>
				<tr id="<?php echo 'row_1'; ?>" class="list <?php if($counter==1)echo "auto"; ?>">
					<td style="width:100%;">
                        <a href="javascript:void(0)" id="no_state" onmouseout="change_bg(this.id,'<?php echo SELECT_ROW_BG;?>','<?php echo SELECT_ROW_TEXT;?>','<?php echo DEFAULT_ROW_BG;?>','<?php echo DEFAULT_TEXT;?>');" onmouseover="changebghover(this.id,'<?php echo SELECT_ROW_BG;?>','<?php echo SELECT_ROW_TEXT;?>','<?php echo DEFAULT_ROW_BG;?>','<?php echo DEFAULT_TEXT;?>')" onclick="document.getElementById('State_auto').value='';document.getElementById('Country_auto').focus();" onblur="document.getElementById('State_auto').value='';document.getElementById('Country_auto').focus();">No Matching State Exists</a>
					</td>
				</tr>
		<?php }
		?>
	</table>
	<input type="hidden" id="lastval" value="<?php echo $counter; ?>">
<?php }
?>
