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

namespace Google\Service\DisplayVideo;

class BulkUpdateLineItemsResponse extends \Google\Collection
{
  protected $collection_key = 'updatedLineItemIds';
  protected $errorsType = Status::class;
  protected $errorsDataType = 'array';
  /**
   * @var string[]
   */
  public $failedLineItemIds;
  /**
   * @var string[]
   */
  public $skippedLineItemIds;
  /**
   * @var string[]
   */
  public $updatedLineItemIds;

  /**
   * @param Status[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return Status[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string[]
   */
  public function setFailedLineItemIds($failedLineItemIds)
  {
    $this->failedLineItemIds = $failedLineItemIds;
  }
  /**
   * @return string[]
   */
  public function getFailedLineItemIds()
  {
    return $this->failedLineItemIds;
  }
  /**
   * @param string[]
   */
  public function setSkippedLineItemIds($skippedLineItemIds)
  {
    $this->skippedLineItemIds = $skippedLineItemIds;
  }
  /**
   * @return string[]
   */
  public function getSkippedLineItemIds()
  {
    return $this->skippedLineItemIds;
  }
  /**
   * @param string[]
   */
  public function setUpdatedLineItemIds($updatedLineItemIds)
  {
    $this->updatedLineItemIds = $updatedLineItemIds;
  }
  /**
   * @return string[]
   */
  public function getUpdatedLineItemIds()
  {
    return $this->updatedLineItemIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BulkUpdateLineItemsResponse::class, 'Google_Service_DisplayVideo_BulkUpdateLineItemsResponse');
