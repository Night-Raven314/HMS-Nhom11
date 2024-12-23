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

namespace Google\Service\DiscoveryEngine;

class GoogleCloudDiscoveryengineV1alphaDataStoreBillingEstimation extends \Google\Model
{
  /**
   * @var string
   */
  public $structuredDataSize;
  /**
   * @var string
   */
  public $structuredDataUpdateTime;
  /**
   * @var string
   */
  public $unstructuredDataSize;
  /**
   * @var string
   */
  public $unstructuredDataUpdateTime;
  /**
   * @var string
   */
  public $websiteDataSize;
  /**
   * @var string
   */
  public $websiteDataUpdateTime;

  /**
   * @param string
   */
  public function setStructuredDataSize($structuredDataSize)
  {
    $this->structuredDataSize = $structuredDataSize;
  }
  /**
   * @return string
   */
  public function getStructuredDataSize()
  {
    return $this->structuredDataSize;
  }
  /**
   * @param string
   */
  public function setStructuredDataUpdateTime($structuredDataUpdateTime)
  {
    $this->structuredDataUpdateTime = $structuredDataUpdateTime;
  }
  /**
   * @return string
   */
  public function getStructuredDataUpdateTime()
  {
    return $this->structuredDataUpdateTime;
  }
  /**
   * @param string
   */
  public function setUnstructuredDataSize($unstructuredDataSize)
  {
    $this->unstructuredDataSize = $unstructuredDataSize;
  }
  /**
   * @return string
   */
  public function getUnstructuredDataSize()
  {
    return $this->unstructuredDataSize;
  }
  /**
   * @param string
   */
  public function setUnstructuredDataUpdateTime($unstructuredDataUpdateTime)
  {
    $this->unstructuredDataUpdateTime = $unstructuredDataUpdateTime;
  }
  /**
   * @return string
   */
  public function getUnstructuredDataUpdateTime()
  {
    return $this->unstructuredDataUpdateTime;
  }
  /**
   * @param string
   */
  public function setWebsiteDataSize($websiteDataSize)
  {
    $this->websiteDataSize = $websiteDataSize;
  }
  /**
   * @return string
   */
  public function getWebsiteDataSize()
  {
    return $this->websiteDataSize;
  }
  /**
   * @param string
   */
  public function setWebsiteDataUpdateTime($websiteDataUpdateTime)
  {
    $this->websiteDataUpdateTime = $websiteDataUpdateTime;
  }
  /**
   * @return string
   */
  public function getWebsiteDataUpdateTime()
  {
    return $this->websiteDataUpdateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDiscoveryengineV1alphaDataStoreBillingEstimation::class, 'Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1alphaDataStoreBillingEstimation');
