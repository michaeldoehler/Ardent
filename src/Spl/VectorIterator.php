<?php

namespace Spl;

use Countable,
    Iterator;

class VectorIterator implements Iterator, Countable {

    /**
     * @var Vector
     */
    protected $vector;

    /**
     * @var int
     */
    protected $currentKey = 0;

    function __construct(Vector $vector) {
        $this->vector = $vector;
    }

    /**
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed
     */
    public function current() {
        return $this->vector[$this->currentKey];
    }

    /**
     * @link http://php.net/manual/en/iterator.next.php
     * @return void
     */
    public function next() {
        $this->currentKey++;
    }

    /**
     * @link http://php.net/manual/en/iterator.key.php
     * @return int
     */
    public function key() {
        return $this->currentKey;
    }

    /**
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean
     */
    public function valid() {
        return $this->vector->offsetExists($this->currentKey);
    }

    /**
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind() {
        $this->currentKey = 0;
    }

    /**
     * @link http://php.net/manual/en/countable.count.php
     * @return int
     */
    public function count() {
        return $this->vector->count();
    }

}
