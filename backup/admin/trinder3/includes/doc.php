<div class="dock" id="dock2">
	<div class="dock-container2">
		<?php 
		foreach ($modules as $module){
			if ($module != 'menu.php' && $module != 'EXEMPLOS' && $module != '.DS_Store') {
				$stringPage = ucfirst($module);
				echo "<a class='dock-item2' href='main.php?page=$module'><img src='modules/$module/images/icon.png' alt='$stringPage' /></a>";
			}
		}
		?>
	</div>
</div>