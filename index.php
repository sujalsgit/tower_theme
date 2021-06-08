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
<?php
$args = array(
    'post_type' => 'claim'
);

$post_query = new WP_Query($args);

if ($post_query->have_posts())
{
?>
			<h2>Insurance Claim List</h2>
			<p>Rendered via normal method</p>
			<table class="table table-hover">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Email</th>
				<th>Policy ID</th>
			  </tr>
			</thead>
			<tbody>
<?php
    while ($post_query->have_posts())
    {
        $post_query->the_post();
        $claim_name = get_post_meta($post->ID, "name", true);
        $claim_email = get_post_meta($post->ID, "email", true);
        $policy_id = get_post_meta($post->ID, "policy_id", true);
?>
		<tr>
			<td><?php echo $claim_name; ?></td>
			<td><?php echo $claim_email; ?></td>
			<td><?php echo $policy_id; ?></td>
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