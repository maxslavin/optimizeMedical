<?php 
class Webriti_pagination
{
function Webriti_page($curpage, $post_type_data)
{	?>
	<div class="hc_blog_pagination">	
		<div class="hc_blog_pagi">
		
			<?php if($curpage != 1  ) {
					echo '<a href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">Prev</a>'; } ?>
			<?php for($i=1;$i<=$post_type_data->max_num_pages;$i++)
				{
				echo '<a class="'.($i == $curpage ? 'active ' : '').'" href="'.get_pagenum_link($i).'">'.$i.'</a>';
				}				
			if($i-1!= $curpage)	 {
			echo '<a class="" href="'.get_pagenum_link(($curpage+1 <= $post_type_data->max_num_pages ? $curpage+1 : $post_type_data->max_num_pages)).'">Next</a>';
			 } ?>
		
		</div>
	</div>
<?php } 
}
?>