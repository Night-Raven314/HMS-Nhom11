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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1SkuPurchaseGroup extends \Google\Collection
{
  protected $collection_key = 'skus';
  protected $billingAccountPurchaseInfosType = GoogleCloudChannelV1BillingAccountPurchaseInfo::class;
  protected $billingAccountPurchaseInfosDataType = 'array';
  /**
   * @var string[]
   */
  public $skus;

  /**
   * @param GoogleCloudChannelV1BillingAccountPurchaseInfo[]
   */
  public function setBillingAccountPurchaseInfos($billingAccountPurchaseInfos)
  {
    $this->billingAccountPurchaseInfos = $billingAccountPurchaseInfos;
  }
  /**
   * @return GoogleCloudChannelV1BillingAccountPurchaseInfo[]
   */
  public function getBillingAccountPurchaseInfos()
  {
    return $this->billingAccountPurchaseInfos;
  }
  /**
   * @param string[]
   */
  public function setSkus($skus)
  {
    $this->skus = $skus;
  }
  /**
   * @return string[]
   */
  public function getSkus()
  {
    return $this->skus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1SkuPurchaseGroup::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1SkuPurchaseGroup');
