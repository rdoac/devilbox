<?php
namespace devilbox;

class MailHog extends BaseClass implements BaseInterface
{

	/*********************************************************************************
	 *
	 * MailHog  Select functions
	 *
	 *********************************************************************************/

	public function getConfig($key = null)
	{
		// Get all configs as array
		if ($key === null) {
			return ini_get_all();
		} else {
			return ini_get($key);
		}
	}
	public function getUid()
	{
		$output = loadClass('Helper')->exec('id', $output);

		$uid = loadClass('Helper')->egrep('/uid=[0-9]+/', $output);
		$uid = loadClass('Helper')->egrep('/[0-9]+/', $uid);
		return $uid;
	}
	public function getGid()
	{
		$output = loadClass('Helper')->exec('id', $output);

		$uid = loadClass('Helper')->egrep('/gid=[0-9]+/', $output);
		$uid = loadClass('Helper')->egrep('/[0-9]+/', $uid);
		return $uid;
	}

	public function getTldSuffix()
	{
		return loadClass('Helper')->getEnv('TLD_SUFFIX');
	}

	/**
	 * Get Lucee port.
	 *
	 * @return string
	 */

	public function getPort()
	{
		$port = loadClass('Helper')->getEnv('HOST_PORT_MAILHOG');

		if ( empty($port) ) {
			return '';
		}

		if ( $port == 25 ) {
			return '';
		}
	}





	/*********************************************************************************
	 *
	 * Interface required functions
	 *
	 *********************************************************************************/

	public function canConnect(&$err, $hostname, $data = array())
	{
		// Lucee can always connect, otherwise you could not see anything.
		$err = false;
		return true;
	}

	public function getName($default = 'MailHog')
	{
		return $default;
	}

	public function getVersion()
	{
		$version = loadClass('Helper')->egrep('/[.0-9]+/', $_SERVER['SERVER_SOFTWARE']);
		if (!$version) {
			loadClass('Logger')->error('Could not get MailHog version');
			return '';
		}
		return $version;
	}

}
