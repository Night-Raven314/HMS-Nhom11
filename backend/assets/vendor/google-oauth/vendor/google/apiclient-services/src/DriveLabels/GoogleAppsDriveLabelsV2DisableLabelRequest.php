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

namespace Google\Service\DriveLabels;

class GoogleAppsDriveLabelsV2DisableLabelRequest extends \Google\Model
{
  protected $disabledPolicyType = GoogleAppsDriveLabelsV2LifecycleDisabledPolicy::class;
  protected $disabledPolicyDataType = '';
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $updateMask;
  /**
   * @var bool
   */
  public $useAdminAccess;
  protected $writeControlType = GoogleAppsDriveLabelsV2WriteControl::class;
  protected $writeControlDataType = '';

  /**
   * @param GoogleAppsDriveLabelsV2LifecycleDisabledPolicy
   */
  public function setDisabledPolicy(GoogleAppsDriveLabelsV2LifecycleDisabledPolicy $disabledPolicy)
  {
    $this->disabledPolicy = $disabledPolicy;
  }
  /**
   * @return GoogleAppsDriveLabelsV2LifecycleDisabledPolicy
   */
  public function getDisabledPolicy()
  {
    return $this->disabledPolicy;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  /**
   * @param bool
   */
  public function setUseAdminAccess($useAdminAccess)
  {
    $this->useAdminAccess = $useAdminAccess;
  }
  /**
   * @return bool
   */
  public function getUseAdminAccess()
  {
    return $this->useAdminAccess;
  }
  /**
   * @param GoogleAppsDriveLabelsV2WriteControl
   */
  public function setWriteControl(GoogleAppsDriveLabelsV2WriteControl $writeControl)
  {
    $this->writeControl = $writeControl;
  }
  /**
   * @return GoogleAppsDriveLabelsV2WriteControl
   */
  public function getWriteControl()
  {
    return $this->writeControl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsDriveLabelsV2DisableLabelRequest::class, 'Google_Service_DriveLabels_GoogleAppsDriveLabelsV2DisableLabelRequest');
