<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] <= 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php

		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addRecipe'])){
			$postData = [
				'dish_name' => $_POST['dish_name'],
				'difficulty' => $_POST['difficulty'],
				'category' => $_POST['category'],
				'calorie' => $_POST['calorie'],
				'ingredients' => $_POST['ingredients'],
				'leiras' => $_POST['leiras']
			];



			if(empty($postData['dish_name']) || empty($postData['difficulty']) || empty($postData['category']) || empty($postData['calorie']) || empty($postData['ingredients']) || empty($postData['leiras'])){
				echo "Hiányzó adat(ok)";
			} else {
				$query = "INSERT INTO recipes (dish_name, difficulty, category, calorie, ingredients, leiras) VALUES (:dish_name, :difficulty, :category, :calorie, :ingredients, :leiras)";
				$params = [
					':dish_name' => $postData['dish_name'],
					':difficulty' => $postData['difficulty'],
					':category' => $postData['category'],
					':calorie' => $postData['calorie'],
					':ingredients' => $postData['ingredients'],
					':leiras' => $postData['leiras']
				];
				require_once DATABASE_CONTROLLER;
				if(!executeDML($query, $params)) {
					echo "Hiba az adatbevitel során!";
				} header('Location: index.php');
			}

		}
	?>



	<form method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="recipeDishName">Dish Name</label>
				<input type="text" class="form-control" id="recipeDishName" name="dish_name">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
		    	<label for="recipeDifficulty">Difficulty</label>
		    	<select class="form-control" id="recipeDifficulty" name="difficulty">
		    		<option value="0">There is nothing here</option>
		      		<option value="1">Very easy</option>
		      		<option value="2">Easy</option>
		      		<option value="3">Medium</option>
		      		<option value="4">Hard</option>
		      		<option value="5">Very Hard</option>
		    	</select>
		  	</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="recipeCategory">Category</label>
				<select class="form-control" id="recipeCategory" name="category">
					<option value="0">There is nothing here</option>
		      		<option value="Breakfast">Breakfast</option>
		      		<option value="Soup">Soup</option>
		      		<option value="Main Course">Main Course</option>
		      		<option value="Dessert">Dessert</option>
		      		<option value="Salad">Salad</option>
		      		<option value="Drinks">Drinks</option>
		      		<option value="Dinner">Dinner</option>
		      		<option value="Garnish">Garnish</option>
		    	</select>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="recipeCalorie">Calorie</label>
				<input type="text" class="form-control" id="recipeCalorie" name="calorie">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="recipeIngredients">Ingredients</label>
				<textarea type="text" placeholder="Ide írja a hozzávalókat!" class="form-control" id="recipeIngredients" name="ingredients" rows="5"></textarea>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="recipeLeiras">Elkészítés</label>
				<textarea type="text" placeholder="Ide írja az elkészítést" class="form-control" id="recipeLeiras" name="leiras" rows="5"></textarea>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="recipeImage">Kép</label>
				<input type="file" name="image">
			</div>
		</div>

		<button type="submit" class="btn btn-primary" name="addRecipe">Add Recipe</button>
	</form>
<?php endif; ?>