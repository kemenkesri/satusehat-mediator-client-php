<?php
/**
 * GetPatientResponse
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

use ArrayAccess;
use Mediator\SatuSehat\Lib\Client\ObjectSerializer;

/**
 * GetPatientResponse Class Doc Comment
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class GetPatientResponse implements ModelInterface, ArrayAccess
{
    public static $DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetPatientResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'patient' => '\Mediator\SatuSehat\Lib\Client\Model\Patient',
        'episode_of_care' => '\Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare[]',
        'tb_suspect' => '\Mediator\SatuSehat\Lib\Client\Model\TbSuspect[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'patient' => null,
        'episode_of_care' => null,
        'tb_suspect' => null
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
        'patient' => 'patient',
        'episode_of_care' => 'episode_of_care',
        'tb_suspect' => 'tb_suspect'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'patient' => 'setPatient',
        'episode_of_care' => 'setEpisodeOfCare',
        'tb_suspect' => 'setTbSuspect'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'patient' => 'getPatient',
        'episode_of_care' => 'getEpisodeOfCare',
        'tb_suspect' => 'getTbSuspect'
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
        $this->container['patient'] = isset($data['patient']) ? $data['patient'] : null;
        $this->container['episode_of_care'] = isset($data['episode_of_care']) ? $data['episode_of_care'] : null;
        $this->container['tb_suspect'] = isset($data['tb_suspect']) ? $data['tb_suspect'] : null;
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
     * Gets patient
     *
     * @return \Mediator\SatuSehat\Lib\Client\Model\Patient
     */
    public function getPatient()
    {
        return $this->container['patient'];
    }

    /**
     * Sets patient
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\Patient $patient patient
     *
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->container['patient'] = $patient;

        return $this;
    }

    /**
     * Gets episode_of_care
     *
     * @return \Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare[]
     */
    public function getEpisodeOfCare()
    {
        return $this->container['episode_of_care'];
    }

    /**
     * Sets episode_of_care
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare[] $episode_of_care episode_of_care
     *
     * @return $this
     */
    public function setEpisodeOfCare($episode_of_care)
    {
        $this->container['episode_of_care'] = $episode_of_care;

        return $this;
    }

    /**
     * Gets tb_suspect
     *
     * @return \Mediator\SatuSehat\Lib\Client\Model\TbSuspect[]
     */
    public function getTbSuspect()
    {
        return $this->container['tb_suspect'];
    }

    /**
     * Sets tb_suspect
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\TbSuspect[] $tb_suspect tb_suspect
     *
     * @return $this
     */
    public function setTbSuspect($tb_suspect)
    {
        $this->container['tb_suspect'] = $tb_suspect;

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
