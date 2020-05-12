<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
	Permission check: <?=isset($_SESSION['permission']) ? $_SESSION['permission'] : "You don't have a permission!" ?>
<?php else : ?>
	<h1>Access allowed</h1>
	<p>Your permission level is <?=$_SESSION['permission'] ?></p>
	<?php switch ($_SESSION['permission']) {
		case '0':
			echo "Tud böngészni receptek között.";
			break;
		case '1':
			echo "Tud böngészni receptek között és hozzáadni egy  újat.";
			break;
		case '2':
			echo "Tud böngészni receptek között, hozzáadni egy újat, valamint tudja szerkeszteni tudja az adatait.";
			break;
		default:
			echo "Tud böngészni receptek között, hozzáadni egy újat és szerkeszteni az adatait. Valamint tudja szerkeszteni a felhasználók adatait és törölni tudja őket.";
			break;
	} ?>
<?php endif; ?>