<?php if(!isset($_SESSION['permission'])): ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		$query = "SELECT id, dish_name, difficulty, category, calorie FROM recipes ORDER BY dish_name ASC";
		require_once DATABASE_CONTROLLER;
		$recipes = getList($query);
	?>

	<?php if(count($recipes) <= 0) : ?>
		<h1>No recipes found in the database.</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Dish name</th>
					<th scope="col">Difficulty</th>
					<th scope="col">Category</th>
					<th scope="col">Calorie</th>
					<?php if($_SESSION['permission'] >= 2) : ?>
						<th scope="col">Szerkesztés</th>
						<th scope="col">Törlés</th>
					<?php endif; ?>
				<tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($recipes as $r) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="<?='index.php?P=recipe&id='.$r['id']?>"><?=$r['dish_name'] ?></a></td>
						<td><?=$r['difficulty'] ?></td>
						<td><?=$r['category'] ?></td>
						<td><?=$r['calorie'] ?></td>
						<?php if($_SESSION['permission'] >= 2) : ?>
							<td><a href="<?='index.php?P=edit_recipe&e='.$r['id']?>">Edit</a></td>
							<td><a href="?P=list_recipe&d=<?=$r['id'] ?>">Delete</a></td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>