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

namespace Google\Service\ChecksService;

class GoogleChecksReportV1alphaDataMonitoringDataTypeResult extends \Google\Model
{
  /**
   * @var string
   */
  public $dataType;
  protected $dataTypeEvidenceType = GoogleChecksReportV1alphaDataTypeEvidence::class;
  protected $dataTypeEvidenceDataType = '';
  protected $metadataType = GoogleChecksReportV1alphaDataMonitoringResultMetadata::class;
  protected $metadataDataType = '';

  /**
   * @param string
   */
  public function setDataType($dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return string
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  /**
   * @param GoogleChecksReportV1alphaDataTypeEvidence
   */
  public function setDataTypeEvidence(GoogleChecksReportV1alphaDataTypeEvidence $dataTypeEvidence)
  {
    $this->dataTypeEvidence = $dataTypeEvidence;
  }
  /**
   * @return GoogleChecksReportV1alphaDataTypeEvidence
   */
  public function getDataTypeEvidence()
  {
    return $this->dataTypeEvidence;
  }
  /**
   * @param GoogleChecksReportV1alphaDataMonitoringResultMetadata
   */
  public function setMetadata(GoogleChecksReportV1alphaDataMonitoringResultMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GoogleChecksReportV1alphaDataMonitoringResultMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChecksReportV1alphaDataMonitoringDataTypeResult::class, 'Google_Service_ChecksService_GoogleChecksReportV1alphaDataMonitoringDataTypeResult');
