<?php
/**
 * TbLabResult
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
 * Swagger Codegen version: 3.0.61
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Mediator\SatuSehat\Lib\Client\Model;

use Mediator\SatuSehat\Lib\Client\ObjectSerializer;

/**
 * TbLabResult Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TbLabResult extends MediatorResourceBasic
{
    public static $DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TbLabResult';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
        'person_id' => 'string',
        'permohonan_id' => 'string',
        'tgl_permohonan' => '\DateTime',
        'tgl_contoh_uji' => '\DateTime',
        'kondisi_contoh_uji_id' => 'string',
        'pemeriksa' => 'string',
        'dokter_pemeriksa' => 'string',
        'error' => 'string',
        'success' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
        'person_id' => null,
        'permohonan_id' => null,
        'tgl_permohonan' => 'date-time',
        'tgl_contoh_uji' => 'date-time',
        'kondisi_contoh_uji_id' => null,
        'pemeriksa' => null,
        'dokter_pemeriksa' => null,
        'error' => null,
        'success' => null
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
        'id' => 'id',
        'person_id' => 'person_id',
        'permohonan_id' => 'permohonan_id',
        'tgl_permohonan' => 'tgl_permohonan',
        'tgl_contoh_uji' => 'tgl_contoh_uji',
        'kondisi_contoh_uji_id' => 'kondisi_contoh_uji_id',
        'pemeriksa' => 'pemeriksa',
        'dokter_pemeriksa' => 'dokter_pemeriksa',
        'error' => 'error',
        'success' => 'success'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'person_id' => 'setPersonId',
        'permohonan_id' => 'setPermohonanId',
        'tgl_permohonan' => 'setTglPermohonan',
        'tgl_contoh_uji' => 'setTglContohUji',
        'kondisi_contoh_uji_id' => 'setKondisiContohUjiId',
        'pemeriksa' => 'setPemeriksa',
        'dokter_pemeriksa' => 'setDokterPemeriksa',
        'error' => 'setError',
        'success' => 'setSuccess'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'person_id' => 'getPersonId',
        'permohonan_id' => 'getPermohonanId',
        'tgl_permohonan' => 'getTglPermohonan',
        'tgl_contoh_uji' => 'getTglContohUji',
        'kondisi_contoh_uji_id' => 'getKondisiContohUjiId',
        'pemeriksa' => 'getPemeriksa',
        'dokter_pemeriksa' => 'getDokterPemeriksa',
        'error' => 'getError',
        'success' => 'getSuccess'
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
        parent::__construct($data);

        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['person_id'] = isset($data['person_id']) ? $data['person_id'] : null;
        $this->container['permohonan_id'] = isset($data['permohonan_id']) ? $data['permohonan_id'] : null;
        $this->container['tgl_permohonan'] = isset($data['tgl_permohonan']) ? $data['tgl_permohonan'] : null;
        $this->container['tgl_contoh_uji'] = isset($data['tgl_contoh_uji']) ? $data['tgl_contoh_uji'] : null;
        $this->container['kondisi_contoh_uji_id'] = isset($data['kondisi_contoh_uji_id']) ? $data['kondisi_contoh_uji_id'] : null;
        $this->container['pemeriksa'] = isset($data['pemeriksa']) ? $data['pemeriksa'] : null;
        $this->container['dokter_pemeriksa'] = isset($data['dokter_pemeriksa']) ? $data['dokter_pemeriksa'] : null;
        $this->container['error'] = isset($data['error']) ? $data['error'] : null;
        $this->container['success'] = isset($data['success']) ? $data['success'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets person_id
     *
     * @return string
     */
    public function getPersonId()
    {
        return $this->container['person_id'];
    }

    /**
     * Sets person_id
     *
     * @param string $person_id person_id
     *
     * @return $this
     */
    public function setPersonId($person_id)
    {
        $this->container['person_id'] = $person_id;

        return $this;
    }

    /**
     * Gets permohonan_id
     *
     * @return string
     */
    public function getPermohonanId()
    {
        return $this->container['permohonan_id'];
    }

    /**
     * Sets permohonan_id
     *
     * @param string $permohonan_id permohonan_id
     *
     * @return $this
     */
    public function setPermohonanId($permohonan_id)
    {
        $this->container['permohonan_id'] = $permohonan_id;

        return $this;
    }

    /**
     * Gets tgl_permohonan
     *
     * @return \DateTime
     */
    public function getTglPermohonan()
    {
        return $this->container['tgl_permohonan'];
    }

    /**
     * Sets tgl_permohonan
     *
     * @param \DateTime $tgl_permohonan tgl_permohonan
     *
     * @return $this
     */
    public function setTglPermohonan($tgl_permohonan)
    {
        $this->container['tgl_permohonan'] = $tgl_permohonan;

        return $this;
    }

    /**
     * Gets tgl_contoh_uji
     *
     * @return \DateTime
     */
    public function getTglContohUji()
    {
        return $this->container['tgl_contoh_uji'];
    }

    /**
     * Sets tgl_contoh_uji
     *
     * @param \DateTime $tgl_contoh_uji tgl_contoh_uji
     *
     * @return $this
     */
    public function setTglContohUji($tgl_contoh_uji)
    {
        $this->container['tgl_contoh_uji'] = $tgl_contoh_uji;

        return $this;
    }

    /**
     * Gets kondisi_contoh_uji_id
     *
     * @return string
     */
    public function getKondisiContohUjiId()
    {
        return $this->container['kondisi_contoh_uji_id'];
    }

    /**
     * Sets kondisi_contoh_uji_id
     *
     * @param string $kondisi_contoh_uji_id kondisi_contoh_uji_id
     *
     * @return $this
     */
    public function setKondisiContohUjiId($kondisi_contoh_uji_id)
    {
        $this->container['kondisi_contoh_uji_id'] = $kondisi_contoh_uji_id;

        return $this;
    }

    /**
     * Gets pemeriksa
     *
     * @return string
     */
    public function getPemeriksa()
    {
        return $this->container['pemeriksa'];
    }

    /**
     * Sets pemeriksa
     *
     * @param string $pemeriksa pemeriksa
     *
     * @return $this
     */
    public function setPemeriksa($pemeriksa)
    {
        $this->container['pemeriksa'] = $pemeriksa;

        return $this;
    }

    /**
     * Gets dokter_pemeriksa
     *
     * @return string
     */
    public function getDokterPemeriksa()
    {
        return $this->container['dokter_pemeriksa'];
    }

    /**
     * Sets dokter_pemeriksa
     *
     * @param string $dokter_pemeriksa dokter_pemeriksa
     *
     * @return $this
     */
    public function setDokterPemeriksa($dokter_pemeriksa)
    {
        $this->container['dokter_pemeriksa'] = $dokter_pemeriksa;

        return $this;
    }

    /**
     * Gets error
     *
     * @return string
     */
    public function getError()
    {
        return $this->container['error'];
    }

    /**
     * Sets error
     *
     * @param string $error error
     *
     * @return $this
     */
    public function setError($error)
    {
        $this->container['error'] = $error;

        return $this;
    }

    /**
     * Gets success
     *
     * @return bool
     */
    public function getSuccess()
    {
        return $this->container['success'];
    }

    /**
     * Sets success
     *
     * @param bool $success success
     *
     * @return $this
     */
    public function setSuccess($success)
    {
        $this->container['success'] = $success;

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
