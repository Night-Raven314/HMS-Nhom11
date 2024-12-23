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

namespace Google\Service\Directory;

class ChangeChromeOsDeviceStatusResult extends \Google\Model
{
  /**
   * @var string
   */
  public $deviceId;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  protected $responseType = ChangeChromeOsDeviceStatusSucceeded::class;
  protected $responseDataType = '';

  /**
   * @param string
   */
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return string
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param ChangeChromeOsDeviceStatusSucceeded
   */
  public function setResponse(ChangeChromeOsDeviceStatusSucceeded $response)
  {
    $this->response = $response;
  }
  /**
   * @return ChangeChromeOsDeviceStatusSucceeded
   */
  public function getResponse()
  {
    return $this->response;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChangeChromeOsDeviceStatusResult::class, 'Google_Service_Directory_ChangeChromeOsDeviceStatusResult');
