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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2ImportConversationDataOperationMetadata extends \Google\Collection
{
  protected $collection_key = 'partialFailures';
  /**
   * @var string
   */
  public $conversationDataset;
  /**
   * @var string
   */
  public $createTime;
  protected $partialFailuresType = GoogleRpcStatus::class;
  protected $partialFailuresDataType = 'array';

  /**
   * @param string
   */
  public function setConversationDataset($conversationDataset)
  {
    $this->conversationDataset = $conversationDataset;
  }
  /**
   * @return string
   */
  public function getConversationDataset()
  {
    return $this->conversationDataset;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleRpcStatus[]
   */
  public function setPartialFailures($partialFailures)
  {
    $this->partialFailures = $partialFailures;
  }
  /**
   * @return GoogleRpcStatus[]
   */
  public function getPartialFailures()
  {
    return $this->partialFailures;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2ImportConversationDataOperationMetadata::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2ImportConversationDataOperationMetadata');
