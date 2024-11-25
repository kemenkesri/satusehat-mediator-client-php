<?php
/**
 * SubmitResponse
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
 * SubmitResponse Class Doc Comment
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SubmitResponse implements ModelInterface, ArrayAccess
{
    public static $DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SubmitResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'satusehat' => 'Mediator\SatuSehat\Lib\Client\Model\SatuSehatResponse[]',
        'episode_of_care' => 'Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare',
        'suspect_tb' => 'Mediator\SatuSehat\Lib\Client\Model\TbSuspect',
        'confirm_tb' => 'Mediator\SatuSehat\Lib\Client\Model\TbConfirm',
        'labExamRequest' => 'Mediator\SatuSehat\Lib\Client\Model\TbLabRequest',
        'labExamResult' => 'Mediator\SatuSehat\Lib\Client\Model\TbLabResult',
        'sitb' => 'Mediator\SatuSehat\Lib\Client\Model\SitbResponse',
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'satusehat' => null,
        'episode_of_care' => null,
        'suspect_tb' => null,
        'confirm_tb' => null,
        'labExamRequest' => null,
        'labExamResult' => null,
        'sitb' => null,
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
        'satusehat' => 'satusehat',
        'episode_of_care' => 'episodeOfCare',
        'suspect_tb' => 'suspect_tb',
        'confirm_tb' => 'confirm_tb',
        'labExamRequest' => 'labExamRequest',
        'labExamResult' => 'labExamResult',
        'sitb' => 'sitb'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'satusehat' => 'setSatusehat',
        'episode_of_care' => 'setEpisodeOfCare',
        'suspect_tb' => 'setTbSuspect',
        'confirm_tb' => 'setTbConfirm',
        'labExamRequest' => 'setTbLabRequest',
        'labExamResult' => 'setTbLabResult',
        'sitb' => 'setSitb'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'satusehat' => 'getSatusehat',
        'episode_of_care' => 'getEpisodeOfCare',
        'suspect_tb' => 'getTbSuspect',
        'confirm_tb' => 'getTbConfirm',
        'labExamRequest' => 'getTbLabRequest',
        'labExamResult' => 'getTbLabResult',
        'sitb' => 'getSitb'
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
        $this->container['satusehat'] = isset($data['satusehat']) ? $data['satusehat'] : null;
        $this->container['episode_of_care'] = isset($data['episode_of_care']) ? $data['episode_of_care'] : null;
        $this->container['suspect_tb'] = isset($data['suspect_tb']) ? $data['suspect_tb'] : null;
        $this->container['confirm_tb'] = isset($data['confirm_tb']) ? $data['confirm_tb'] : null;
        $this->container['labExamRequest'] = isset($data['labExamRequest']) ? $data['labExamRequest'] : null;
        $this->container['labExamResult'] = isset($data['labExamResult']) ? $data['labExamResult'] : null;
        $this->container['sitb'] = isset($data['sitb']) ? $data['sitb'] : null;
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
     * Gets satusehat
     *
     * @return Mediator\SatuSehat\Lib\Client\Model\SatuSehatResponse[]
     */
    public function getSatusehat()
    {
        return $this->container['satusehat'];
    }

    /**
     * Sets satusehat
     *
     * @param Mediator\SatuSehat\Lib\Client\Model\SatuSehatResponse[] $satusehat satusehat
     *
     * @return $this
     */
    public function setSatusehat($satusehat)
    {
        $this->container['satusehat'] = $satusehat;

        return $this;
    }

    /**
     * Gets episode_of_care
     *
     * @return Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare
     */
    public function getEpisodeOfCare()
    {
        return $this->container['episode_of_care'];
    }

    /**
     * Sets episode_of_care
     *
     * @param Mediator\SatuSehat\Lib\Client\Model\EpisodeOfCare $episode_of_care episode_of_care
     *
     * @return $this
     */
    public function setEpisodeOfCare($episode_of_care)
    {
        $this->container['episode_of_care'] = $episode_of_care;

        return $this;
    }

    /**
     * Gets suspect_tb
     *
     * @return Mediator\SatuSehat\Lib\Client\Model\TbSuspect
     */
    public function getTbSuspect()
    {
        return $this->container['suspect_tb'];
    }

    /**
     * Sets suspect_tb
     *
     * @param Mediator\SatuSehat\Lib\Client\Model\TbSuspect $suspect_tb suspect_tb
     *
     * @return $this
     */
    public function setTbSuspect($suspect_tb)
    {
        $this->container['suspect_tb'] = $suspect_tb;

        return $this;
    }

    /**
     * Gets tb_confirm
     *
     * @return \Mediator\SatuSehat\Lib\Client\Model\TbConfirm
     */
    public function getTbConfirm()
    {
        return $this->container['tb_confirm'];
    }

    /**
     * Sets tb_confirm
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\TbConfirm $tb_confirm tb_confirm
     *
     * @return $this
     */
    public function setTbConfirm($tb_confirm)
    {
        $this->container['tb_confirm'] = $tb_confirm;

        return $this;
    }

    /**
     * Gets labExamRequest
     *
     * @return \Mediator\SatuSehat\Lib\Client\Model\TbLabRequest
     */
    public function getTbLabRequest()
    {
        return $this->container['labExamRequest'];
    }

    /**
     * Sets labExamRequest
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\TbLabRequest $labExamRequest labExamRequest
     *
     * @return $this
     */
    public function setTbLabRequest($labExamRequest)
    {
        $this->container['labExamRequest'] = $labExamRequest;

        return $this;
    }

    /**
     * Gets labExamResult
     *
     * @return \Mediator\SatuSehat\Lib\Client\Model\TbLabResult
     */
    public function getTbLabResult()
    {
        return $this->container['labExamResult'];
    }

    /**
     * Sets labExamResult
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\TbLabResult $labExamResult labExamResult
     *
     * @return $this
     */
    public function setTbLabResult($labExamResult)
    {
        $this->container['labExamResult'] = $labExamResult;

        return $this;
    }

    /**
     * Gets sitb
     *
     * @return \Mediator\SatuSehat\Lib\Client\Model\SitbResponse
     */
    public function getSitb()
    {
        return $this->container['sitb'];
    }

    /**
     * Sets sitb
     *
     * @param \Mediator\SatuSehat\Lib\Client\Model\SitbResponse $sitb sitb
     *
     * @return $this
     */
    public function setSitb($sitb)
    {
        $this->container['sitb'] = $sitb;

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
