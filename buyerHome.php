<!-- TO DO: CHANGE BELOW COMMENTS -->
<!-- Page 3 -->
<!-- Page Details - Buyer Home Page -->

<head>
  <title>buyerHome</title>
</head>
<?php

// $User_ID = $_Get["User_ID"]; -->

?>
<body>
	<h1>Warrior Housing</h1>
	
<!-- TO DO: CHANGE REDIRECT PAGE-->
	<!-- Which page it will direct go upon submitting the form. -->
	<!-- If the form submission is successful, it will redirect to its respective php file -->
	<form action="searchListing.php" method="post"
		$User_ID
		<br>
			<!-- The button for search -->
			<input type="submit" value="Search"/>
		</br>
	</form>
	<form action="filterListing.php" method="post"
		$User_ID
		<br>
			<!-- The button for filter -->
			<input type="submit" value="Filter"/>
		</br>
	</form>
	<form action="sortListing.php" method="post"
		$User_ID
		<br>
			<!-- The button for this form. -->
			<input type="submit" value="Sort"/>
		</br>
	</form>

	<?PHP
			// Enable error logging: 
			error_reporting(E_ALL ^ E_NOTICE);
			// mysqli connection via user-defined function

			include('./my_connect.php');
			$mysqli = get_mysqli_conn();

		
			// SQL statement
			$sql = "SELECT r.rental_listing_ID, r.city, r.street_name, r.house_number, r.vacancies, r.rent_per_person, r.availability_length
            FROM rental_listing r
            ORDER BY r.rent_per_person ASC
            LIMIT 5";

			// Prepared statement, stage 1: prepare
			$stmt = $mysqli->prepare($sql);

			// Prepared statement, stage 2: execute
			$stmt->execute();

			// Bind result variables 
			$stmt->bind_result($rental_listing_ID, $city, $street_name, $house_number, $vacancies, $rent_per_person, $availability_length); 
		
			//printing output in html table
            echo '<table>';
            echo '<tr>';
                echo '<th>Song ID</th>';
                echo '<th>Song Name</th>';
                echo '<th>Song Length</th>';
                echo '<th>Genre</th>';
                echo '<th>BPM</th>';
                echo '<th>Album Name </th>';
                echo '<th>Artist Name</th>';
            echo '</tr>';
            while ($stmt->fetch()) {
            echo '<tr><td>' . $rental_listing_ID . '</td><td>' . $city . '</td><td>' . $street_name . '</td><td>'. $house_number . '</td><td>'. $vacancies . '</td><td>'. $rent_per_person . '</td><td>'. $availability_length. '</td><td>';
            }
            echo '</table>';
			/* close statement and connection*/ 
			$stmt->close(); 
			$mysqli->close();
		?>
		
	<form action="searchListing.php" method="post"
		<br>
				<!-- The button for rate -->
				<input type="submit" value="Rate"/>
		</br>
	</form>
</body>