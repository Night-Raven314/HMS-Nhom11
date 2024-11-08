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

namespace Google\Service\CloudRedis;

class CloudAssetComposition extends \Google\Collection
{
  protected $collection_key = 'childAsset';
  protected $childAssetType = CloudAsset::class;
  protected $childAssetDataType = 'array';

  /**
   * @param CloudAsset[]
   */
  public function setChildAsset($childAsset)
  {
    $this->childAsset = $childAsset;
  }
  /**
   * @return CloudAsset[]
   */
  public function getChildAsset()
  {
    return $this->childAsset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudAssetComposition::class, 'Google_Service_CloudRedis_CloudAssetComposition');
