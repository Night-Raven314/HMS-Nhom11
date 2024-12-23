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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1AppleDeveloperId extends \Google\Model
{
  /**
   * @var string
   */
  public $keyId;
  /**
   * @var string
   */
  public $privateKey;
  /**
   * @var string
   */
  public $teamId;

  /**
   * @param string
   */
  public function setKeyId($keyId)
  {
    $this->keyId = $keyId;
  }
  /**
   * @return string
   */
  public function getKeyId()
  {
    return $this->keyId;
  }
  /**
   * @param string
   */
  public function setPrivateKey($privateKey)
  {
    $this->privateKey = $privateKey;
  }
  /**
   * @return string
   */
  public function getPrivateKey()
  {
    return $this->privateKey;
  }
  /**
   * @param string
   */
  public function setTeamId($teamId)
  {
    $this->teamId = $teamId;
  }
  /**
   * @return string
   */
  public function getTeamId()
  {
    return $this->teamId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1AppleDeveloperId::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1AppleDeveloperId');
