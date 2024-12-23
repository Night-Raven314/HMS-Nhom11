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

namespace Google\Service\AnalyticsHub;

class RestrictedExportPolicy extends \Google\Model
{
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var bool
   */
  public $restrictDirectTableAccess;
  /**
   * @var bool
   */
  public $restrictQueryResult;

  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param bool
   */
  public function setRestrictDirectTableAccess($restrictDirectTableAccess)
  {
    $this->restrictDirectTableAccess = $restrictDirectTableAccess;
  }
  /**
   * @return bool
   */
  public function getRestrictDirectTableAccess()
  {
    return $this->restrictDirectTableAccess;
  }
  /**
   * @param bool
   */
  public function setRestrictQueryResult($restrictQueryResult)
  {
    $this->restrictQueryResult = $restrictQueryResult;
  }
  /**
   * @return bool
   */
  public function getRestrictQueryResult()
  {
    return $this->restrictQueryResult;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RestrictedExportPolicy::class, 'Google_Service_AnalyticsHub_RestrictedExportPolicy');
