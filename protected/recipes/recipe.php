<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] <= 0) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		$query = "SELECT id, dish_name, difficulty, category, calorie, ingredients, leiras FROM recipes WHERE id = :id";
		require_once DATABASE_CONTROLLER;
		$params = [':id' => $_GET['id']];
		$recipes = getList($query, $params);
	?>

	<?php foreach ($recipes as $r) : ?>
		<h1> <?=$r['dish_name']?></h1>
		<h3><?=$w['email']?></h3>
		<?= $w['gender'] == 0 ? 'Female' : ($w['gender'] == 1 ? 'Male' : 'Other'); ?> </br>
		<?=$w['nationality']?>
	<?php endforeach; ?>

<?php endif; ?>