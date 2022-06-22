<?php

namespace T3ko\Dpd\Soap\Types;

class DpdPickupCallParamsV2
{
    /**
     * @var string
     */
    private $operationType;

    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var string
     */
    private $orderType;

    /**
     * @var PickupCallSimplifiedDetailsDPPV1
     */
    private $pickupCallSimplifiedDetails;

    /**
     * @var string
     */
    private $pickupDate;

    /**
     * @var string
     */
    private $pickupTimeFrom;

    /**
     * @var string
     */
    private $pickupTimeTo;

    /**
     * @var PickupCallUpdateModeDPPEnumV1
     */
    private $updateMode;

    /**
     * @var bool
     */
    private $waybillsReady;

    /**
     * @return string
     */
    public function getOperationType() : string
    {
        return $this->operationType;
    }

    /**
     * @param string $operationType
     *
     * @return $this
     */
    public function setOperationType(string $operationType) : DpdPickupCallParamsV2
    {
        $this->operationType = $operationType;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderNumber() : string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     *
     * @return $this
     */
    public function setOrderNumber(string $orderNumber) : DpdPickupCallParamsV2
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderType() : string
    {
        return $this->orderType;
    }

    /**
     * @param string $orderType
     *
     * @return $this
     */
    public function setOrderType(string $orderType) : DpdPickupCallParamsV2
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * @return PickupCallSimplifiedDetailsDPPV1
     */
    public function getPickupCallSimplifiedDetails() : PickupCallSimplifiedDetailsDPPV1
    {
        return $this->pickupCallSimplifiedDetails;
    }

    /**
     * @param PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails
     *
     * @return $this
     */
    public function setPickupCallSimplifiedDetails(PickupCallSimplifiedDetailsDPPV1 $pickupCallSimplifiedDetails) : DpdPickupCallParamsV2
    {
        $this->pickupCallSimplifiedDetails = $pickupCallSimplifiedDetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getPickupDate() : string
    {
        return $this->pickupDate;
    }

    /**
     * @param string $pickupDate
     *
     * @return $this
     */
    public function setPickupDate(string $pickupDate) : DpdPickupCallParamsV2
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getPickupTimeFrom() : string
    {
        return $this->pickupTimeFrom;
    }

    /**
     * @param string $pickupTimeFrom
     *
     * @return $this
     */
    public function setPickupTimeFrom(string $pickupTimeFrom) : DpdPickupCallParamsV2
    {
        $this->pickupTimeFrom = $pickupTimeFrom;

        return $this;
    }

    /**
     * @return string
     */
    public function getPickupTimeTo() : string
    {
        return $this->pickupTimeTo;
    }

    /**
     * @param string $pickupTimeTo
     *
     * @return $this
     */
    public function setPickupTimeTo(string $pickupTimeTo) : DpdPickupCallParamsV2
    {
        $this->pickupTimeTo = $pickupTimeTo;

        return $this;
    }

    /**
     * @return PickupCallUpdateModeDPPEnumV1
     */
    public function getUpdateMode() : PickupCallUpdateModeDPPEnumV1
    {
        return $this->updateMode;
    }

    /**
     * @param PickupCallUpdateModeDPPEnumV1 $updateMode
     *
     * @return $this
     */
    public function setUpdateMode(PickupCallUpdateModeDPPEnumV1 $updateMode) : DpdPickupCallParamsV2
    {
        $this->updateMode = $updateMode;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWaybillsReady() : bool
    {
        return $this->waybillsReady;
    }

    /**
     * @param bool $waybillsReady
     *
     * @return $this
     */
    public function setWaybillsReady(bool $waybillsReady) : DpdPickupCallParamsV2
    {
        $this->waybillsReady = $waybillsReady;

        return $this;
    }
}
