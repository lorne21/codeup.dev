<?php

class Log
{
	
	public $filename;

	public $handle; 
	
	public function __construct($prefix='log')
	{
		$logdate = date("Y-m-d", time());
		// echo $logdate;

		$this->filename = $prefix . "-" . $logdate . '.log';
		// echo $this->filename; 

		$this->handle = fopen($this->filename, 'a');

	}

	public function logMessage($logLevel, $message)
	{
	  	$date = date("Y-m-d H-i-s", time());
	  	
	  	fwrite($this->handle, $date . " " . $logLevel . ", " . $message . PHP_EOL);
	}
	
	public function info($message)
	{
		return $this->logMessage("INFO", $message);
	}
	
	public function error($message)
	{
		return $this->logMessage("ERROR", $message);
	}

	public function __destruct()
	{
		fclose($this->handle);
	}

}




?>