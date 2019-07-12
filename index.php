<?php
class Interview
{
  //********* 1 - $title must be a static variable for it to render in the echo statement below
	public static $title = 'Interview test';
}
$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
$person = $_POST['person'];
$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

  <?php //if $title wasn't marked static, we'd need to create a new instance of the class, then echo the $title value ?>
	<h1><?=Interview::$title;?></h1>

	<?php
  //********* 2 - start at $i=0, not 10
  //********* 3 - continue as long as $i<10, not 0
	for ($i=0; $i<10; $i++) {
  //********* 4 - use dot to concatenate strings, not +
		echo '<p>'.$lipsum.'</p>';
	}
	?>


	<hr>
  <?php //********* 5 - use post not get for sending form data ?>
	<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>">
    <?php //this form should have proper validation, I've only added required attr ?>
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName" required></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName" required></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email" required></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>


	<hr>

	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
      <?php //I'd change the scoped varible name $person to avoid confusion with the $person variable above ?>
			<?php foreach ($people as $person): ?>
				<tr>
          <?php //********* 6 - accessing multi-dimensional array values not obj values ?>
					<td><?=$person['first_name'];?></td>
					<td><?=$person['last_name'];?></td>
					<td><?=$person['email'];?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>
