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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaMockConfig extends \Google\Collection
{
  protected $collection_key = 'parameters';
  /**
   * @var string
   */
  public $failedExecutions;
  /**
   * @var string
   */
  public $mockStrategy;
  protected $parametersType = GoogleCloudIntegrationsV1alphaEventParameter::class;
  protected $parametersDataType = 'array';

  /**
   * @param string
   */
  public function setFailedExecutions($failedExecutions)
  {
    $this->failedExecutions = $failedExecutions;
  }
  /**
   * @return string
   */
  public function getFailedExecutions()
  {
    return $this->failedExecutions;
  }
  /**
   * @param string
   */
  public function setMockStrategy($mockStrategy)
  {
    $this->mockStrategy = $mockStrategy;
  }
  /**
   * @return string
   */
  public function getMockStrategy()
  {
    return $this->mockStrategy;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaEventParameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaEventParameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaMockConfig::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaMockConfig');
