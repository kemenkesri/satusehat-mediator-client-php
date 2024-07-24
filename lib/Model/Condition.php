<?php
/**
 * Condition
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
use \Mediator\SatuSehat\Lib\Client\ObjectSerializer;

/**
 * Condition Class Doc Comment
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Condition extends MediatorResourceBasic
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Condition';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'code_condition' => 'string',
        'code_system' => 'string',
        'code_detail' => 'string',
        'created' => '\DateTime',
        'record_date' => '\DateTime',
        'category' => 'string',
        'diagnosis_type' => 'string',
        'rank' => 'int',
        'onset_date' => '\DateTime',
        'status' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'code_condition' => null,
        'code_system' => null,
        'code_detail' => null,
        'created' => 'date-time',
        'record_date' => 'date-time',
        'category' => null,
        'diagnosis_type' => null,
        'rank' => null,
        'onset_date' => 'date',
        'status' => null
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
        'code_condition' => 'code_condition',
        'code_system' => 'code_system',
        'code_detail' => 'code_detail',
        'created' => 'created',
        'record_date' => 'recordDate',
        'category' => 'category',
        'diagnosis_type' => 'diagnosis_type',
        'rank' => 'rank',
        'onset_date' => 'onsetDate',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'code_condition' => 'setCodeCondition',
        'code_system' => 'setCodeSystem',
        'code_detail' => 'setCodeDetail',
        'created' => 'setCreated',
        'record_date' => 'setRecordDate',
        'category' => 'setCategory',
        'diagnosis_type' => 'setDiagnosisType',
        'rank' => 'setRank',
        'onset_date' => 'setOnsetDate',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'code_condition' => 'getCodeCondition',
        'code_system' => 'getCodeSystem',
        'code_detail' => 'getCodeDetail',
        'created' => 'getCreated',
        'record_date' => 'getRecordDate',
        'category' => 'getCategory',
        'diagnosis_type' => 'getDiagnosisType',
        'rank' => 'getRank',
        'onset_date' => 'getOnsetDate',
        'status' => 'getStatus'
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

    public const CATEGORY_ENCOUNTER_DIAGNOSIS = 'encounter-diagnosis';
    public const CATEGORY_PROBLEM_LIST_ITEM = 'problem-list-item';
    public const DIAGNOSIS_TYPE_AD = 'AD';
    public const DIAGNOSIS_TYPE_DD = 'DD';
    public const DIAGNOSIS_TYPE_CC = 'CC';
    public const DIAGNOSIS_TYPE_CM = 'CM';
    public const DIAGNOSIS_TYPE_PRE_OP = 'pre-op';
    public const DIAGNOSIS_TYPE_POST_OP = 'post-op';
    public const DIAGNOSIS_TYPE_BILLING = 'billing';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_RECURRENCE = 'recurrence';
    public const STATUS_RELAPSE = 'relapse';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_REMISSION = 'remission';
    public const STATUS_RESOLVED = 'resolved';
    public const STATUS_UNKNOWN = 'unknown';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCategoryAllowableValues()
    {
        return [
            self::CATEGORY_ENCOUNTER_DIAGNOSIS,
            self::CATEGORY_PROBLEM_LIST_ITEM,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDiagnosisTypeAllowableValues()
    {
        return [
            self::DIAGNOSIS_TYPE_AD,
            self::DIAGNOSIS_TYPE_DD,
            self::DIAGNOSIS_TYPE_CC,
            self::DIAGNOSIS_TYPE_CM,
            self::DIAGNOSIS_TYPE_PRE_OP,
            self::DIAGNOSIS_TYPE_POST_OP,
            self::DIAGNOSIS_TYPE_BILLING,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_RECURRENCE,
            self::STATUS_RELAPSE,
            self::STATUS_INACTIVE,
            self::STATUS_REMISSION,
            self::STATUS_RESOLVED,
            self::STATUS_UNKNOWN,
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

        $this->container['code_condition'] = isset($data['code_condition']) ? $data['code_condition'] : null;
        $this->container['code_system'] = isset($data['code_system']) ? $data['code_system'] : null;
        $this->container['code_detail'] = isset($data['code_detail']) ? $data['code_detail'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['record_date'] = isset($data['record_date']) ? $data['record_date'] : null;
        $this->container['category'] = isset($data['category']) ? $data['category'] : null;
        $this->container['diagnosis_type'] = isset($data['diagnosis_type']) ? $data['diagnosis_type'] : null;
        $this->container['rank'] = isset($data['rank']) ? $data['rank'] : null;
        $this->container['onset_date'] = isset($data['onset_date']) ? $data['onset_date'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

        $allowedValues = $this->getCategoryAllowableValues();
        if (!is_null($this->container['category']) && !in_array($this->container['category'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'category', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDiagnosisTypeAllowableValues();
        if (!is_null($this->container['diagnosis_type']) && !in_array($this->container['diagnosis_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'diagnosis_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
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
     * Gets code_condition
     *
     * @return string
     */
    public function getCodeCondition()
    {
        return $this->container['code_condition'];
    }

    /**
     * Sets code_condition
     *
     * @param string $code_condition code_condition
     *
     * @return $this
     */
    public function setCodeCondition($code_condition)
    {
        $this->container['code_condition'] = $code_condition;

        return $this;
    }

    /**
     * Gets code_system
     *
     * @return string
     */
    public function getCodeSystem()
    {
        return $this->container['code_system'];
    }

    /**
     * Sets code_system
     *
     * @param string $code_system code_system
     *
     * @return $this
     */
    public function setCodeSystem($code_system)
    {
        $this->container['code_system'] = $code_system;

        return $this;
    }

    /**
     * Gets code_detail
     *
     * @return string
     */
    public function getCodeDetail()
    {
        return $this->container['code_detail'];
    }

    /**
     * Sets code_detail
     *
     * @param string $code_detail code_detail
     *
     * @return $this
     */
    public function setCodeDetail($code_detail)
    {
        $this->container['code_detail'] = $code_detail;

        return $this;
    }

    /**
     * Gets created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime $created created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets record_date
     *
     * @return \DateTime
     */
    public function getRecordDate()
    {
        return $this->container['record_date'];
    }

    /**
     * Sets record_date
     *
     * @param \DateTime $record_date record_date
     *
     * @return $this
     */
    public function setRecordDate($record_date)
    {
        $this->container['record_date'] = $record_date;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string $category category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $allowedValues = $this->getCategoryAllowableValues();
        if (!is_null($category) && !in_array($category, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'category', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets diagnosis_type
     *
     * @return string
     */
    public function getDiagnosisType()
    {
        return $this->container['diagnosis_type'];
    }

    /**
     * Sets diagnosis_type
     *
     * @param string $diagnosis_type diagnosis_type
     *
     * @return $this
     */
    public function setDiagnosisType($diagnosis_type)
    {
        $allowedValues = $this->getDiagnosisTypeAllowableValues();
        if (!is_null($diagnosis_type) && !in_array($diagnosis_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'diagnosis_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['diagnosis_type'] = $diagnosis_type;

        return $this;
    }

    /**
     * Gets rank
     *
     * @return int
     */
    public function getRank()
    {
        return $this->container['rank'];
    }

    /**
     * Sets rank
     *
     * @param int $rank rank
     *
     * @return $this
     */
    public function setRank($rank)
    {
        $this->container['rank'] = $rank;

        return $this;
    }

    /**
     * Gets onset_date
     *
     * @return \DateTime
     */
    public function getOnsetDate()
    {
        return $this->container['onset_date'];
    }

    /**
     * Sets onset_date
     *
     * @param \DateTime $onset_date onset_date
     *
     * @return $this
     */
    public function setOnsetDate($onset_date)
    {
        $this->container['onset_date'] = $onset_date;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

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
