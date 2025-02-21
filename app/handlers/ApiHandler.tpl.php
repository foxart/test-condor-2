<?=
	debug(get_class($this));
	if (!isset($url)) {
		$url = '';
	}
?>
<div style="position: relative; display: block;">
    <a href="<?= $url . '/google'; ?>">Test Google Analytics [GET]</a>
    <br/>
    <br/>
    <br/>
    <a href="<?= $url . '/positive'; ?>">Test Positive Guys [GET]</a>
	<br/>
	<br/>
	<br/>
	<a href="<?= $url . '/hot'; ?>">Test HOT JAR [GET]</a>
</div>
