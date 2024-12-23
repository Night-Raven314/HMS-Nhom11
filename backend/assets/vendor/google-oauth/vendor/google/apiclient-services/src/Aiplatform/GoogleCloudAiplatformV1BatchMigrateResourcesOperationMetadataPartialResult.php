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

class GoogleCloudAiplatformV1BatchMigrateResourcesOperationMetadataPartialResult extends \Google\Model
{
  /**
   * @var string
   */
  public $dataset;
  protected $errorType = GoogleRpcStatus::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $model;
  protected $requestType = GoogleCloudAiplatformV1MigrateResourceRequest::class;
  protected $requestDataType = '';

  /**
   * @param string
   */
  public function setDataset($dataset)
  {
    $this->dataset = $dataset;
  }
  /**
   * @return string
   */
  public function getDataset()
  {
    return $this->dataset;
  }
  /**
   * @param GoogleRpcStatus
   */
  public function setError(GoogleRpcStatus $error)
  {
    $this->error = $error;
  }
  /**
   * @return GoogleRpcStatus
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param GoogleCloudAiplatformV1MigrateResourceRequest
   */
  public function setRequest(GoogleCloudAiplatformV1MigrateResourceRequest $request)
  {
    $this->request = $request;
  }
  /**
   * @return GoogleCloudAiplatformV1MigrateResourceRequest
   */
  public function getRequest()
  {
    return $this->request;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAiplatformV1BatchMigrateResourcesOperationMetadataPartialResult::class, 'Google_Service_Aiplatform_GoogleCloudAiplatformV1BatchMigrateResourcesOperationMetadataPartialResult');
