<?php
/**
 * DocumentStatus
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
 * Swagger Codegen version: 3.0.59
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Mediator\SatuSehat\Lib\Client\Model;

use Mediator\SatuSehat\Lib\Client\ObjectSerializer;

/**
 * DocumentStatus Class Doc Comment
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DocumentStatus extends MediatorResourceBasic
{
    public static $DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DocumentStatus';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'status_code' => 'string',
        'status_time' => 'string',
        'status_assigner' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'status_code' => null,
        'status_time' => null,
        'status_assigner' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes + parent::swaggerTypes();
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats + parent::swaggerFormats();
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'status_code' => 'status_code',
        'status_time' => 'status_time',
        'status_assigner' => 'status_assigner'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'status_code' => 'setStatusCode',
        'status_time' => 'setStatusTime',
        'status_assigner' => 'setStatusAssigner'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'status_code' => 'getStatusCode',
        'status_time' => 'getStatusTime',
        'status_assigner' => 'getStatusAssigner'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return parent::attributeMap() + self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return parent::setters() + self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return parent::getters() + self::$getters;
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

    public static $STATUS_CODE_PRELIMINARY = 'preliminary';
    public static $STATUS_CODE_AMENDED = 'amended';
    public static $STATUS_CODE__FINAL = 'final';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusCodeAllowableValues()
    {
        return [
            self::$STATUS_CODE_PRELIMINARY,
            self::$STATUS_CODE_AMENDED,
            self::$STATUS_CODE__FINAL,
        ];
    }


    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        parent::__construct($data);

        $this->container['status_code'] = isset($data['status_code']) ? $data['status_code'] : null;
        $this->container['status_time'] = isset($data['status_time']) ? $data['status_time'] : null;
        $this->container['status_assigner'] = isset($data['status_assigner']) ? $data['status_assigner'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

        $allowedValues = $this->getStatusCodeAllowableValues();
        if (!is_null($this->container['status_code']) && !in_array($this->container['status_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status_code', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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
     * Gets status_code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->container['status_code'];
    }

    /**
     * Sets status_code
     *
     * @param string $status_code status_code
     *
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $allowedValues = $this->getStatusCodeAllowableValues();
        if (!is_null($status_code) && !in_array($status_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status_code', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status_code'] = $status_code;

        return $this;
    }

    /**
     * Gets status_time
     *
     * @return string
     */
    public function getStatusTime()
    {
        return $this->container['status_time'];
    }

    /**
     * Sets status_time
     *
     * @param string $status_time status_time
     *
     * @return $this
     */
    public function setStatusTime($status_time)
    {
        $this->container['status_time'] = $status_time;

        return $this;
    }

    /**
     * Gets status_assigner
     *
     * @return string
     */
    public function getStatusAssigner()
    {
        return $this->container['status_assigner'];
    }

    /**
     * Sets status_assigner
     *
     * @param string $status_assigner status_assigner
     *
     * @return $this
     */
    public function setStatusAssigner($status_assigner)
    {
        $this->container['status_assigner'] = $status_assigner;

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
