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

namespace Google\Service\Aiplatform;

class GoogleCloudAiplatformV1SchemaPredictParamsVideoClassificationPredictionParams extends \Google\Model
{
  /**
   * @var float
   */
  public $confidenceThreshold;
  /**
   * @var int
   */
  public $maxPredictions;
  /**
   * @var bool
   */
  public $oneSecIntervalClassification;
  /**
   * @var bool
   */
  public $segmentClassification;
  /**
   * @var bool
   */
  public $shotClassification;

  /**
   * @param float
   */
  public function setConfidenceThreshold($confidenceThreshold)
  {
    $this->confidenceThreshold = $confidenceThreshold;
  }
  /**
   * @return float
   */
  public function getConfidenceThreshold()
  {
    return $this->confidenceThreshold;
  }
  /**
   * @param int
   */
  public function setMaxPredictions($maxPredictions)
  {
    $this->maxPredictions = $maxPredictions;
  }
  /**
   * @return int
   */
  public function getMaxPredictions()
  {
    return $this->maxPredictions;
  }
  /**
   * @param bool
   */
  public function setOneSecIntervalClassification($oneSecIntervalClassification)
  {
    $this->oneSecIntervalClassification = $oneSecIntervalClassification;
  }
  /**
   * @return bool
   */
  public function getOneSecIntervalClassification()
  {
    return $this->oneSecIntervalClassification;
  }
  /**
   * @param bool
   */
  public function setSegmentClassification($segmentClassification)
  {
    $this->segmentClassification = $segmentClassification;
  }
  /**
   * @return bool
   */
  public function getSegmentClassification()
  {
    return $this->segmentClassification;
  }
  /**
   * @param bool
   */
  public function setShotClassification($shotClassification)
  {
    $this->shotClassification = $shotClassification;
  }
  /**
   * @return bool
   */
  public function getShotClassification()
  {
    return $this->shotClassification;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAiplatformV1SchemaPredictParamsVideoClassificationPredictionParams::class, 'Google_Service_Aiplatform_GoogleCloudAiplatformV1SchemaPredictParamsVideoClassificationPredictionParams');
