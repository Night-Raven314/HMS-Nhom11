<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\VMMigrationService;

class ComputeEngineDisksTargetDetails extends \Google\Collection
{
  protected $collection_key = 'disks';
  protected $disksType = PersistentDisk::class;
  protected $disksDataType = 'array';
  protected $disksTargetDetailsType = DisksMigrationDisksTargetDetails::class;
  protected $disksTargetDetailsDataType = '';
  protected $vmTargetDetailsType = DisksMigrationVmTargetDetails::class;
  protected $vmTargetDetailsDataType = '';

  /**
   * @param PersistentDisk[]
   */
  public function setDisks($disks)
  {
    $this->disks = $disks;
  }
  /**
   * @return PersistentDisk[]
   */
  public function getDisks()
  {
    return $this->disks;
  }
  /**
   * @param DisksMigrationDisksTargetDetails
   */
  public function setDisksTargetDetails(DisksMigrationDisksTargetDetails $disksTargetDetails)
  {
    $this->disksTargetDetails = $disksTargetDetails;
  }
  /**
   * @return DisksMigrationDisksTargetDetails
   */
  public function getDisksTargetDetails()
  {
    return $this->disksTargetDetails;
  }
  /**
   * @param DisksMigrationVmTargetDetails
   */
  public function setVmTargetDetails(DisksMigrationVmTargetDetails $vmTargetDetails)
  {
    $this->vmTargetDetails = $vmTargetDetails;
  }
  /**
   * @return DisksMigrationVmTargetDetails
   */
  public function getVmTargetDetails()
  {
    return $this->vmTargetDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ComputeEngineDisksTargetDetails::class, 'Google_Service_VMMigrationService_ComputeEngineDisksTargetDetails');
