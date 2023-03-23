<?php
namespace App\Controllers;

class Contact extends BaseController
{   
   public function index()
    {
        echo " THIS IS CONTACT CRONTROLLER ";
		
    }
	
	// URL WILL BE /contact/parm/
	
    public function getparm($a=false,$b=false,$c=false)
    { 
	   $getlink = service('uri');
		 
	// echo $getlink->getSegment(2);	
		echo $getlink->getSegment(3);
	//	echo $getlink->getSegment(4).'-'.$a."<br>";
	
//	echo $a ;
// echo $b;
//	echo $c;
	
    }
	
	
	
}
