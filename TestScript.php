<?php declare(strict_types=1);
class myclass{
    private $fname="Kiran";
    public $mname="Pratap";
    static $lname="Singh";
    function dispdata(): void {
        echo "$this->fname\n";
        echo "$this->mname\n";
        echo myclass::$lname;
    }
}
$obj=new myclass();
$obj->dispdata();
echo $obj::$lname;
echo $obj->mname;



