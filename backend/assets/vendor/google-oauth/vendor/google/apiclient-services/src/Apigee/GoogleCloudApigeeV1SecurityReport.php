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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1SecurityReport extends \Google\Model
{
  /**
   * @var string
   */
  public $created;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $envgroupHostname;
  /**
   * @var string
   */
  public $error;
  /**
   * @var string
   */
  public $executionTime;
  protected $queryParamsType = GoogleCloudApigeeV1SecurityReportMetadata::class;
  protected $queryParamsDataType = '';
  /**
   * @var string
   */
  public $reportDefinitionId;
  protected $resultType = GoogleCloudApigeeV1SecurityReportResultMetadata::class;
  protected $resultDataType = '';
  /**
   * @var string
   */
  public $resultFileSize;
  /**
   * @var string
   */
  public $resultRows;
  /**
   * @var string
   */
  public $self;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updated;

  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
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
   * @param string
   */
  public function setEnvgroupHostname($envgroupHostname)
  {
    $this->envgroupHostname = $envgroupHostname;
  }
  /**
   * @return string
   */
  public function getEnvgroupHostname()
  {
    return $this->envgroupHostname;
  }
  /**
   * @param string
   */
  public function setError($error)
  {
    $this->error = $error;
  }
  /**
   * @return string
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param string
   */
  public function setExecutionTime($executionTime)
  {
    $this->executionTime = $executionTime;
  }
  /**
   * @return string
   */
  public function getExecutionTime()
  {
    return $this->executionTime;
  }
  /**
   * @param GoogleCloudApigeeV1SecurityReportMetadata
   */
  public function setQueryParams(GoogleCloudApigeeV1SecurityReportMetadata $queryParams)
  {
    $this->queryParams = $queryParams;
  }
  /**
   * @return GoogleCloudApigeeV1SecurityReportMetadata
   */
  public function getQueryParams()
  {
    return $this->queryParams;
  }
  /**
   * @param string
   */
  public function setReportDefinitionId($reportDefinitionId)
  {
    $this->reportDefinitionId = $reportDefinitionId;
  }
  /**
   * @return string
   */
  public function getReportDefinitionId()
  {
    return $this->reportDefinitionId;
  }
  /**
   * @param GoogleCloudApigeeV1SecurityReportResultMetadata
   */
  public function setResult(GoogleCloudApigeeV1SecurityReportResultMetadata $result)
  {
    $this->result = $result;
  }
  /**
   * @return GoogleCloudApigeeV1SecurityReportResultMetadata
   */
  public function getResult()
  {
    return $this->result;
  }
  /**
   * @param string
   */
  public function setResultFileSize($resultFileSize)
  {
    $this->resultFileSize = $resultFileSize;
  }
  /**
   * @return string
   */
  public function getResultFileSize()
  {
    return $this->resultFileSize;
  }
  /**
   * @param string
   */
  public function setResultRows($resultRows)
  {
    $this->resultRows = $resultRows;
  }
  /**
   * @return string
   */
  public function getResultRows()
  {
    return $this->resultRows;
  }
  /**
   * @param string
   */
  public function setSelf($self)
  {
    $this->self = $self;
  }
  /**
   * @return string
   */
  public function getSelf()
  {
    return $this->self;
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
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1SecurityReport::class, 'Google_Service_Apigee_GoogleCloudApigeeV1SecurityReport');
