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

namespace Google\Service\Contactcenterinsights;

class GoogleCloudContactcenterinsightsV1alpha1Entity extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $metadata;
  /**
   * @var float
   */
  public $salience;
  protected $sentimentType = GoogleCloudContactcenterinsightsV1alpha1SentimentData::class;
  protected $sentimentDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return string[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param float
   */
  public function setSalience($salience)
  {
    $this->salience = $salience;
  }
  /**
   * @return float
   */
  public function getSalience()
  {
    return $this->salience;
  }
  /**
   * @param GoogleCloudContactcenterinsightsV1alpha1SentimentData
   */
  public function setSentiment(GoogleCloudContactcenterinsightsV1alpha1SentimentData $sentiment)
  {
    $this->sentiment = $sentiment;
  }
  /**
   * @return GoogleCloudContactcenterinsightsV1alpha1SentimentData
   */
  public function getSentiment()
  {
    return $this->sentiment;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContactcenterinsightsV1alpha1Entity::class, 'Google_Service_Contactcenterinsights_GoogleCloudContactcenterinsightsV1alpha1Entity');
