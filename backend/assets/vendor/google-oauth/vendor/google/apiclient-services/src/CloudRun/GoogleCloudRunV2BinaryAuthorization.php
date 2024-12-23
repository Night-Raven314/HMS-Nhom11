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

namespace Google\Service\CloudRun;

class GoogleCloudRunV2BinaryAuthorization extends \Google\Model
{
  /**
   * @var string
   */
  public $breakglassJustification;
  /**
   * @var string
   */
  public $policy;
  /**
   * @var bool
   */
  public $useDefault;

  /**
   * @param string
   */
  public function setBreakglassJustification($breakglassJustification)
  {
    $this->breakglassJustification = $breakglassJustification;
  }
  /**
   * @return string
   */
  public function getBreakglassJustification()
  {
    return $this->breakglassJustification;
  }
  /**
   * @param string
   */
  public function setPolicy($policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return string
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  /**
   * @param bool
   */
  public function setUseDefault($useDefault)
  {
    $this->useDefault = $useDefault;
  }
  /**
   * @return bool
   */
  public function getUseDefault()
  {
    return $this->useDefault;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunV2BinaryAuthorization::class, 'Google_Service_CloudRun_GoogleCloudRunV2BinaryAuthorization');
