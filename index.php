<?php
include_once 'includes/connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>My Auto-Suggest</title>
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/getState.js"></script>
    <link media="all" rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div id="suggestion_box" style="display:none; position: relative;z-index:100;height:0px; width:368px;"></div>
    <select name="Country_auto" id="Country_auto" title="Country" onchange="document.getElementById('State_auto').value='';">
    	<option value="0">Select Country</option>
    	<?php 
        $countrySQL='select * from countries order by Country_Name asc';
        $execCountrySQL = mysql_query($countrySQL) or die('Error Fetching Countries'.mysql_error());
    	while($country = mysql_fetch_array($execCountrySQL))
    	{ ?>
    		<option value="<?php echo $country['Country_ID']; ?>"><?php echo htmlentities($country['Country_Name'], ENT_QUOTES, "ISO-8859-15"); ?></option>
    	<?php } ?>
    </select>
    <br /><br />
    <input type="text" name="State_auto" id="State_auto" title="State/Province" autocomplete="off" placeholder="Select State" onkeyup="suggest(event,'<?php echo SELECT_ROW_BG;?>','<?php echo SELECT_ROW_TEXT;?>','<?php echo DEFAULT_ROW_BG;?>','<?php echo DEFAULT_TEXT;?>')" value="" />
</body>
