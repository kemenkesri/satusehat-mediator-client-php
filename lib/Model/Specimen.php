<?php
/**
 * Specimen
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
 * Specimen Class Doc Comment
 *
 * @category Class
 * @package  Mediator\SatuSehat\Lib\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Specimen extends MediatorResourceBasic
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Specimen';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'identifier' => 'string',
        'status' => 'string',
        'reference' => 'string',
        'type_code' => 'string',
        'type_detail' => 'string',
        'collected_time' => 'string',
        'transported_time' => '\DateTime',
        'interpreter' => 'string',
        'received_time' => '\DateTime',
        'entrier' => 'string',
        'entry_time' => '\DateTime',
        'processing_time' => '\DateTime',
        'code_request' => 'string[]',
        'condition' => 'string',
        'condition_detail' => 'string',
        'specimen_no' => 'string',
        'note_author' => 'string',
        'note_detail' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'identifier' => null,
        'status' => null,
        'reference' => null,
        'type_code' => null,
        'type_detail' => null,
        'collected_time' => null,
        'transported_time' => 'date-time',
        'interpreter' => null,
        'received_time' => 'date-time',
        'entrier' => null,
        'entry_time' => 'date-time',
        'processing_time' => 'date-time',
        'code_request' => null,
        'condition' => null,
        'condition_detail' => null,
        'specimen_no' => null,
        'note_author' => null,
        'note_detail' => null
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
        'identifier' => 'identifier',
        'status' => 'status',
        'reference' => 'reference',
        'type_code' => 'type_code',
        'type_detail' => 'type_detail',
        'collected_time' => 'collected_time',
        'transported_time' => 'transported_time',
        'interpreter' => 'interpreter',
        'received_time' => 'received_time',
        'entrier' => 'entrier',
        'entry_time' => 'entry_time',
        'processing_time' => 'processing_time',
        'code_request' => 'code_request',
        'condition' => 'condition',
        'condition_detail' => 'condition_detail',
        'specimen_no' => 'specimen_no',
        'note_author' => 'note_author',
        'note_detail' => 'note_detail'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'identifier' => 'setIdentifier',
        'status' => 'setStatus',
        'reference' => 'setReference',
        'type_code' => 'setTypeCode',
        'type_detail' => 'setTypeDetail',
        'collected_time' => 'setCollectedTime',
        'transported_time' => 'setTransportedTime',
        'interpreter' => 'setInterpreter',
        'received_time' => 'setReceivedTime',
        'entrier' => 'setEntrier',
        'entry_time' => 'setEntryTime',
        'processing_time' => 'setProcessingTime',
        'code_request' => 'setCodeRequest',
        'condition' => 'setCondition',
        'condition_detail' => 'setConditionDetail',
        'specimen_no' => 'setSpecimenNo',
        'note_author' => 'setNoteAuthor',
        'note_detail' => 'setNoteDetail'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'identifier' => 'getIdentifier',
        'status' => 'getStatus',
        'reference' => 'getReference',
        'type_code' => 'getTypeCode',
        'type_detail' => 'getTypeDetail',
        'collected_time' => 'getCollectedTime',
        'transported_time' => 'getTransportedTime',
        'interpreter' => 'getInterpreter',
        'received_time' => 'getReceivedTime',
        'entrier' => 'getEntrier',
        'entry_time' => 'getEntryTime',
        'processing_time' => 'getProcessingTime',
        'code_request' => 'getCodeRequest',
        'condition' => 'getCondition',
        'condition_detail' => 'getConditionDetail',
        'specimen_no' => 'getSpecimenNo',
        'note_author' => 'getNoteAuthor',
        'note_detail' => 'getNoteDetail'
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

    public const STATUS_AVAILABLE = 'available';
    public const STATUS_UNAVAILABLE = 'unavailable';
    public const STATUS_UNSATISFACTORY = 'unsatisfactory';
    public const STATUS_ENTERED_IN_ERROR = 'entered-in-error';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_AVAILABLE,
            self::STATUS_UNAVAILABLE,
            self::STATUS_UNSATISFACTORY,
            self::STATUS_ENTERED_IN_ERROR,
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

        $this->container['identifier'] = isset($data['identifier']) ? $data['identifier'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['reference'] = isset($data['reference']) ? $data['reference'] : null;
        $this->container['type_code'] = isset($data['type_code']) ? $data['type_code'] : null;
        $this->container['type_detail'] = isset($data['type_detail']) ? $data['type_detail'] : null;
        $this->container['collected_time'] = isset($data['collected_time']) ? $data['collected_time'] : null;
        $this->container['transported_time'] = isset($data['transported_time']) ? $data['transported_time'] : null;
        $this->container['interpreter'] = isset($data['interpreter']) ? $data['interpreter'] : null;
        $this->container['received_time'] = isset($data['received_time']) ? $data['received_time'] : null;
        $this->container['entrier'] = isset($data['entrier']) ? $data['entrier'] : null;
        $this->container['entry_time'] = isset($data['entry_time']) ? $data['entry_time'] : null;
        $this->container['processing_time'] = isset($data['processing_time']) ? $data['processing_time'] : null;
        $this->container['code_request'] = isset($data['code_request']) ? $data['code_request'] : null;
        $this->container['condition'] = isset($data['condition']) ? $data['condition'] : null;
        $this->container['condition_detail'] = isset($data['condition_detail']) ? $data['condition_detail'] : null;
        $this->container['specimen_no'] = isset($data['specimen_no']) ? $data['specimen_no'] : null;
        $this->container['note_author'] = isset($data['note_author']) ? $data['note_author'] : null;
        $this->container['note_detail'] = isset($data['note_detail']) ? $data['note_detail'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

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
     * Gets identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->container['identifier'];
    }

    /**
     * Sets identifier
     *
     * @param string $identifier identifier
     *
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->container['identifier'] = $identifier;

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
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference reference
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets type_code
     *
     * @return string
     */
    public function getTypeCode()
    {
        return $this->container['type_code'];
    }

    /**
     * Sets type_code
     *
     * @param string $type_code type_code
     *
     * @return $this
     */
    public function setTypeCode($type_code)
    {
        $this->container['type_code'] = $type_code;

        return $this;
    }

    /**
     * Gets type_detail
     *
     * @return string
     */
    public function getTypeDetail()
    {
        return $this->container['type_detail'];
    }

    /**
     * Sets type_detail
     *
     * @param string $type_detail type_detail
     *
     * @return $this
     */
    public function setTypeDetail($type_detail)
    {
        $this->container['type_detail'] = $type_detail;

        return $this;
    }

    /**
     * Gets collected_time
     *
     * @return string
     */
    public function getCollectedTime()
    {
        return $this->container['collected_time'];
    }

    /**
     * Sets collected_time
     *
     * @param string $collected_time collected_time
     *
     * @return $this
     */
    public function setCollectedTime($collected_time)
    {
        $this->container['collected_time'] = $collected_time;

        return $this;
    }

    /**
     * Gets transported_time
     *
     * @return \DateTime
     */
    public function getTransportedTime()
    {
        return $this->container['transported_time'];
    }

    /**
     * Sets transported_time
     *
     * @param \DateTime $transported_time transported_time
     *
     * @return $this
     */
    public function setTransportedTime($transported_time)
    {
        $this->container['transported_time'] = $transported_time;

        return $this;
    }

    /**
     * Gets interpreter
     *
     * @return string
     */
    public function getInterpreter()
    {
        return $this->container['interpreter'];
    }

    /**
     * Sets interpreter
     *
     * @param string $interpreter interpreter
     *
     * @return $this
     */
    public function setInterpreter($interpreter)
    {
        $this->container['interpreter'] = $interpreter;

        return $this;
    }

    /**
     * Gets received_time
     *
     * @return \DateTime
     */
    public function getReceivedTime()
    {
        return $this->container['received_time'];
    }

    /**
     * Sets received_time
     *
     * @param \DateTime $received_time received_time
     *
     * @return $this
     */
    public function setReceivedTime($received_time)
    {
        $this->container['received_time'] = $received_time;

        return $this;
    }

    /**
     * Gets entrier
     *
     * @return string
     */
    public function getEntrier()
    {
        return $this->container['entrier'];
    }

    /**
     * Sets entrier
     *
     * @param string $entrier entrier
     *
     * @return $this
     */
    public function setEntrier($entrier)
    {
        $this->container['entrier'] = $entrier;

        return $this;
    }

    /**
     * Gets entry_time
     *
     * @return \DateTime
     */
    public function getEntryTime()
    {
        return $this->container['entry_time'];
    }

    /**
     * Sets entry_time
     *
     * @param \DateTime $entry_time entry_time
     *
     * @return $this
     */
    public function setEntryTime($entry_time)
    {
        $this->container['entry_time'] = $entry_time;

        return $this;
    }

    /**
     * Gets processing_time
     *
     * @return \DateTime
     */
    public function getProcessingTime()
    {
        return $this->container['processing_time'];
    }

    /**
     * Sets processing_time
     *
     * @param \DateTime $processing_time processing_time
     *
     * @return $this
     */
    public function setProcessingTime($processing_time)
    {
        $this->container['processing_time'] = $processing_time;

        return $this;
    }

    /**
     * Gets code_request
     *
     * @return string[]
     */
    public function getCodeRequest()
    {
        return $this->container['code_request'];
    }

    /**
     * Sets code_request
     *
     * @param string[] $code_request code_request
     *
     * @return $this
     */
    public function setCodeRequest($code_request)
    {
        $this->container['code_request'] = $code_request;

        return $this;
    }

    /**
     * Gets condition
     *
     * @return string
     */
    public function getCondition()
    {
        return $this->container['condition'];
    }

    /**
     * Sets condition
     *
     * @param string $condition condition
     *
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->container['condition'] = $condition;

        return $this;
    }

    /**
     * Gets condition_detail
     *
     * @return string
     */
    public function getConditionDetail()
    {
        return $this->container['condition_detail'];
    }

    /**
     * Sets condition_detail
     *
     * @param string $condition_detail condition detail
     *
     * @return $this
     */
    public function setConditionDetail($condition_detail)
    {
        $this->container['condition_detail'] = $condition_detail;

        return $this;
    }

    /**
     * Gets specimen_no
     *
     * @return string
     */
    public function getSpecimenNo()
    {
        return $this->container['specimen_no'];
    }

    /**
     * Sets specimen_no
     *
     * @param string $specimen_no specimen_no
     *
     * @return $this
     */
    public function setSpecimenNo($specimen_no)
    {
        $this->container['specimen_no'] = $specimen_no;

        return $this;
    }

    /**
     * Gets note_author
     *
     * @return string
     */
    public function getNoteAuthor()
    {
        return $this->container['note_author'];
    }

    /**
     * Sets note_author
     *
     * @param string $note_author note_author
     *
     * @return $this
     */
    public function setNoteAuthor($note_author)
    {
        $this->container['note_author'] = $note_author;

        return $this;
    }

    /**
     * Gets note_detail
     *
     * @return string
     */
    public function getNoteDetail()
    {
        return $this->container['note_detail'];
    }

    /**
     * Sets note_detail
     *
     * @param string $note_detail note_detail
     *
     * @return $this
     */
    public function setNoteDetail($note_detail)
    {
        $this->container['note_detail'] = $note_detail;

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
