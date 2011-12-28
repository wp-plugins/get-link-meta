<?php
//Get Description for Link
$meta_data= get_meta_tags($_GET['linkurl']);
$desc= $meta_data['description'];
?>

<form>
<input type="text" style="width:90%;margin:5px;" name="getURL_description" value="<?php echo $desc; ?>" id="getURL_description">
<br>
  
<input type="button" class="button" value="Submit & Save" onclick="javascript: parent.document.getElementById('link_description').value = document.getElementById('getURL_description').value;parent.document.getElementById('save').click();" >
 </form>
