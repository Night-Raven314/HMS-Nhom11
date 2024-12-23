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

namespace Google\Service\Config;

class TerraformVersion extends \Google\Model
{
  /**
   * @var string
   */
  public $deprecateTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $obsoleteTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $supportTime;

  /**
   * @param string
   */
  public function setDeprecateTime($deprecateTime)
  {
    $this->deprecateTime = $deprecateTime;
  }
  /**
   * @return string
   */
  public function getDeprecateTime()
  {
    return $this->deprecateTime;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setObsoleteTime($obsoleteTime)
  {
    $this->obsoleteTime = $obsoleteTime;
  }
  /**
   * @return string
   */
  public function getObsoleteTime()
  {
    return $this->obsoleteTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setSupportTime($supportTime)
  {
    $this->supportTime = $supportTime;
  }
  /**
   * @return string
   */
  public function getSupportTime()
  {
    return $this->supportTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TerraformVersion::class, 'Google_Service_Config_TerraformVersion');
