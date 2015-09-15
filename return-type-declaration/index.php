<?php
/**
 *
 * @author j
 * Date: 9/15/15
 * Time: 9:02 PM
 *
 * File: index.php
 */

declare(strict_types=1);

/**
 * @return int
 */
function randomIntegerGenerator() : int {
    return random_int(0, 99999);
}


/**
 * Interface DataModel
 */
interface DataModel {
    public function __construct($id);
}

/**
 * Class Comment
 */
class Comment implements  DataModel {

    /**
     * @var int id
     */
    private $id;

    /**
     * @param int $id
     */
    public function __construct($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }
}


/**
 * Interface DataModelFactory
 */
interface DataModelFactory {
    public function make() : DataModel;
}

/**
 * Class CommentDataModelFactory
 */
class CommentDataModelFactory implements DataModelFactory {
    public function make() : DataModel {
        return new Comment(randomIntegerGenerator());
    }
}

$factory = new CommentDataModelFactory();
$comment = $factory->make();

var_dump($comment);

try {
    /**
     * Class CommentDataModelFactory
     * -> fatal error
     */
    class CommentDataModelFactory2 implements DataModelFactory {
        public function make() : DataModel {
            return [];
        }
    }

    $factory = new CommentDataModelFactory2();
    $comment = $factory->make();

    var_dump($comment);

} catch (Throwable $e) {
    echo "<br />". $e->getMessage();
}

