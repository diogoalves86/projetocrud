<?php
class Page
{
	
	public function IncludePage($page)
	{
		$Security = new Security();
		$newPage = $Security->SqlSecurity($page);
		if (file_exists($newPage.".php")):
			include $newPage.".php";
		else:
			echo '<script>location.href="index.php";</script>';
		endif;
	}
}

?>