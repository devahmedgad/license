<?php
namespace infobip\api\model\sms\mt\send\binary;

/**
 * This is a generated class and is not intended for modification!
 * TODO: Point to Github contribution instructions
 */
class BinaryContent implements \JsonSerializable
{
    private $dataCoding;
    private $hex;
    private $esmClass;


    public function setDataCoding($dataCoding)
    {
        $this->dataCoding = $dataCoding;
    }
    public function getDataCoding()
    {
        return $this->dataCoding;
    }

    public function setHex($hex)
    {
        $this->hex = $hex;
    }
    public function getHex()
    {
        return $this->hex;
    }

    public function setEsmClass($esmClass)
    {
        $this->esmClass = $esmClass;
    }
    public function getEsmClass()
    {
        return $this->esmClass;
    }


  /**
   * (PHP 5 &gt;= 5.4.0)
   * Specify data which should be serialized to JSON
   * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by json_encode,
   * which is a value of any type other than a resource.
   */
  function jsonSerialize()
  {
      return get_object_vars($this);
  }
}

?>