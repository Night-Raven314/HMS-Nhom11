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

class GoogleCloudDiscoveryengineV1alphaSchema extends \Google\Collection
{
  protected $collection_key = 'fieldConfigs';
  protected $fieldConfigsType = GoogleCloudDiscoveryengineV1alphaFieldConfig::class;
  protected $fieldConfigsDataType = 'array';
  /**
   * @var string
   */
  public $jsonSchema;
  /**
   * @var string
   */
  public $name;
  /**
   * @var array[]
   */
  public $structSchema;

  /**
   * @param GoogleCloudDiscoveryengineV1alphaFieldConfig[]
   */
  public function setFieldConfigs($fieldConfigs)
  {
    $this->fieldConfigs = $fieldConfigs;
  }
  /**
   * @return GoogleCloudDiscoveryengineV1alphaFieldConfig[]
   */
  public function getFieldConfigs()
  {
    return $this->fieldConfigs;
  }
  /**
   * @param string
   */
  public function setJsonSchema($jsonSchema)
  {
    $this->jsonSchema = $jsonSchema;
  }
  /**
   * @return string
   */
  public function getJsonSchema()
  {
    return $this->jsonSchema;
  }
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
   * @param array[]
   */
  public function setStructSchema($structSchema)
  {
    $this->structSchema = $structSchema;
  }
  /**
   * @return array[]
   */
  public function getStructSchema()
  {
    return $this->structSchema;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDiscoveryengineV1alphaSchema::class, 'Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1alphaSchema');
