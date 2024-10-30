<?php 
/**
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * 
 * Template Sys Data Handler.
 *
 */
add_action( 'admin_enqueue_scripts', 'mvb_template_loadfiles' );

function mvb_template_loadfiles(){

wp_enqueue_script('template-sys');
wp_localize_script('template-sys', 'mvb_tmp_ajax_var', array(
    'url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('ajax-nonce')
));
}
add_action( 'wp_ajax_mvb_tmp_action', 'mvb_tmp_action_callback' );


function mvb_strpslashes_deep($value)
{
	$value = is_array($value) ?
	array_map('stripslashes_deep', $value) :
	stripslashes($value);

	return $value;
}
function mvb_tmp_action_callback()
{
  
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
   if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
      die ( 'Busted!');
   
   

if(isset($_POST["temp"])){
	$array = mvb_strpslashes_deep($_POST["temp"]);
	if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$array[0])==1  ){
		echo 0;
		exit;
	}		
	$array_templist=get_option('templates-list');
	if(is_array($array_templist)){	 
	if(in_array($array[0],$array_templist)){
		echo 1;
	    exit;
	}else {
	$j=count($array_templist);
	$array_templist[$j]=$array[0];
	update_option('templates-list',$array_templist);
	}
	}else {		
         	$array_templist[0]=$array[0];
			add_option('templates-list',$array_templist);
	}
	
	if(!get_option($array[0].'-bui-template') ){	
	add_option($array[0].'-bui-template',$array[1]);
	}

	
$templist_array=get_option('templates-list'); $i=0;
if($templist_array){ ?>
<label id="load_template_title" >Template List </label>
<?php 
while($i<count($templist_array)){ ?>
<div class="btn-group">
  <a class="btn btn-primary" ><i></i><span class="temp-name"><?php echo $templist_array[$i] ;?></span></a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
    <span class="icon-caret-down"></span></a>
  <ul class="dropdown-menu">
    <li><a  onclick="load_template(this)"><i class="icon-fixed-width icon-download"></i><span style="padding-left:5px">Load</span></a></li>
    <li><a onclick="del_template(this)"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>    
  </ul>
</div>
<?php $i++; }  } 
}
$content="";
if(isset($_POST['temp_name'])){
    $temp_name=$_POST['temp_name'];
    if(get_option($temp_name.'-bui-template')){
       $temp_content= get_option($temp_name.'-bui-template');
     //    $i=1;		
     //  foreach( $temp_content as $array_key=>$array_value){ 
       //   if($array_key >0){         
      //     $content .=$array_value[2];
      //     $i++;
     //  }
       }      
 echo $temp_content;
      
    }



if(isset($_POST['del-temp'])){
$array_templist=get_option('templates-list');
$i=0;

foreach($array_templist as $key=>$value){ 

if($value==$_POST['del-temp']){   
    unset($array_templist[$key]);
    delete_option($value.'-bui-template');
	break;
	}else $i++;
}
$i=0;
if(empty($array_templist)!=TRUE)
	foreach($array_templist as $key=>$value){ 
	$arranged_templist[$i]=$value;
	$i++;
}
if(empty($array_templist)==TRUE)
delete_option('templates-list');
else  update_option('templates-list',$arranged_templist);

$templist_output=get_option('templates-list'); $i=0;
if($templist_output){ ?>
<label id="load_template_title" >Template List </label>
<?php  while($i<count($templist_output)){ ?>
<div class="btn-group">
  <a class="btn btn-primary" ><i></i><span class="temp-name"><?php echo $templist_output[$i] ;?></span></a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
    <span class="icon-caret-down"></span></a>
  <ul class="dropdown-menu">
    <li><a  onclick="load_template(this)"><i class="icon-fixed-width icon-download"></i><span style="padding-left:5px">Load</span></a></li>
    <li><a onclick="del_template(this)"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>    
  </ul>
</div>

<?php $i++; } 

 } 
 }
 die();
}
?>