<?php if(!isset($_SESSION['permission'])): ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM recipes WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if($_SESSION['permission'] < 3){
				echo "Access is forbidden";
			} else if(!executeDML($query, $params)) {
				echo "Error during deleting recipe!";
			}
		}
	?>

	<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addRecipe'])){
			$postData = [
				'dish_name' => $_POST['dish_name'],
				'difficulty' => $_POST['difficulty'],
				'category' => $_POST['category'],
				'calorie' => $_POST['calorie'],
				'ingredients' => $_POST['ingredients'],
				'directions' => $_POST['directions'],
				'description' => $_POST['description']
			];
	endif;?>











	<?php 
		$query = "SELECT id, dish_name, difficulty, category, calorie FROM recipes ORDER BY dish_name ASC";
		require_once DATABASE_CONTROLLER;
		$recipes = getList($query);
	?>









	<form method="post" style="text-align: center" name=search>
			<input type="text" name='word'>
			<input type="submit" value="Keresés">
	</form>


	<hr style="width: 75%">
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
						<?php if($_SESSION['permission'] >=3) : ?>
							<th scope="col">Törlés</th>
						<?php endif; ?>
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
						<td><?= $r['difficulty'] == 1 ? 'Very Easy' : ($r['difficulty'] == 2 ? 'Easy' : ($r['difficulty'] == 3 ? 'Medium' : ($r['difficulty'] == 4 ? 'Hard' : 'Very Hard')));?></td>
						<td><?=$r['category'] ?></td>
						<td><?=$r['calorie'] ?></td>
						<?php if($_SESSION['permission'] >= 2) : ?>
							<td><a href="<?='index.php?P=edit_recipe&e='.$r['id']?>">Edit</a></td>
							<?php if($_SESSION['permission'] >=3) : ?>
								<td><a href="?P=list_recipe&d=<?=$r['id'] ?>">Delete</a></td>
							<?php endif; ?>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>