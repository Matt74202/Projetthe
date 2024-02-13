<?php 
	
    function dbconnect()
	{
	    static $connect = null;
	    if ($connect === null) {
	        $connect= mysqli_connect('172.20.0.167', 'ETU002707', 'HfMLOSkIumPP', 'db_p16_ETU002707');
	    }
	    return $connect;
	}

    // function dbconnect()
	// {
	//     static $connect = null;
	//     if ($connect === null) {
	//         $connect= mysqli_connect('localhost', 'root', 'itu16', 'the');
	//     }
	//     return $connect;
	// }

    
?>