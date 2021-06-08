<?php
/*
The main template file
*/

get_header();
?>

<main id="main" class="site-main" role="main">

<?php
$response = wp_remote_get(add_query_arg(array(
    'per_page' => 10
) , 'https://staging.8bitbyte.co.nz/tower/wp-json/v2/policies?v'));

if (!is_wp_error($response) && $response['response']['code'] == 200)
{
?>
	<h2>Insurance Policy List</h2>
	<p>Rendered via REST-Api</p>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>Policy ID</th>
        <th>Policy Name</th>
        <th>Live Date</th>
        <th>Description</th>
      </tr>
    </thead>
	<tbody>
<?php
    $remote_posts = json_decode($response['body']);
    foreach ($remote_posts as $remote_post)
    {
        //print_r( $remote_post );
        
?>
	<tr>
        <td><?php echo $remote_post->policy_id; ?></td>
        <td><?php echo $remote_post->title; ?></td>
        <td><?php echo $remote_post->live_date; ?></td>
        <td><?php echo $remote_post->description; ?></td>
      </tr>
	<?php
    }
?>
			</tbody>
  </table>
<?php
}
?>
</main>

<?php
get_footer();