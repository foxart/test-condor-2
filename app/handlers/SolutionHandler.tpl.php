<?=
	debug(get_class($this));
	if (!isset($url)) {
		$url = '';
	}
?>
<div style="position: relative; display: block;">
    <a href="<?= $url . '/total'; ?>">Test data [GET]</a>
    <br/>
    <br/>
    <br/>
    <a href="<?= $url . '/date'; ?>">Test data group by date [GET]</a>
	<br/>
	<br/>
	<br/>
	<a href="<?= $url . '/ip'; ?>">Test data group by ip [GET]</a>
</div>
