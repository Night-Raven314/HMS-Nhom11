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

namespace Google\Service\WorkloadManager;

class SapDiscoveryResource extends \Google\Collection
{
  protected $collection_key = 'relatedResources';
  protected $instancePropertiesType = SapDiscoveryResourceInstanceProperties::class;
  protected $instancePropertiesDataType = '';
  /**
   * @var string[]
   */
  public $relatedResources;
  /**
   * @var string
   */
  public $resourceKind;
  /**
   * @var string
   */
  public $resourceType;
  /**
   * @var string
   */
  public $resourceUri;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param SapDiscoveryResourceInstanceProperties
   */
  public function setInstanceProperties(SapDiscoveryResourceInstanceProperties $instanceProperties)
  {
    $this->instanceProperties = $instanceProperties;
  }
  /**
   * @return SapDiscoveryResourceInstanceProperties
   */
  public function getInstanceProperties()
  {
    return $this->instanceProperties;
  }
  /**
   * @param string[]
   */
  public function setRelatedResources($relatedResources)
  {
    $this->relatedResources = $relatedResources;
  }
  /**
   * @return string[]
   */
  public function getRelatedResources()
  {
    return $this->relatedResources;
  }
  /**
   * @param string
   */
  public function setResourceKind($resourceKind)
  {
    $this->resourceKind = $resourceKind;
  }
  /**
   * @return string
   */
  public function getResourceKind()
  {
    return $this->resourceKind;
  }
  /**
   * @param string
   */
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  /**
   * @return string
   */
  public function getResourceType()
  {
    return $this->resourceType;
  }
  /**
   * @param string
   */
  public function setResourceUri($resourceUri)
  {
    $this->resourceUri = $resourceUri;
  }
  /**
   * @return string
   */
  public function getResourceUri()
  {
    return $this->resourceUri;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SapDiscoveryResource::class, 'Google_Service_WorkloadManager_SapDiscoveryResource');
