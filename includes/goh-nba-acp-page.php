<?php



$url = 'https://free-nba.p.rapidapi.com/players?search=kyrie';

$args = [
  'headers' => [
	'X-RapidAPI-Host' => 'free-nba.p.rapidapi.com',
	'X-RapidAPI-Key' => 'd688623a8cmsh407b62a7f7d6af8p1cf1d5jsn51263f7de078',
  ]
];


echo $url;

$response = wp_remote_request( $url, $args );
if ( is_wp_error( $response ) ) {
  wp_die ('Responses returned an error');
}  

$raw = wp_remote_retrieve_body ( $response );
//echo $raw, "<br>";
$games_data = json_decode($raw, TRUE);



$players = $games_data['data'];
foreach ($players as $player) {
 /* echo '<div class="player">';
  echo $player['first_name'] . ' '. $player['last_name'];
  echo '</div>';
  echo $player['id'];
  */
}
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<html> 


<body>

<h3>Header Data</h3>
<p>Here is where you enter the first name and last name to find a players stats:</p>

<div class="container" >
  <form action="admin.php?page=Header-and-Footer-plugin/includes/goh-hfp-acp-page.php" method="post">

    <label>First Name</label>
    <input value="<?php echo esc_attr ($first_name) ?>" type="text" name="goh_nba_first_name_data" id="first_name_data">

    <label>Last Name</label>
    <input value="<?php echo esc_attr ($last_name) ?>" type="text" name="goh_nba_last_name_data" id="last_name_data" >
  
    <input type="submit" value="Submit">
  </form>
</div>	

</body>



<table>
	<tbody>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Height</th>
			<th>Weight - lbs</th>
			<th>Position</th>
			<th>Team</th>
			<th>Conference</th>
			<th>Division</th>
		</tr>
		<?php foreach ($players as $player) : ?>
		<tr>
			<td> <?php echo $player['first_name']; ?> </td>
			<td> <?php echo $player['last_name']; ?> </td>
			<td> <?php echo $player['height_feet'] . "'". $player['height_inches']; ?> </td>
			<td> <?php echo $player['weight_pounds']; ?></td>
			<td> <?php echo $player['position']; ?> </td>
			<td> <?php echo($player["team"]["full_name"]);  ?> </td>
			<td> <?php echo($player["team"]["conference"]);  ?> </td>
			<td> <?php echo($player["team"]["division"]);  ?> </td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</html>