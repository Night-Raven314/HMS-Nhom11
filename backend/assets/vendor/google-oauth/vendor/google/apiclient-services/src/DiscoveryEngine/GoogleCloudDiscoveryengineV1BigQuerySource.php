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

class GoogleCloudDiscoveryengineV1BigQuerySource extends \Google\Model
{
  /**
   * @var string
   */
  public $dataSchema;
  /**
   * @var string
   */
  public $datasetId;
  /**
   * @var string
   */
  public $gcsStagingDir;
  protected $partitionDateType = GoogleTypeDate::class;
  protected $partitionDateDataType = '';
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $tableId;

  /**
   * @param string
   */
  public function setDataSchema($dataSchema)
  {
    $this->dataSchema = $dataSchema;
  }
  /**
   * @return string
   */
  public function getDataSchema()
  {
    return $this->dataSchema;
  }
  /**
   * @param string
   */
  public function setDatasetId($datasetId)
  {
    $this->datasetId = $datasetId;
  }
  /**
   * @return string
   */
  public function getDatasetId()
  {
    return $this->datasetId;
  }
  /**
   * @param string
   */
  public function setGcsStagingDir($gcsStagingDir)
  {
    $this->gcsStagingDir = $gcsStagingDir;
  }
  /**
   * @return string
   */
  public function getGcsStagingDir()
  {
    return $this->gcsStagingDir;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setPartitionDate(GoogleTypeDate $partitionDate)
  {
    $this->partitionDate = $partitionDate;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getPartitionDate()
  {
    return $this->partitionDate;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  /**
   * @return string
   */
  public function getTableId()
  {
    return $this->tableId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDiscoveryengineV1BigQuerySource::class, 'Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1BigQuerySource');
