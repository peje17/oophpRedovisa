<?php

namespace peje17\Dice;

/**
 * Generating histogram data.
 */
class Histogram
{
    /**
     * @var array $serie  The numbers stored in sequence.
     * @var int   $min    The lowest possible number.
     * @var int   $max    The highest possible number.
     */
    private $serie = [];
    private $min;
    private $max;



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getSerie()
    {
        return $this->serie;
    }



    /**
     * Return a string with a textual representation of the histogram.
     *
     * @return string representing the histogram.
     */
    public function getAsText()
    {
        if (count($this->serie) > 0) {
            for ($i=$this->min; $i <= $this->max; $i++) {
                echo $i . ": " . str_repeat("*", count(array_keys($this->serie, $i))) . "\r\n";
            }
        } else {
            echo "";
        }
    }



    /**
     * Inject the object to use as base for the histogram data.
     *
     * @param HistogramInterface $object The object holding the serie.
     *
     * @return void.
     */
    public function injectData(HistogramInterface $object)
    {
        $this->serie[] = $object->getHistogramSerie();
        $this->min   = $object->getHistogramMin();
        $this->max   = $object->getHistogramMax();
    }
}
