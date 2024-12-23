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

namespace Google\Service\Bigquery;

class ExternalServiceCost extends \Google\Model
{
  /**
   * @var string
   */
  public $bytesBilled;
  /**
   * @var string
   */
  public $bytesProcessed;
  /**
   * @var string
   */
  public $externalService;
  /**
   * @var string
   */
  public $reservedSlotCount;
  /**
   * @var string
   */
  public $slotMs;

  /**
   * @param string
   */
  public function setBytesBilled($bytesBilled)
  {
    $this->bytesBilled = $bytesBilled;
  }
  /**
   * @return string
   */
  public function getBytesBilled()
  {
    return $this->bytesBilled;
  }
  /**
   * @param string
   */
  public function setBytesProcessed($bytesProcessed)
  {
    $this->bytesProcessed = $bytesProcessed;
  }
  /**
   * @return string
   */
  public function getBytesProcessed()
  {
    return $this->bytesProcessed;
  }
  /**
   * @param string
   */
  public function setExternalService($externalService)
  {
    $this->externalService = $externalService;
  }
  /**
   * @return string
   */
  public function getExternalService()
  {
    return $this->externalService;
  }
  /**
   * @param string
   */
  public function setReservedSlotCount($reservedSlotCount)
  {
    $this->reservedSlotCount = $reservedSlotCount;
  }
  /**
   * @return string
   */
  public function getReservedSlotCount()
  {
    return $this->reservedSlotCount;
  }
  /**
   * @param string
   */
  public function setSlotMs($slotMs)
  {
    $this->slotMs = $slotMs;
  }
  /**
   * @return string
   */
  public function getSlotMs()
  {
    return $this->slotMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExternalServiceCost::class, 'Google_Service_Bigquery_ExternalServiceCost');
