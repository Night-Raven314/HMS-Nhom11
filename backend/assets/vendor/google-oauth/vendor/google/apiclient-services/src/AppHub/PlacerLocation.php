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

namespace Google\Service\AppHub;

class PlacerLocation extends \Google\Model
{
  /**
   * @var string
   */
  public $placerConfig;

  /**
   * @param string
   */
  public function setPlacerConfig($placerConfig)
  {
    $this->placerConfig = $placerConfig;
  }
  /**
   * @return string
   */
  public function getPlacerConfig()
  {
    return $this->placerConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlacerLocation::class, 'Google_Service_AppHub_PlacerLocation');
