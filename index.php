<?php
	session_start();

	if(isset($_SESSION['id']) && isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<script
    src="jquery.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
	<title>Welcome @<?php echo $_SESSION['username']; ?></title>
</head>
<body>
	<div class="container">
		<div class='dashboard'>
			<div class="greeting">
				<h3>Hello @<?php echo $_SESSION['username']; ?>, welcome to my Test Page</h3>
				<a href="signout.php">Sign Out</a>
			</div>
			<div class="action-menu">
				<input type="text" name='SearchBar' placeholder='Enter Filter'>
				<button id='search-button'>Search</button>
			</div>
			<div class="list-table">
				<table id='list-table'>
					<thead>
						<th>Username</th>
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Street</th>
						<th>Barangay</th>
						<th>Municipality</th>
					</thead>

					<tbody class='table-body'  height="100">
						<!-- data should inserted here. -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){

			showData();

			$("#search-button").click(function(){
				var keyword =  $('input[name="SearchBar"]').val();

				if(keyword === ""){
					showData();
				}else{
					search(keyword);
				}
				
			})
		})

		function showData(){
				$.ajax({
				url: 'showData.php',
				type: 'POST',
				data: {res: 1},
				success: function(data){
					$('.table-body').html(data);
				}
			});
		}

		function search(searchText){
				$.ajax({
					url: 'search.php',
					type: 'POST',
					data: {
						keyword:  searchText
					},
					success: function(data){
						$('.table-body').html(data);
					}
				});
			}
	</script>
</body>
</html>

<?php
}else{
  header("Location: signin-page.php");
  exit();
}
?>
