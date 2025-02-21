<?=
	debug(get_class($this));
	if (!isset($url)) {
		$url = '';
	}
?>
<div style="position: relative; display: block;">
    <a href="<?= $url . '/google-analytics'; ?>">Test Google Analytics</a>
    <br/>
    <br/>
    <br/>
	<a href="<?= $url . '/google-analytics/shape-error'; ?>">Test Google Analytics [SHAPE ERROR]</a>
	<br/>
	<br/>
	<br/>
	<a href="<?= $url . '/google-analytics/network-error'; ?>">Test Google Analytics [NETWORK ERROR]</a>
	<br/>
	<br/>
	<br/>
    <a href="<?= $url . '/positive-guys'; ?>">Test Positive Guys</a>
	<br/>
	<br/>
	<br/>
	<a href="<?= $url . '/hot-jar'; ?>">Test HOT JAR</a>
</div>
