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

namespace Google\Service\SmartDeviceManagement;

class GoogleHomeEnterpriseSdmV1ListDevicesResponse extends \Google\Collection
{
  protected $collection_key = 'devices';
  protected $devicesType = GoogleHomeEnterpriseSdmV1Device::class;
  protected $devicesDataType = 'array';

  /**
   * @param GoogleHomeEnterpriseSdmV1Device[]
   */
  public function setDevices($devices)
  {
    $this->devices = $devices;
  }
  /**
   * @return GoogleHomeEnterpriseSdmV1Device[]
   */
  public function getDevices()
  {
    return $this->devices;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleHomeEnterpriseSdmV1ListDevicesResponse::class, 'Google_Service_SmartDeviceManagement_GoogleHomeEnterpriseSdmV1ListDevicesResponse');
