<?=
	debug(get_class($this));
	if (!isset($url)) {
		$url = '';
	}
?>
<div style="position: relative; display: block;">
    <a href="<?= $url . '/total'; ?>">Test data</a>
    <br/>
    <br/>
    <br/>
	<a href="<?= $url . '/total/shape-error'; ?>">Test data [SHAPE ERROR]</a>
	<br/>
	<br/>
	<br/>
	<a href="<?= $url . '/total/network-error'; ?>">Test data [NETWORK ERROR]</a>
	<br/>
	<br/>
	<br/>
    <a href="<?= $url . '/date'; ?>">Test data group by date</a>
	<br/>
	<br/>
	<br/>
	<a href="<?= $url . '/ip'; ?>">Test data group by ip</a>
</div>
