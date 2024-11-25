<?php
/**
 * SitbResponse
 *
 * PHP version 5
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Swagger Mediator  SATUSEHAT
 *
 * Spesifikasi API ini merupakan contoh untuk menggunakan **Mediator Interoperabilitas SATUSEHAT** yang secara khusus ditujukan untuk mempercepat dan memudahkan proses interoperabilitas data Rekam Medis Elektronik (RME) antara sistem informasi di Fasilitas Kesehatan (Rumah Sakit, Puskesmas, Klinik, Laboratorium, dll) dengan Platform SATUSEHAT.  Mediator Interoperabilitas SATUSEHAT menyediakan format custom yang disederhanakan dari format HL7 FHIR sebagai perantara antara sistem RME dengan SATUSEHAT beserta sistem informasi kesehatan yang ada ditingkat nasional.
 *
 * OpenAPI spec version: 1.0.1
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.64
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Mediator\SatuSehat\Lib\Client\Model;

use ArrayAccess;
use Mediator\SatuSehat\Lib\Client\ObjectSerializer;

/**
 * SitbResponse Class Doc Comment
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SitbResponse implements ModelInterface, ArrayAccess
{
    public static $DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SitbResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'ta_terduga_tb' => 'Mediator\SatuSehatib\Client\Model\TbSuspect[]',
        'ta_permohonan_lab' => 'Mediator\SatuSehatib\Client\Model\TbLabRequest[]',
        'ta_hasil_lab' => 'Mediator\SatuSehatib\Client\Model\TbLabResult[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'ta_terduga_tb' => null,
        'ta_permohonan_lab' => null,
        'ta_hasil_lab' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'ta_terduga_tb' => 'ta_terduga_tb',
        'ta_permohonan_lab' => 'ta_permohonan_lab',
        'ta_hasil_lab' => 'ta_hasil_lab'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'ta_terduga_tb' => 'setTaTerdugaTb',
        'ta_permohonan_lab' => 'setTaPermohonanLab',
        'ta_hasil_lab' => 'setTaHasilLab'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'ta_terduga_tb' => 'getTaTerdugaTb',
        'ta_permohonan_lab' => 'getTaPermohonanLab',
        'ta_hasil_lab' => 'getTaHasilLab'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }



    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['ta_terduga_tb'] = isset($data['ta_terduga_tb']) ? $data['ta_terduga_tb'] : null;
        $this->container['ta_permohonan_lab'] = isset($data['ta_permohonan_lab']) ? $data['ta_permohonan_lab'] : null;
        $this->container['ta_hasil_lab'] = isset($data['ta_hasil_lab']) ? $data['ta_hasil_lab'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets ta_terduga_tb
     *
     * @return Mediator\SatuSehatib\Client\Model\TbSuspect[]
     */
    public function getTaTerdugaTb()
    {
        return $this->container['ta_terduga_tb'];
    }

    /**
     * Sets ta_terduga_tb
     *
     * @param Mediator\SatuSehatib\Client\Model\TbSuspect[] $ta_terduga_tb ta_terduga_tb
     *
     * @return $this
     */
    public function setTaTerdugaTb($ta_terduga_tb)
    {
        $this->container['ta_terduga_tb'] = $ta_terduga_tb;

        return $this;
    }

    /**
     * Gets ta_permohonan_lab
     *
     * @return Mediator\SatuSehatib\Client\Model\TbLabRequest[]
     */
    public function getTaPermohonanLab()
    {
        return $this->container['ta_permohonan_lab'];
    }

    /**
     * Sets ta_permohonan_lab
     *
     * @param Mediator\SatuSehatib\Client\Model\TbLabRequest[] $ta_permohonan_lab ta_permohonan_lab
     *
     * @return $this
     */
    public function setTaPermohonanLab($ta_permohonan_lab)
    {
        $this->container['ta_permohonan_lab'] = $ta_permohonan_lab;

        return $this;
    }

    /**
     * Gets ta_hasil_lab
     *
     * @return Mediator\SatuSehatib\Client\Model\TbLabResult[]
     */
    public function getTaHasilLab()
    {
        return $this->container['ta_hasil_lab'];
    }

    /**
     * Sets ta_hasil_lab
     *
     * @param Mediator\SatuSehatib\Client\Model\TbLabResult[] $ta_hasil_lab ta_hasil_lab
     *
     * @return $this
     */
    public function setTaHasilLab($ta_hasil_lab)
    {
        $this->container['ta_hasil_lab'] = $ta_hasil_lab;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
