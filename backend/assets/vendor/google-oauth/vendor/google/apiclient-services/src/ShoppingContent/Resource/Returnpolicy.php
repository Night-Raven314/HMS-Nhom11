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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\ReturnPolicy as ReturnPolicyModel;
use Google\Service\ShoppingContent\ReturnpolicyCustomBatchRequest;
use Google\Service\ShoppingContent\ReturnpolicyCustomBatchResponse;
use Google\Service\ShoppingContent\ReturnpolicyListResponse;

/**
 * The "returnpolicy" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $returnpolicy = $contentService->returnpolicy;
 *  </code>
 */
class Returnpolicy extends \Google\Service\Resource
{
  /**
   * Batches multiple return policy related calls in a single request.
   * (returnpolicy.custombatch)
   *
   * @param ReturnpolicyCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ReturnpolicyCustomBatchResponse
   * @throws \Google\Service\Exception
   */
  public function custombatch(ReturnpolicyCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], ReturnpolicyCustomBatchResponse::class);
  }
  /**
   * Deletes a return policy for the given Merchant Center account.
   * (returnpolicy.delete)
   *
   * @param string $merchantId The Merchant Center account from which to delete
   * the given return policy.
   * @param string $returnPolicyId Return policy ID generated by Google.
   * @param array $optParams Optional parameters.
   * @throws \Google\Service\Exception
   */
  public function delete($merchantId, $returnPolicyId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a return policy of the Merchant Center account. (returnpolicy.get)
   *
   * @param string $merchantId The Merchant Center account to get a return policy
   * for.
   * @param string $returnPolicyId Return policy ID generated by Google.
   * @param array $optParams Optional parameters.
   * @return ReturnPolicyModel
   * @throws \Google\Service\Exception
   */
  public function get($merchantId, $returnPolicyId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'returnPolicyId' => $returnPolicyId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ReturnPolicyModel::class);
  }
  /**
   * Inserts a return policy for the Merchant Center account.
   * (returnpolicy.insert)
   *
   * @param string $merchantId The Merchant Center account to insert a return
   * policy for.
   * @param ReturnPolicyModel $postBody
   * @param array $optParams Optional parameters.
   * @return ReturnPolicyModel
   * @throws \Google\Service\Exception
   */
  public function insert($merchantId, ReturnPolicyModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], ReturnPolicyModel::class);
  }
  /**
   * Lists the return policies of the Merchant Center account.
   * (returnpolicy.listReturnpolicy)
   *
   * @param string $merchantId The Merchant Center account to list return policies
   * for.
   * @param array $optParams Optional parameters.
   * @return ReturnpolicyListResponse
   * @throws \Google\Service\Exception
   */
  public function listReturnpolicy($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ReturnpolicyListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Returnpolicy::class, 'Google_Service_ShoppingContent_Resource_Returnpolicy');
