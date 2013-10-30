<?php

class Error
{
	private static  $path = "log/";
	private static  $filename = "logfile.log";

	// CATCHABLE ERRORS
    public static function captureNormal( $number, $message, $file, $line )
    {
        // Insert all in one table
        $error = array( 'type' => $number, 'message' => $message, 'file' => $file, 'line' => $line );
        // Display content $error variable
        ob_start();
        Error::writeErrors( $error );
        ob_end_clean();
    }
    
    // EXTENSIONS
    public static function captureException( $exception )
    {
        // Display content $exception variable
        echo '<pre>';
        print_r( $exception );
        echo '</pre>';
    }
    
    // UNCATCHABLE ERRORS
    public static function captureShutdown( )
    {
        $error = error_get_last();
        if( $error ) {
            ## IF YOU WANT TO CLEAR ALL BUFFER, UNCOMMENT NEXT LINE:
            # ob_end_clean( );
            
            // Display content $error variable
            ob_start();
//             echo '<pre>';
//             print_r( $error );
//             echo '</pre>';
            ob_end_clean();
        } else { return true; }
    }
    
    public static function writeErrors($error) {
    	$putstring = "";
    	$date = date('d.m.Y H:i:s', time());
    		if (!(is_file(Error::$path.Error::$filename))) {
    			mkdir(Error::$path);
    			// create new error system with that thing
    			$createFile = fopen(Error::$path.Error::$filename, 'w') or die();
    			fclose($createFile);
    		}
//     	$current = "";
//     	$current = file_get_contents(Error::$path.Error::$filename);
    	$putstring = $date.": (".$error['type'].") ".$error['message']." in ".$error['file']." at line ".$error['line']."\n";
    	//$current .= $putstring;
    	file_put_contents(Error::$path.Error::$filename, $putstring, FILE_APPEND | LOCK_EX);
    }
}

ini_set( 'display_errors', 1 );
error_reporting( -1 );
set_error_handler( array( 'Error', 'captureNormal' ) );
set_exception_handler( array( 'Error', 'captureException' ) );
register_shutdown_function( array( 'Error', 'captureShutdown' ) );

// PHP set_error_handler TEST
//IMAGINE_CONSTANT;

// PHP set_exception_handler TEST
//throw new Exception( 'Imagine Exception' );

// PHP register_shutdown_function TEST ( IF YOU WANT TEST THIS, DELETE PREVIOUS LINE )
//imagine_function( );

?>