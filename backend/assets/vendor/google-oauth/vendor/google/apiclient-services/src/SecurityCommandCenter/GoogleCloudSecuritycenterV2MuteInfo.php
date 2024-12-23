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

namespace Google\Service\SecurityCommandCenter;

class GoogleCloudSecuritycenterV2MuteInfo extends \Google\Collection
{
  protected $collection_key = 'dynamicMuteRecords';
  protected $dynamicMuteRecordsType = GoogleCloudSecuritycenterV2DynamicMuteRecord::class;
  protected $dynamicMuteRecordsDataType = 'array';
  protected $staticMuteType = GoogleCloudSecuritycenterV2StaticMute::class;
  protected $staticMuteDataType = '';

  /**
   * @param GoogleCloudSecuritycenterV2DynamicMuteRecord[]
   */
  public function setDynamicMuteRecords($dynamicMuteRecords)
  {
    $this->dynamicMuteRecords = $dynamicMuteRecords;
  }
  /**
   * @return GoogleCloudSecuritycenterV2DynamicMuteRecord[]
   */
  public function getDynamicMuteRecords()
  {
    return $this->dynamicMuteRecords;
  }
  /**
   * @param GoogleCloudSecuritycenterV2StaticMute
   */
  public function setStaticMute(GoogleCloudSecuritycenterV2StaticMute $staticMute)
  {
    $this->staticMute = $staticMute;
  }
  /**
   * @return GoogleCloudSecuritycenterV2StaticMute
   */
  public function getStaticMute()
  {
    return $this->staticMute;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudSecuritycenterV2MuteInfo::class, 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV2MuteInfo');
