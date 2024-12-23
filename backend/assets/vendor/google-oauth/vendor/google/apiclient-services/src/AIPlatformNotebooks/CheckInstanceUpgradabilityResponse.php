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

namespace Google\Service\AIPlatformNotebooks;

class CheckInstanceUpgradabilityResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $upgradeImage;
  /**
   * @var string
   */
  public $upgradeInfo;
  /**
   * @var string
   */
  public $upgradeVersion;
  /**
   * @var bool
   */
  public $upgradeable;

  /**
   * @param string
   */
  public function setUpgradeImage($upgradeImage)
  {
    $this->upgradeImage = $upgradeImage;
  }
  /**
   * @return string
   */
  public function getUpgradeImage()
  {
    return $this->upgradeImage;
  }
  /**
   * @param string
   */
  public function setUpgradeInfo($upgradeInfo)
  {
    $this->upgradeInfo = $upgradeInfo;
  }
  /**
   * @return string
   */
  public function getUpgradeInfo()
  {
    return $this->upgradeInfo;
  }
  /**
   * @param string
   */
  public function setUpgradeVersion($upgradeVersion)
  {
    $this->upgradeVersion = $upgradeVersion;
  }
  /**
   * @return string
   */
  public function getUpgradeVersion()
  {
    return $this->upgradeVersion;
  }
  /**
   * @param bool
   */
  public function setUpgradeable($upgradeable)
  {
    $this->upgradeable = $upgradeable;
  }
  /**
   * @return bool
   */
  public function getUpgradeable()
  {
    return $this->upgradeable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CheckInstanceUpgradabilityResponse::class, 'Google_Service_AIPlatformNotebooks_CheckInstanceUpgradabilityResponse');
