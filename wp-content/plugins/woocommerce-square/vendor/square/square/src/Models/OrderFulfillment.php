<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Contains details about how to fulfill this order.
 */
class OrderFulfillment implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var array|null
     */
    private $metadata;

    /**
     * @var OrderFulfillmentPickupDetails|null
     */
    private $pickupDetails;

    /**
     * @var OrderFulfillmentShipmentDetails|null
     */
    private $shipmentDetails;

    /**
     * Returns Uid.
     *
     * A unique ID that identifies the fulfillment only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID that identifies the fulfillment only within this order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Type.
     *
     * The type of fulfillment.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * The type of fulfillment.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns State.
     *
     * The current state of this fulfillment.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * The current state of this fulfillment.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Metadata.
     *
     * Application-defined data attached to this fulfillment. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (such as personally
     * identifiable information or card details).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries can also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a maximum length of 255 characters.
     *
     * An application can have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * For more information, see [Metadata](https://developer.squareup.com/docs/build-basics/metadata).
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * Sets Metadata.
     *
     * Application-defined data attached to this fulfillment. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (such as personally
     * identifiable information or card details).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries can also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a maximum length of 255 characters.
     *
     * An application can have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * For more information, see [Metadata](https://developer.squareup.com/docs/build-basics/metadata).
     *
     * @maps metadata
     */
    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }

    /**
     * Returns Pickup Details.
     *
     * Contains details necessary to fulfill a pickup order.
     */
    public function getPickupDetails(): ?OrderFulfillmentPickupDetails
    {
        return $this->pickupDetails;
    }

    /**
     * Sets Pickup Details.
     *
     * Contains details necessary to fulfill a pickup order.
     *
     * @maps pickup_details
     */
    public function setPickupDetails(?OrderFulfillmentPickupDetails $pickupDetails): void
    {
        $this->pickupDetails = $pickupDetails;
    }

    /**
     * Returns Shipment Details.
     *
     * Contains the details necessary to fulfill a shipment order.
     */
    public function getShipmentDetails(): ?OrderFulfillmentShipmentDetails
    {
        return $this->shipmentDetails;
    }

    /**
     * Sets Shipment Details.
     *
     * Contains the details necessary to fulfill a shipment order.
     *
     * @maps shipment_details
     */
    public function setShipmentDetails(?OrderFulfillmentShipmentDetails $shipmentDetails): void
    {
        $this->shipmentDetails = $shipmentDetails;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return mixed
     */
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->uid)) {
            $json['uid']              = $this->uid;
        }
        if (isset($this->type)) {
            $json['type']             = $this->type;
        }
        if (isset($this->state)) {
            $json['state']            = $this->state;
        }
        if (isset($this->metadata)) {
            $json['metadata']         = $this->metadata;
        }
        if (isset($this->pickupDetails)) {
            $json['pickup_details']   = $this->pickupDetails;
        }
        if (isset($this->shipmentDetails)) {
            $json['shipment_details'] = $this->shipmentDetails;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
