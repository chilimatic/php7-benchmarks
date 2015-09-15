<?php
/**
 *
 * @author j
 * Date: 9/4/15
 * Time: 12:41 AM
 *
 * File: index.php
 */

/**
 * Class itsATrap
 */
trait itsATrap {
    public $string = '';
}

/**
 * Class anotherTrait
 */
trait anotherTrait {
    public $key;

    public function generateKey() {
        $this->key = random_int($min = 0, $max = 100000);
        return $this;
    }
}

/**
 * Class TraitWrapper
 */
class TraitWrapper {
    use itsATrap;
}

/**
 * extend an existing class
 */
$anoClass = new class() extends TraitWrapper{
    private function thereWillBeCode(){
        return 'test';
    }
};

/**
 * reflection example
 */
$test = new ReflectionClass($anoClass);
$method = $test->getMethod('thereWillBeCode');
$closure = $method->setAccessible(true);



var_dump($anoClass);
var_dump($anoClass->thereWillBeCode());

$array = [];
var_dump($array);
for ($i = 0; $i < 12 ; $i++) {
    $array[] = (new class() extends stdClass{
        use anotherTrait;
    })->generateKey();
}



/**
 * lets do a little vodoo
 */
for ($i = 0; $i < 12 ; $i++) {

    $array[$i] = new class() extends stdClass
    {
        private $virtualCalls = [];
        private $a = 12;

        public function addVirtualCall($name, $method) {
            $bound = Closure::bind($method, $this, get_class());
            $this->virtualCall[$name] = $bound;
        }

        public function __call($name, array $arguments = []) {
            return $this->virtualCall[$name]();
        }
    };

    $array[$i]->addVirtualCall('getA', function(){ return $this->a; });
    echo $array[$i]->getA();
}

$newDynamicProxy = new class() {

    /**
     * @var entity $entity
     */
    private $entity;
    /**
     * @var array
     */
    private $virtualCalls = [];

    /**
     * @var array
     */
    private $changed = [];

    /**
     * attach closures to the class context
     *
     * @param $name
     * @param $method
     */
    public function addVirtualCall($name, $method) {
        $bound = Closure::bind($method, $this, get_class());
        $this->virtualCall[$name] = $bound;
    }

    /**
     * dynamic calls for overloading
     *
     * @param $name
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call($name, array $arguments = []) {
        return call_user_func_array($this->virtualCall[$name], $arguments);
    }
};


interface proxy {}

class entity {
    /**
     * @var string
     */
    private $i;
    /**
     * @var int
     */
    private $a;

    /**
     * @return string
     */
    public function getI()
    {
        return $this->i;
    }

    /**
     * @param string $i
     *
     * @return $this
     */
    public function setI($i)
    {
        $this->i = $i;

        return $this;
    }

    /**
     * @return int
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param int $a
     *
     * @return $this
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }
}


// lets do it Evil
$newDynamicProxy->addVirtualCall(
    'setEntity', function($entity) {
        $this->entity = $entity;
    }
);

$newDynamicProxy->setEntity(new entity());

$array = [
    'setA' => ['$a', '$this->entity->setA($a); $this->changed["a"] = true;'],
    'setb' => ['$b', '$this->entity->setB($b); $this->changed["b"] = true;']
];


foreach ($array as $methodName => $generatedCode) {
    $newDynamicProxy->addVirtualCall(
        $methodName, create_function($generatedCode[0], $generatedCode[1])
    );
}

$newDynamicProxy->setA(12);

var_dump($newDynamicProxy);


$myOutPutClass = new class() extends stdClass
{
    private $output = '';

    /**
     * @return mixed
     */
    public function getOutput() {
        return $this->output;
    }

    /**
     * @param $string
     */
    public function setOutput($string) {
        $this->output = $string;
    }
};


$myOutPutClass->setOutput('asdfasdf');
echo $myOutPutClass->getOutput();

