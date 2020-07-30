<?php

namespace RestIgniter;

class Constants
{

	/*
	|--------------------------------------------------------------------------
	| Framework related informations
	|--------------------------------------------------------------------------
	|
	*/
	const RI_VERSION = "0.0.1-dev";
	const RI_PATH = BASEPATH . "/restigniter";
	const CONFIG_PATH = APPPATH . "configuration";


	/*
	|--------------------------------------------------------------------------
	| Display Debug backtrace
	|--------------------------------------------------------------------------
	|
	| If set to TRUE, a backtrace will be displayed along with php errors. If
	| error_reporting is disabled, the backtrace will not display, regardless
	| of this setting
	|
	*/
	const SHOW_DEBUG_BACKTRACE = true;


	/*
	|--------------------------------------------------------------------------
	| File and Directory Modes
	|--------------------------------------------------------------------------
	|
	| These prefs are used when checking and setting modes when working
	| with the file system.  The defaults are fine on servers with proper
	| security, but you may wish (or even need) to change the values in
	| certain environments (Apache running a separate process for each
	| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
	| always be used to set the mode correctly.
	|
	*/

	const FILE_READ_MODE = 0644;
	const FILE_WRITE_MODE = 0666;
	const DIR_READ_MODE = 0755;
	const DIR_WRITE_MODE = 0755;

	/*
	|--------------------------------------------------------------------------
	| File Stream Modes
	|--------------------------------------------------------------------------
	|
	| These modes are used when working with fopen()/popen()
	|
	*/
	const FOPEN_READ = "rb";
	const FOPEN_READ_WRITE = "r+b";
	const FOPEN_WRITE_CREATE_DESTRUCTIVE = "wb";
	const FOPEN_READ_WRITE_CREATE_DESTRUCTIVE = "w+b";
	const FOPEN_WRITE_CREATE = "ab";
	const FOPEN_READ_WRITE_CREATE = "a+b";
	const FOPEN_WRITE_CREATE_STRICT = "xb";
	const FOPEN_READ_WRITE_CREATE_STRICT = "x+b";


	/*
	|--------------------------------------------------------------------------
	| Exit Status Codes
	|--------------------------------------------------------------------------
	|
	| Used to indicate the conditions under which the script is exit()ing.
	| While there is no universal standard for error codes, there are some
	| broad conventions.  Three such conventions are mentioned below, for
	| those who wish to make use of them.  The CodeIgniter defaults were
	| chosen for the least overlap with these conventions, while still
	| leaving room for others to be defined in future versions and user
	| applications.
	|
	| The three main conventions used for determining exit status codes
	| are as follows:
	|
	|    Standard C/C++ Library (stdlibc):
	|       https://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
	|       (This link also contains other GNU-specific conventions)
	|    BSD sysexits.h:
	|       https://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
	|    Bash scripting:
	|       http://tldp.org/LDP/abs/html/exitcodes.html
	|
	*/
	// no errors
	const EXIT_SUCCESS = 0;
	// generic error
	const EXIT_ERROR = 1;
	// configuration error
	const EXIT_CONFIG = 3;
	// file not found
	const EXIT_UNKNOWN_FILE = 4;
	// unknown class
	const EXIT_UNKNOWN_CLASS = 5;
	// unknown class member
	const EXIT_UNKNOWN_METHOD = 6;
	// invalid user input
	const EXIT_USER_INPUT = 7;
	// database error
	const EXIT_DATABASE = 8;
	// lowest automatically-assigned error code
	const EXIT__AUTO_MIN = 9;
	// highest automatically-assigned error code
	const EXIT__AUTO_MAX = 125;
}
