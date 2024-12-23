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

namespace Google\Service\CloudIdentity;

class GoogleAppsCloudidentityDevicesV1WipeDeviceRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $customer;
  /**
   * @var bool
   */
  public $removeResetLock;

  /**
   * @param string
   */
  public function setCustomer($customer)
  {
    $this->customer = $customer;
  }
  /**
   * @return string
   */
  public function getCustomer()
  {
    return $this->customer;
  }
  /**
   * @param bool
   */
  public function setRemoveResetLock($removeResetLock)
  {
    $this->removeResetLock = $removeResetLock;
  }
  /**
   * @return bool
   */
  public function getRemoveResetLock()
  {
    return $this->removeResetLock;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCloudidentityDevicesV1WipeDeviceRequest::class, 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1WipeDeviceRequest');
