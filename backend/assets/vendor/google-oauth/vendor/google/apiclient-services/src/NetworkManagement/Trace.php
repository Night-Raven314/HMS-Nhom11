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

namespace Google\Service\NetworkManagement;

class Trace extends \Google\Collection
{
  protected $collection_key = 'steps';
  protected $endpointInfoType = EndpointInfo::class;
  protected $endpointInfoDataType = '';
  /**
   * @var int
   */
  public $forwardTraceId;
  protected $stepsType = Step::class;
  protected $stepsDataType = 'array';

  /**
   * @param EndpointInfo
   */
  public function setEndpointInfo(EndpointInfo $endpointInfo)
  {
    $this->endpointInfo = $endpointInfo;
  }
  /**
   * @return EndpointInfo
   */
  public function getEndpointInfo()
  {
    return $this->endpointInfo;
  }
  /**
   * @param int
   */
  public function setForwardTraceId($forwardTraceId)
  {
    $this->forwardTraceId = $forwardTraceId;
  }
  /**
   * @return int
   */
  public function getForwardTraceId()
  {
    return $this->forwardTraceId;
  }
  /**
   * @param Step[]
   */
  public function setSteps($steps)
  {
    $this->steps = $steps;
  }
  /**
   * @return Step[]
   */
  public function getSteps()
  {
    return $this->steps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Trace::class, 'Google_Service_NetworkManagement_Trace');
