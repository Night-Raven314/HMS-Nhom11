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

namespace Google\Service\Cloudbilling\Resource;

use Google\Service\Cloudbilling\ListServicesResponse;

/**
 * The "services" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudbillingService = new Google\Service\Cloudbilling(...);
 *   $services = $cloudbillingService->services;
 *  </code>
 */
class Services extends \Google\Service\Resource
{
  /**
   * Lists all public cloud services. (services.listServices)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. Defaults to 5000.
   * @opt_param string pageToken A token identifying a page of results to return.
   * This should be a `next_page_token` value returned from a previous
   * `ListServices` call. If unspecified, the first page of results is returned.
   * @return ListServicesResponse
   * @throws \Google\Service\Exception
   */
  public function listServices($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListServicesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Services::class, 'Google_Service_Cloudbilling_Resource_Services');
