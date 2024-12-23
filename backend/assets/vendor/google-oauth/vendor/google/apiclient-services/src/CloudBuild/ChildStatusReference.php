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

namespace Google\Service\CloudBuild;

class ChildStatusReference extends \Google\Collection
{
  protected $collection_key = 'whenExpressions';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $pipelineTaskName;
  /**
   * @var string
   */
  public $type;
  protected $whenExpressionsType = WhenExpression::class;
  protected $whenExpressionsDataType = 'array';

  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPipelineTaskName($pipelineTaskName)
  {
    $this->pipelineTaskName = $pipelineTaskName;
  }
  /**
   * @return string
   */
  public function getPipelineTaskName()
  {
    return $this->pipelineTaskName;
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
  /**
   * @param WhenExpression[]
   */
  public function setWhenExpressions($whenExpressions)
  {
    $this->whenExpressions = $whenExpressions;
  }
  /**
   * @return WhenExpression[]
   */
  public function getWhenExpressions()
  {
    return $this->whenExpressions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChildStatusReference::class, 'Google_Service_CloudBuild_ChildStatusReference');
