<?php 
$za=json_decode($_POST['myData']);
$res=$za->response->body->diamonds;
define( 'BLOCK_LOAD', true );
//require_once('/../../../yogesh_wp/wp-config.php' );
require_once( str_replace('//','/',dirname(__FILE__).'/') .'../../../wp-config.php');
$user=wp_get_current_user();



 $i=0;
//$user=wp_get_current_user();
foreach($res as $data)
  {
       $importProducts= array(
           'post_title'    => 'Diamond'.$data->diamond_id,
           'post_content'  => 'API market platform',
           'post_status'   => 'publish',
           'post_type'     => 'product',
           'post_author'   => 'Admin',
           );
     $sym=$data->currency_symbol;     
 $post_id=wp_insert_post( $importProducts );
        
         update_post_meta( $post_id, 'ShapeTitle', $data->shape );
         update_post_meta( $post_id, 'size',$data->size);
         update_post_meta( $post_id, 'color ',$data->color);
         update_post_meta( $post_id, 'clarity ',$data->clarity);
         update_post_meta( $post_id, 'cut',$data->cut);
		 update_post_meta( $post_id, 'symmetry',$data->symmetry);
		 update_post_meta( $post_id, 'polish',$data->polish);
		 update_post_meta( $post_id, 'depth_percent',$data->depth_percent);
		 update_post_meta( $post_id, 'table_percent',$data->table_percent);
		 update_post_meta( $post_id, 'meas_width',$data->meas_width);
		 update_post_meta( $post_id, 'meas_depth',$data->meas_depth);
         update_post_meta( $post_id, 'lab ',$data->lab);
         update_post_meta( $post_id,'stock_num',$data->stock_num);
		 update_post_meta( $post_id,'cert_num',$data->cert_num);
         update_post_meta( $post_id,'_price',$data->total_sales_price_in_currency);
		 update_post_meta( $post_id,'_regular_price',$data->total_sales_price_in_currency);
		 $i++;
  }
  if($i>0)
  {echo "done";}

?>