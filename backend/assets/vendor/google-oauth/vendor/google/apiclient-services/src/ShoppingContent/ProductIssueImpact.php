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

namespace Google\Service\ShoppingContent;

class ProductIssueImpact extends \Google\Collection
{
  protected $collection_key = 'breakdowns';
  protected $breakdownsType = Breakdown::class;
  protected $breakdownsDataType = 'array';
  /**
   * @var string
   */
  public $message;
  /**
   * @var string
   */
  public $severity;

  /**
   * @param Breakdown[]
   */
  public function setBreakdowns($breakdowns)
  {
    $this->breakdowns = $breakdowns;
  }
  /**
   * @return Breakdown[]
   */
  public function getBreakdowns()
  {
    return $this->breakdowns;
  }
  /**
   * @param string
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }
  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductIssueImpact::class, 'Google_Service_ShoppingContent_ProductIssueImpact');
