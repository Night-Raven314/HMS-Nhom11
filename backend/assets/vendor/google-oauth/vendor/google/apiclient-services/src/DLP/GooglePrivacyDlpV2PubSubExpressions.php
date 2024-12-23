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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2PubSubExpressions extends \Google\Collection
{
  protected $collection_key = 'conditions';
  protected $conditionsType = GooglePrivacyDlpV2PubSubCondition::class;
  protected $conditionsDataType = 'array';
  /**
   * @var string
   */
  public $logicalOperator;

  /**
   * @param GooglePrivacyDlpV2PubSubCondition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return GooglePrivacyDlpV2PubSubCondition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param string
   */
  public function setLogicalOperator($logicalOperator)
  {
    $this->logicalOperator = $logicalOperator;
  }
  /**
   * @return string
   */
  public function getLogicalOperator()
  {
    return $this->logicalOperator;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2PubSubExpressions::class, 'Google_Service_DLP_GooglePrivacyDlpV2PubSubExpressions');
