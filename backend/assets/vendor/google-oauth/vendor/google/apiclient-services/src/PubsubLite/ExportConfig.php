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

namespace Google\Service\PubsubLite;

class ExportConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $currentState;
  /**
   * @var string
   */
  public $deadLetterTopic;
  /**
   * @var string
   */
  public $desiredState;
  protected $pubsubConfigType = PubSubConfig::class;
  protected $pubsubConfigDataType = '';

  /**
   * @param string
   */
  public function setCurrentState($currentState)
  {
    $this->currentState = $currentState;
  }
  /**
   * @return string
   */
  public function getCurrentState()
  {
    return $this->currentState;
  }
  /**
   * @param string
   */
  public function setDeadLetterTopic($deadLetterTopic)
  {
    $this->deadLetterTopic = $deadLetterTopic;
  }
  /**
   * @return string
   */
  public function getDeadLetterTopic()
  {
    return $this->deadLetterTopic;
  }
  /**
   * @param string
   */
  public function setDesiredState($desiredState)
  {
    $this->desiredState = $desiredState;
  }
  /**
   * @return string
   */
  public function getDesiredState()
  {
    return $this->desiredState;
  }
  /**
   * @param PubSubConfig
   */
  public function setPubsubConfig(PubSubConfig $pubsubConfig)
  {
    $this->pubsubConfig = $pubsubConfig;
  }
  /**
   * @return PubSubConfig
   */
  public function getPubsubConfig()
  {
    return $this->pubsubConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExportConfig::class, 'Google_Service_PubsubLite_ExportConfig');
