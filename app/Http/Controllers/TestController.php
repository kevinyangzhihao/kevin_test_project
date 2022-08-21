<?php

namespace App\Http\Controllers;

use Exception;

class TestController extends Controller
{
    public function test(): string
    {

/////////
///
    function divide(int $a,int $b): int
    {
        if ($b == 0) {
            throw new Exception("divide by zeroaa");
        }
        return $a / $b;
    }

        try
        {
            $result = divide(5,0);
            echo $result;
        }
        catch (Exception $e)
        {
            echo 'unable to dividess',$e->getCode();
        }
        finally {
            echo "       Process complete.";
        }

////////////////
        return "hello";
    }

}
