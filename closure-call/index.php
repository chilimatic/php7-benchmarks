<?php
/**
 *
 * @author j
 * Date: 9/15/15
 * Time: 9:40 PM
 *
 * File: closure-call.php
 *
 *
 *
 */


/**
 * rfc example
 * Class Foo
 */
class Foo { private $x = 3; }
$foo = new Foo;
$foobar = function () { var_dump($this->x); };
$foobar->call($foo); // prints int(3)


class Resource {
    private $data = 'private stuff';
}

class Proxy
{
    /**
     * @var
     */
    private $resource;

    /**
     * @var
     */
    private $snitch;

    /**
     * @param Resource $resource
     */
    public function setResource(Resource $resource) {
        $this->resource = $resource;
    }

    public function setDisturberOfPrivacy(Closure $closure) {
        $this->snitch = $closure;
    }

    public function doSomeMagic() {

        return $this->snitch->call($this->resource);
    }
}

$MyProxy = new Proxy();
$MyProxy->setResource(new Resource());

$MyProxy->setDisturberOfPrivacy(function(){
    return $this->data;
});

echo $MyProxy->doSomeMagic();