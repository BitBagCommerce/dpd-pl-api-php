<?php

namespace T3ko\Dpd\Response;

use T3ko\Dpd\Exception\ApiException;
use T3ko\Dpd\Objects\RegisteredPackage;
use T3ko\Dpd\Objects\RegisteredParcel;
use T3ko\Dpd\Soap\Types\GeneratePackagesNumbersV4Response;
use T3ko\Dpd\Soap\Types\PackagePGRV2;
use T3ko\Dpd\Soap\Types\ParcelPGRV2;

class GeneratePackageNumbersResponse
{
    private $packages;

    /**
     * GeneratePackageNumbersResponse constructor.
     *
     * @param RegisteredPackage[] $packages
     */
    protected function __construct(array $packages)
    {
        $this->packages = $packages;
    }

    /**
     * @param GeneratePackagesNumbersV4Response $response
     *
     * @throws \Exception
     * @throws ApiException
     *
     * @return GeneratePackageNumbersResponse
     */
    public static function from(GeneratePackagesNumbersV4Response $response)
    {
        $responseReturn = $response->getReturn();
        $responseStatus = $responseReturn->getStatus();

        if ('OK' !== $responseStatus) {
            if ('DISALLOWED_FID' === $responseStatus) {
                throw new ApiException($responseStatus);
            }

            /** @var \stdClass $responsePackages */
            $responsePackages = $responseReturn->getPackages();

            /** @var PackagePGRV2[] $packages */
            $packages = $responsePackages->Package;

            $firstPackage = $packages[0];

            $validationInfo = $firstPackage->getValidationDetails()->ValidationInfo[0] ?? null;

            throw new ApiException($validationInfo->Info);
        }

        if (null !== $responseReturn->getPackages() && is_array($responseReturn->getPackages()->Package)) {
            $packages = $responseReturn->getPackages()->Package;
            $registeredPackages = [];

            /** @var PackagePGRV2 $package */
            foreach ($packages as $package) {
                $packageValidationDetails = [];
                if (null !== $package->getValidationDetails() && is_array($package->getValidationDetails()->ValidationInfo)) {
                    $packageValidationDetails = $package->getValidationDetails()->ValidationInfo;
                }

                $parcels = [];
                if (null !== $package->getParcels() && is_array($package->getParcels()->Parcel)) {
                    $parcels = $package->getParcels()->Parcel;
                }

                $registeredParcels = [];
                /** @var ParcelPGRV2 $parcel */
                foreach ($parcels as $parcel) {
                    $parcelValidationDetails = [];
                    if (null !== $parcel->getValidationDetails() && is_array($parcel->getValidationDetails()->ValidationInfo)) {
                        $parcelValidationDetails = $parcel->getValidationDetails()->ValidationInfo;
                    }

                    $registeredParcels[] = new RegisteredParcel(
                        $parcel->getParcelId(),
                        $parcel->getStatus(),
                        $parcel->getReference(),
                        $parcelValidationDetails,
                        $parcel->getWaybill()
                    );
                }

                $registeredPackages[] = new RegisteredPackage(
                    $package->getPackageId(),
                    $package->getStatus(),
                    $package->getReference(),
                    $packageValidationDetails,
                    $registeredParcels
                );
            }

            return new static($registeredPackages);
        }
    }

    /**
     * @return RegisteredPackage[]
     */
    public function getPackages(): array
    {
        return $this->packages;
    }
}
