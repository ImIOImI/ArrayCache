<?php
namespace ArrayCache;
/**
 * User:  troy
 * Date:  5/1/2016
 * Time:  2:50 PM
 */

/**
 * Class ArrayCache
 * @package ArrayCache
 */
class ArrayCache
{
    /** @var string $filename; set in $this->cache($array, $filename)*/
    public $filename;
    /** @var string $arrayString; a string representation of the array you are caching*/
    var $arrayString;
    /** @var array $array; the array you are caching, set in $this->cache($array, $filename)*/
    var $array;
    /** @var string $text; total text of the file to be written*/
    var $text;

    /**
     * ArrayCache constructor.
     * @param array $array
     * @param string $filename
     */
    function __construct(array $array, $filename)
    {
        $this->cache($array, $filename);
    }

    /**
     * Supply this method with an array and a filename, and it will create a file that returns the array.
     *
     * @param array $array
     * @param string $filename
     */
    function cache(array $array, $filename = false)
    {
        $this->arrayToString($array);

        if($filename == false){
            $filename = dirname(__FILE__) . '/cache/example.php';
        }

        $this->filename = $filename;
        $this->write();
    }

    /**
     * @param bool $array
     * @return string
     */
    function arrayToString($array = false){
        if($array != false){
            $this->array = $array;
        }

        $this->arrayString = var_export($this->array, true);

        return $this->arrayString;
    }

    /**
     * Writes a string to a file
     *
     * @param string|bool $string
     * @param $string|bool $filename
     */
    function write($string = false, $filename = false)
    {
        if($string != false){
            $this->arrayString = $string;
        }

        if($filename != false){
            $this->filename = $filename;
        }

        $text = $this->buildFile();

        $fHandle = fopen($this->filename, 'w');

        if($fHandle == false){
            trigger_error('cannot open file ' . $this->filename);
            return false;
        }

        fwrite($fHandle, $text);
        fclose($fHandle);
    }

    /**
     * Builds the text for a file
     *
     * @return string
     */
    protected function buildFile()
    {
        $dateObj = new \DateTime();
        $date = $dateObj->format('Y-m-d H:i:s');

        $text = <<<EOD
<?php
//auto generated on $date
    
return $this->arrayString;
EOD;

        $this->text = $text;
        return $this->text;
    }
}