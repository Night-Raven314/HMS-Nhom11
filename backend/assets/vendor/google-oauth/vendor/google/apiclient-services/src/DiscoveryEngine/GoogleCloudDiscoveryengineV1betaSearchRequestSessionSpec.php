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

class GoogleCloudDiscoveryengineV1betaSearchRequestSessionSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $queryId;
  /**
   * @var int
   */
  public $searchResultPersistenceCount;

  /**
   * @param string
   */
  public function setQueryId($queryId)
  {
    $this->queryId = $queryId;
  }
  /**
   * @return string
   */
  public function getQueryId()
  {
    return $this->queryId;
  }
  /**
   * @param int
   */
  public function setSearchResultPersistenceCount($searchResultPersistenceCount)
  {
    $this->searchResultPersistenceCount = $searchResultPersistenceCount;
  }
  /**
   * @return int
   */
  public function getSearchResultPersistenceCount()
  {
    return $this->searchResultPersistenceCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDiscoveryengineV1betaSearchRequestSessionSpec::class, 'Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1betaSearchRequestSessionSpec');
